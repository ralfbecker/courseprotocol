<?php

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

	function __construct()
	{
		parent::__construct('courseprotocol','egw_courseprotocol');
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
			foreach($GLOBALS['egw']->categories->return_all_children($query['cat_id']) as $cat)
			{
				$cats[] = $this->db->concat("','",'cp_events',"','")." LIKE '%,".(int)$cat."%'";
			}
			$query['col_filter'][] = '('.implode(' OR ',$cats).')';
		}
		return parent::get_rows($query,$rows,$readonlys,$join);
	}

	/**
	 * searches db for rows matching searchcriteria
	 *
	 * '*' and '?' are replaced with sql-wildcards '%' and '_'
	 *
	 * For a union-query you call search for each query with $start=='UNION' and one more with only $order_by and $start set to run the union-query.
	 *
	 * @param array/string $criteria array of key and data cols, OR a SQL query (content for WHERE), fully quoted (!)
	 * @param boolean/string/array $only_keys=true True returns only keys, False returns all cols. or
	 *	comma seperated list or array of columns to return
	 * @param string $order_by='' fieldnames + {ASC|DESC} separated by colons ',', can also contain a GROUP BY (if it contains ORDER BY)
	 * @param string/array $extra_cols='' string or array of strings to be added to the SELECT, eg. "count(*) as num"
	 * @param string $wildcard='' appended befor and after each criteria
	 * @param boolean $empty=false False=empty criteria are ignored in query, True=empty have to be empty in row
	 * @param string $op='AND' defaults to 'AND', can be set to 'OR' too, then criteria's are OR'ed together
	 * @param mixed $start=false if != false, return only maxmatch rows begining with start, or array($start,$num), or 'UNION' for a part of a union query
	 * @param array $filter=null if set (!=null) col-data pairs, to be and-ed (!) into the query without wildcards
	 * @param string $join='' sql to do a join, added as is after the table-name, eg. "JOIN table2 ON x=y" or
	 *	"LEFT JOIN table2 ON (x=y AND z=o)", Note: there's no quoting done on $join, you are responsible for it!!!
	 * @param boolean $need_full_no_count=false If true an unlimited query is run to determine the total number of rows, default false
	 * @return boolean/array of matching rows (the row is an array of the cols) or False
	 */
	function &search($criteria,$only_keys=True,$order_by='',$extra_cols='',$wildcard='',$empty=False,$op='AND',$start=false,$filter=null,$join='',$need_full_no_count=false)
	{
		if (!is_array($extra_cols))
		{
			$extra_cols = $extra_cols ? explode(',',$extra_cols) : array();
		}
		$extra_cols[] = "(SELECT COUNT(*) FROM {$this->occ->table_name} WHERE {$this->occ->table_name}.cp_id=$this->table_name.cp_id) AS occurences";
		$extra_cols[].= " (SELECT SUBSTRING(cp_occ_desc,1,50) FROM {$this->occ->table_name} WHERE {$this->occ->table_name}.cp_id=$this->table_name.cp_id LIMIT 1) AS occurences_txt";
		return parent::search($criteria,$only_keys,$order_by,$extra_cols,$wildcard,$empty,$op,$start,$filter,$join,$need_full_no_count);
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
