<?php
/**
 * Courseprotocol - history and notifications
 *
 * @link http://www.egroupware.org
 * @author Ralf Becker <RalfBecker-AT-outdoor-training.de>
 * @package tracker
 * @copyright (c) 2007 by Ralf Becker <RalfBecker-AT-outdoor-training.de>
 * @license http://opensource.org/licenses/gpl-license.php GPL - GNU General Public License
 * @version $Id: class.courseprotocol_tracking.inc.php 24102 2007-06-13 21:37:05Z ralfbecker $
 */

require_once(EGW_INCLUDE_ROOT.'/etemplate/inc/class.bo_tracking.inc.php');

/**
 * Tracker - tracking object for the tracker
 */
class courseprotocol_tracking extends bo_tracking
{
	/**
	 * Application we are tracking (required!)
	 *
	 * @var string
	 */
	var $app = 'courseprotocol';
	/**
	 * Name of the id-field, used as id in the history log (required!)
	 *
	 * @var string
	 */
	var $id_field = 'cp_id';
	/**
	 * Name of the field with the creator id, if the creator of an entry should be notified
	 *
	 * @var string
	 */
	var $creator_field = 'cp_creator';
	/**
	 * Name of the field with the id(s) of assinged users, if they should be notified
	 *
	 * @var string
	 */
	var $assigned_field = 'cp_responsible';
	/**
	 * Translate field-names to 2-char history status
	 *
	 * @var array
	 */
	var $field2history = array(
		'cp_company'              => 'Cp',
		'cp_date'                 => 'Da',
		'cp_carabiner'            => 'Ca',
		'cp_fotos'                => 'Ft',
		'cp_trainer'              => 'Tr',
		'cp_trainer_custom'       => 'Tc',
		'cp_course_description'   => 'Od',
		'cp_company_custom'       => 'Cc',
		'cp_course'               => 'Co',
		'cp_site'                 => 'Si',
		'cp_events'               => 'Ev',
		'cal_id'                  => 'Lo',
		'cp_consumable_material'  => 'Cm',
		'cp_defects'              => 'Df',
		'cp_helmet'               => 'Hm',
		'cp_harness'              => 'Hn',
		'cp_groups'               => 'Gr',
		'icp_num_participant'     => 'Pa',
		'cp_defect_cleared'       => 'Dc',
		'cp_defect_cleared_date'  => 'Dd',
		// all custom fields together
		'custom'                  => '#c',
	);
	/**
	 * Translate field-names to labels
	 *
	 * @var array
	 */
	var $field2label = array(
		'cp_company'              => 'Company',
		'cp_date'                 => 'Date',
		'cp_carabiner'            => 'Carabiner',
		'cp_fotos'                => 'Fotos',
		'cp_trainer'              => 'Trainer',
		'cp_trainer_custom'       => 'Trainer Custom',
		'cp_course_description'   => 'Description',
		'cp_company_custom'       => 'Company Custom',
		'cp_course'               => 'Course',
		'cp_site'                 => 'Site',
		'cp_events'               => 'Event',
		'cal_id'                  => 'Calendar',
		'cp_consumable_material'  => 'Consumable matial',
		'cp_defects'              => 'Defects',
		'cp_helmet'               => 'Helmet',
		'cp_harness'              => 'Harness',
		'cp_groups'               => 'Groups',
		'icp_num_participant'     => 'Participant',
		'cp_defect_cleared'       => 'Defects cleared',
		'cp_defect_cleared_date'  => 'Cleared date',
		// all custom fields together
		'custom'                  => 'custom fields',
	);

	/**
	 * Instance of the boinfolog class calling us
	 *
	 * @access private
	 * @var boinfolog
	 */
	var $courselog;

	/**
	 * Constructor
	 *
	 * @param botracker $botracker
	 * @return tracker_tracking
	 */
	function __construct(&$bocourselog)
	{
		parent::__construct();	// calling the constructor of the extended class

		$this->courselog =& $bocourselog;
	}

	/**
	 * Get the subject for a given entry
	 *
	 * Reimpleneted to use a New|deleted|modified prefix.
	 *
	 * @param array $data
	 * @param array $old
	 * @return string
	 */
	function get_subject($data,$old)
	{
		if (!$old || $old['cp_status'] == 'deleted')
		{
			$prefix = lang('New %1',lang($this->courselog->enums['type'][$data['info_type']]));
		}
		elseif($data['cp_status'] == 'deleted')
		{
			$prefix = lang('%1 deleted',lang($this->courselog->enums['type'][$data['info_type']]));
		}
		else
		{
			$prefix = lang('%1 modified',lang($this->courselog->enums['type'][$data['info_type']]));
		}
		return $prefix.': '.$data['info_subject'];
	}

