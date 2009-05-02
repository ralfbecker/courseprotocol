<?php
require_once(EGW_INCLUDE_ROOT.'/courseprotocol/inc/class.socourseprotocol.inc.php');
 /**
  * Business Object for test
  */
  class bocourseprotocol extends socourseprotocol
  {
  	// the types are not needed yet, nor supported by the interface and database

     var $types = array(
         ''      => 'Select one ...',
         'con'    => 'Contact',
         'bus'   => 'Business',
     );
     var $timestamps=array('cp_dts');
	/**
	 * Offset in secconds between user and server-time,	it need to be add to a server-time to get the user-time
	 * or substracted from a user-time to get the server-time
	 *
	 * @var int
	 */
	var $tz_offset_s;
	/**
	 * Current time as timestamp in user-time
	 *
	 * @var int
	 */
	var $now;
	var $sites=array(
		1 => 'Hohenroda',
		2 => 'Lahnstein',
		3 => 'Bollmannsruh',
		4 => 'Mobil',
	);

	var $oc_types=array(
		1 => 'Unfall',
		2 => 'Beinahunfall',
		3 => 'Zwischenfall',
	);

	var $helmet=array(
		1 => 'Blau',
		2 => 'Rot',
		3 => 'Weiss',
	);

	var $harness=array(
		1 => 'Site',
		2 => 'Bus',
		3 => 'KL-Lager',
	);

	var $config;

	var $customfields=array();

    function bocourseprotocol()
    {
	    $this->socourseprotocol();

		$this->tz_offset_s = $GLOBALS['egw']->datetime->tz_offset;
		$this->now = time() + $this->tz_offset_s;	// time() is server-time and we need a user-time

		$this->config = config::read('courseprotocol');

		if (isset($this->config['customfields']) && is_array($this->config['customfields']))
		{
			$this->customfields = $this->config['customfields'];
		}

    }

	/**
	 * changes the data from the db-format to your work-format
	 *
	 * reimplemented to adjust the timezone of the timestamps (adding $this->tz_offset_s to get user-time)
	 * Please note, we do NOT call the method of the parent so_sql !!!
	 *
	 * @param array $data if given works on that array and returns result, else works on internal data-array
	 * @return array with changed data
	 */
	function db2data($data=null)
	{
		if (!is_array($data))
		{
			$data = &$this->data;
		}
		foreach($this->timestamps as $name)
		{
			if (isset($data[$name]) && $data[$name]) $data[$name] += $this->tz_offset_s;
		}
		if ($data['cp_trainer'])
		{
			$data['cp_trainer'] = explode(',',$data['cp_trainer']);
		}

		if ($data['cp_defect_cleared'])
		{
			$data['cp_defect_cleared'] = explode(',',$data['cp_defect_cleared']);
		}

		if ($data['cp_events'])
		{
			$data['cp_events'] = explode(',',$data['cp_events']);
		}

		if ($data['occ']['cp_occ_trainer'])
		{
			$data['occ']['cp_occ_trainer'] = explode(',',$data['occ']['cp_occ_trainer']);
		}

		return $data;
	}


	/**
	 * get title for an timesheet entry identified by $entry
	 *
	 * Is called as hook to participate in the linking
	 *
	 * @param int/array $entry int ts_id or array with timesheet entry
	 * @return string/boolean string with title, null if timesheet not found, false if no perms to view it
	 */
	function link_title( $entry )
	{
		if (!is_array($entry))
		{
			$entry = $this->read( $entry );
		}
		if (!$entry)
		{
			return $entry;
		}
		if ($entry['cal_id']) return lang('courseprotocol').' '.egw_link::title('calendar',$entry['cal_id']);

		return lang('courseprotocol').' '.date($GLOBALS['egw_info']['user']['preferences']['common']['dateformat'],
			$entry['cp_date'] ? $entry['cp_date'] : $entry['cp_created']);
		//return $entry['cp_title'];
	}

	/**
	 * query  for entries matching $pattern
	 *
	 * Is called as hook to participate in the linking
	 *
	 * @param string $pattern pattern to search
	 * @return array with cp_id - title pairs of the matching entries
	 */
	function link_query( $pattern )
	{
		$criteria = array();
		foreach(array('cp_company','cp_site','cp_course_description') as $col)
		{
			$criteria[$col] = $pattern;
		}
		$result = array();
		foreach((array) $this->search($criteria,false,'','','%',false,'OR') as $cp )
		{
			if ($cp) $result[$cp['cp_id']] = $this->link_title($cp);
		}
		return $result;
	}



	/**
	 * Hook called by link-class to include courseprotocol in the appregistry of the linkage
	 *
	 * @param array/string $location location and other parameters (not used)
	 * @return array with method-names
	 */
	function search_link($location)
	{
		return array(
			'query' => 'courseprotocol.bocourseprotocol.link_query',
			'title' => 'courseprotocol.bocourseprotocol.link_title',
			'view'  => array(
				'menuaction' => 'courseprotocol.uicourseprotocol.edit',
			),
			'view_id' => 'cp_id',
			'view_popup'  => '850x620',
			'add' => array(
				'menuaction' => 'courseprotocol.uicourseprotocol.edit',
			),
			'add_app'    => 'link_app',
			'add_id'     => 'link_id',
			'add_popup'  => '850x620',
		);
	}


	/**
	 * changes the data from your work-format to the db-format
	 *
	 * reimplemented to adjust the timezone of the timestamps (subtraction $this->tz_offset_s to get server-time)
	 * Please note, we do NOT call the method of the parent so_sql !!!
	 *
	 * @param array $data if given works on that array and returns result, else works on internal data-array
	 * @return array with changed data
	 */
	function data2db($data=null)
	{
		if ($intern = !is_array($data))
		{
			$data = &$this->data;
		}
		foreach($this->timestamps as $name)
		{
			if (isset($data[$name]) && $data[$name]) $data[$name] -= $this->tz_offset_s;
		}
		if ($data['cp_trainer'] && is_array($data['cp_trainer']))
		{
			$data['cp_trainer'] = implode(',',$data['cp_trainer']);
		}
		if ($data['cp_defect_cleared'] && is_array($data['cp_defect_cleared']))
		{
			$data['cp_defect_cleared'] = implode(',',$data['cp_defect_cleared']);
		}
		if ($data['cp_events'] && is_array($data['cp_events']))
		{
			$data['cp_events'] = implode(',',$data['cp_events']);
		}
		if ($data['cal_id'] && ($event = ExecMethod('calendar.calendar_bo.read',$data['cal_id'])))
		{
			$data['cp_date'] = $event['start'];
		}
		return $data;
	}

	function save($data=null)
	{
		if (is_array($data) && count($data)) $this->data_merge($data);

		if (!$this->data['cp_id'])	// new entry
		{
			$this->data['cp_creator'] = $GLOBALS['egw_info']['user']['account_id'];
			$this->data['cp_created'] = $this->now;
		}
		else
		{
			$this->data['cp_modifier'] = $GLOBALS['egw_info']['user']['account_id'];
			$this->data['cp_modified'] = $this->now;
		}
		return parent::save($data);
	}

	function check_acl($required,$data=null)
	{
		if (!$data)
		{
			$data =& $this->data;
		}
		if (!is_array($data))
		{
			$save_data = $this->data;
			$data = $this->read($data,true);
			$this->data = $save_data;

			if (!$data) return null; 	// entry not found
		}
		$rights = $this->grants[$data['cp_creator']];

		return $data && !!($rights & $required);
	}
}
