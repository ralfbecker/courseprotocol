<?php
include_once(EGW_INCLUDE_ROOT . '/etemplate/inc/class.so_sql.inc.php');

/**
 * General storage class for test (database)
 */
class socourseprotocol extends so_sql
{
	/**
	 * Instance of so_sql for egw_courseprotocol_occ
	 * @var so_sql
	 */
	var $occ;
	/**
	 * Table name for custom fields
	 */
	var $extra_table='egw_courseprotocol_extra';

	function socourseprotocol()
	{
		$this->so_sql('courseprotocol','egw_courseprotocol');
		//$this->empty_on_write = "''";
		
		$this->occ = new so_sql('courseprotocol','egw_courseprotocol_occ');
		
		
	}
	
	/**
	 * query rows for the nextmatch widget
	 *
	 * @param array $query with keys 'start', 'search', 'order', 'sort', 'col_filter'
	 *	For other keys like 'filter', 'cat_id' you have to reimplement this method in a derived class.
	 * @param array &$rows returned rows/competitions
	 * @param array &$readonlys eg. to disable buttons based on acl, not use here, maybe in a derived class
	 * @param string $join='' sql to do a join, added as is after the table-name, eg. ", table2 WHERE x=y" or 
	 *	"LEFT JOIN table2 ON (x=y)", Note: there's no quoting done on $join!
	 * @return int total number of rows
	 */
	function get_rows($query,&$rows,&$readonlys,$join='')
	{
		if ($query['col_filter']['cp_trainer'])
		{
			$query['col_filter'][] = $this->db->concat("','",'cp_trainer',"','")." LIKE '%,".(int)$query['col_filter']['cp_trainer']."%'";
			unset($query['col_filter']['cp_trainer']);
		}
		if ($query['cat_id'])
		{
			$cats = array();
			if (!is_object($GLOBALS['egw']->categories))
			{
				$GLOBALS['egw']->categories =& CreateObject('phpgwapi.categories');
			}
			foreach($GLOBALS['egw']->categories->return_all_children($query['cat_id']) as $cat)
			{
				$cats[] = $this->db->concat("','",'cp_events',"','")." LIKE '%,".(int)$cat."%'";
			}
			$query['col_filter'][] = '('.implode(' OR ',$cats).')';
		}
		return parent::get_rows($query,$rows,$readonlys,$join);
	}
	
	function save($keys=null)  // did _not_ ensure ACL
	{
		if (!($err = parent::save($keys)))
		{
			foreach($this->data as $key => $val)
			{
				if ($key[0] != '#')
				{
					continue;	// no customfield
				}
				$this->data[$key] = $val;	// update internal data
				
				$this->db->insert($this->extra_table,array(
						'cp_extra_value'  =>$val
					),array(
						'cp_id'           => $this->data['cp_id'],
						'cp_extra_name'   => substr($key,1),
					),__LINE__,__FILE__);
			}
			if (is_array($keys['occ']) && $this->occ_set($keys['occ']))
			{
				if ($keys['occ']['cp_occ_trainer'] && is_array($keys['occ']['cp_occ_trainer']))
				{
					$keys['occ']['cp_occ_trainer'] = implode(',',$keys['occ']['cp_occ_trainer']);
				}
				$keys['occ']['cp_id'] = $this->data['cp_id'];
				//echo "<p>saving occurence</p>"; _debug_array($keys['occ']);
				$this->occ->save($keys['occ']);
			}
		}
		return $err;
	}
	
	function occ_set($occ)
	{
		return $occ['cp_occ_desc'] && $occ['cp_occ_date'];
	}
	
	function read($keys)
	{
		if (($ret = parent::read($keys)))
		{
			$this->db->select($this->extra_table,'*',array(
				'cp_id' => $this->data['cp_id'],
			),__LINE__,__FILE__);
			while(($row = $this->db->Row(true)))
			{
				$this->data['#'.$row['cp_extra_name']] = $row['cp_extra_value'];
			}
			$this->data['occs'] = $this->occ->search(array('cp_id' => $this->data['cp_id']),false,'cp_occ_date');
		}
		return $ret ? $this->data : $ret;
	}
	
	function data_merge($new)
	{
		parent::data_merge($new);
		
		foreach($new as $key => $val)
		{
			if ($key[0] == '#') $this->data[$key] = $val;
		}
	}
}