	/**
	 * Get the modified / new message (1. line of mail body) for a given entry, can be reimplemented
	 *
	 * @param array $data
	 * @param array $old
	 * @return string
	 */
	function get_message($data,$old)
	{
		if ($data['message']) return $data['message'];	// async notification

		if (!$old || $old['cp_status'] == 'deleted')
		{
			return lang('New %1 created by %2 at %3',$GLOBALS['egw']->common->grab_owner_name($this->courselog->user),$this->datetime(time()));
		}
		elseif($data['info_status'] == 'deleted')
		{
			return lang('%1 deleted by %2 at %3',$GLOBALS['egw']->common->grab_owner_name($data['cp_modifier']),
				$this->datetime($data['cp_modified']-$this->courselog->tz_offset_s));
		}
		return lang('%1 modified by %2 at %3',$GLOBALS['egw']->common->grab_owner_name($data['cp_modifier']),
			$this->datetime($data['cp_modified']-$this->courselog->tz_offset_s));
	}

	/**
	 * Get the details of an entry
	 *
	 * @param array $data
	 * @param string $datetime_format of user to notify, eg. 'Y-m-d H:i'
	 * @param int $tz_offset_s offset in sec to be add to server-time to get the user-time of the user to notify
	 * @return array of details as array with values for keys 'label','value','type'
	 */
	function get_details($data)
	{
		$responsible = array();
		if ($data['info_responsible'])
		{
			foreach($data['info_responsible'] as $uid)
			{
				$responsible[] = $GLOBALS['egw']->common->grab_owner_name($uid);
			}
		}
		if ($GLOBALS['egw_info']['user']['preferences']['courselog']['show_id'])
		{
			$id = ' #'.$data['info_id'];
		}
		foreach(array(
			'info_type'      => lang($this->courselog->enums['type'][$data['info_type']]).$id,
			'info_from'      => $data['info_from'],
			'info_addr'      => $data['info_addr'],
			'info_cat'       => $data['info_cat'] ? $GLOBALS['egw']->categories->id2name($data['info_cat']) : '',
			'info_priority'  => lang($this->courselog->enums['priority'][$data['info_priority']]),
			'info_owner'     => $GLOBALS['egw']->common->grab_owner_name($data['info_owner']),
			'info_status'    => lang($data['info_status']=='deleted'?'deleted':$this->courselog->status[$data['info_type']][$data['info_status']]),
			'info_percent'   => (int)$data['info_percent'].'%',
			'info_datecompleted' => $data['info_datecomplete'] ? $this->datetime($data['info_datecompleted']-$this->courselog->tz_offset_s) : '',
			'info_location'  => $data['info_location'],
			'info_startdate' => $data['info_startdate'] ? $this->datetime($data['info_startdate']-$this->courselog->tz_offset_s,null) : '',
			'info_enddate'   => $data['info_enddate'] ? $this->datetime($data['info_enddate']-$this->courselog->tz_offset_s,false) : '',
			'info_responsible' => implode(', ',$responsible),
			'info_subject'   => $data['info_subject'],
		) as $name => $value)
		{
			$details[$name] = array(
				'label' => lang($this->field2label[$name]),
				'value' => $value,
			);
			if ($name == 'info_subject') $details[$name]['type'] = 'summary';
		}
		$details['info_des'] = array(
			'value' => $data['info_des'],
			'type'  => 'multiline',
		);
		// should be moved to bo_tracking because auf the different custom field types
		if ($this->courselog->customfields)
		{
			foreach($this->courselog->customfields as $name => $field)
			{
				if ($field['type2'] && !in_array($data['info_type'],explode(',',$field['type2']))) continue;	// different type

				if (!$header_done)
				{
					$details['custom'] = array(
						'value' => lang('Custom fields').':',
						'type'  => 'reply',
					);
					$header_done = true;
				}
				$details['#'.$name] = array(
					'label' => $field['label'],
					'value' => $data['#'.$name],
				);
			}
		}
		return $details;
	}

	/**
	 * Save changes to the history log
	 *
	 * Reimplemented to store all customfields in a single field, as the history-log has only 2-char field-ids
	 *
	 * @param array $data current entry
	 * @param array $old=null old/last state of the entry or null for a new entry
	 * @param int number of log-entries made
	 */
	function save_history($data,$old)
	{
		$data_custom = $old_custom = array();
		foreach($this->courselog->customfields as $name => $custom)
		{
			if (isset($data['#'.$name]) && (string)$data['#'.$name]!=='') $data_custom[] = $custom['label'].': '.$data['#'.$name];
			if (isset($old['#'.$name]) && (string)$old['#'.$name]!=='') $old_custom[] = $custom['label'].': '.$old['#'.$name];
		}
		$data['custom'] = implode("\n",$data_custom);
		$old['custom'] = implode("\n",$old_custom);

		return parent::save_history($data,$old);
	}
}