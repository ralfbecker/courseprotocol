<?php
require_once(EGW_INCLUDE_ROOT.'/courseprotocol/inc/class.bocourseprotocol.inc.php');

class uicourseprotocol extends bocourseprotocol
{
	var $public_functions = array(
		'index'	=> True,
		'edit'	=> True,
		'view'  => True,
		'occindex'	=> True,
		);
	/**
	 * instantiation of the etemplate as classenvariable
	 *
 	 * @var etemplate
	 */
	var $tmpl;

	/*
		our original , non eTemplate approach
		Form with two inputfields, which is switched to a greeting form if there is some input in fname or sname
		two links at the bottom of the form to switch to the eTemplate Version of the application, or to
		reload the form, via href/link.
	*/

	function uicourseprotocol()
	{
		$GLOBALS['egw_info']['flags']['app_header']=lang('Courseprotocol');
		// instantiation of etemplate as class variable
		$this->tmpl = new etemplate();
		/*
			since we extend the boclass, we do not have to instantiate an object of the boclass.
			none the less, we have to call the constructor of that class, to ensure, everything
			done there is done as we call the uicourseprotocol class
		*/
		//$this->bo   =& CreateObject('test.bocourseprotocol');
		$this->bocourseprotocol();
	}


	function view($content=null)
	{
		return $this->edit($content,true);
	}


	function edit($content=null,$view=false)
	{
		$tabs = 'general|desc|events|occ|links|custom|history';
		if (!is_array($content))
		{
			if ($view || (int)$_GET['cp_id'])
			{
				if (!$this->read((int)$_GET['cp_id']))
				{
					$GLOBALS['egw']->common->egw_header();
					echo "<script>alert('".lang('Permission denied!!!')."'); window.close();</script>\n";
					$GLOBALS['egw']->common->egw_exit();
				}
				if (!$view && !$this->check_acl(EGW_ACL_EDIT))
				{
				//	$view = true;
				}
			}
		}
		if (is_array($content))
		{
			$view = $content['view'];

			list($button) = @each($content['button']); unset($content['button']);

			if ($content['occs']['edit'])
			{
				list($occ_id) = each($content['occs']['edit']);
				$content['occ'] = $this->occ->read(array('cp_occ_id' => $occ_id));
				unset($content['occs']['edit']);
			}

			if ($content['occs']['delete'])
			{
				list($occ_id) = each($content['occs']['delete']);
				if ($this->occ->delete(array('cp_occ_id' => $occ_id)))
				{
					$content['msg'] = lang('Occurence deleted!');
					$content['occs'] = $this->occ->search(array('cp_id' => $content['cp_id']),false,'cp_occ_date');
					if (is_array($content['occs'])) array_unshift($content['occs'],false);		// make occs index start
				}
				else
				{
					$content['msg'] = lang('Delete failed!');
				}
				unset($content['occs']['delete']);
			}

			switch($button)
			{
				case 'edit':
					if ($this->check_acl(EGW_ACL_EDIT)) $view = false;
					break;

				case 'save':
				case 'apply':
					if ($this->save($content) == 0)
					{
						$content['cp_id'] = $this->data['cp_id'];
						if (is_array($content['cp_linkto']['to_id']) && count($content['cp_linkto']['to_id']))
						{
							egw_link::link('courseprotocol',$content['cp_id'],$content['cp_linkto']['to_id']);
							$content['cp_linkto']['to_id'] = $content['cp_id'];
						}
						$content['msg'] = lang('Protocol saved');
						$js = "opener.location.href=opener.location.href+(opener.location.href.indexOf('?')<0?'?':'&')+'msg=".addslashes(urlencode($content['msg']))."';";
						if ($button == 'save')
						{
							$js .= 'window.close();';
							echo "<html>\n<body>\n<script>\n$js\n</script>\n</body>\n</html>\n";
							$GLOBALS['egw']->common->egw_exit();
						}
						else
						{
							$GLOBALS['egw_info']['flags']['java_script'] = '<script>'.$js.'</script>';
						}
						if ($button == 'apply' && $this->occ_set($content['occ']))	// occ saved --> empty edit for next and refresh
						{
							unset($content['occ']);
							$content['occs'] = $this->occ->search(array('cp_id' => $content['cp_id']),false,'cp_occ_date');
							if (is_array($content['occs'])) array_unshift($content['occs'],false);		// make occs index start from 1
						}
					}
					else
					{
						$content['msg'] = lang('Error saving!');
					}
					break;

				case 'delete':
					if ($this->delete(array('cp_id'=>$content['cp_id'])))
					{
						$msg = lang('Protocol deleted');
						$js = "opener.location.href=opener.location.href+(opener.location.href.indexOf('?')<0?'?':'&')+'msg=".addslashes(urlencode($msg))."';";
						$js .= 'window.close();';
						echo "<html>\n<body>\n<script>\n$js\n</script>\n</body>\n</html>\n";
						$GLOBALS['egw']->common->egw_exit();
					}
					else
					{
						$content['msg'] = lang('Delete failed!');
					}
					break;
			}
		}
		else
		{
			if ((int)$_GET['cp_id'] && ($content = $this->read(array('cp_id' => $_GET['cp_id']))))
			{
				if (is_array($content['occs'])) array_unshift($content['occs'],false);		// make occs index start from 1
			}
			else	// not found or new
			{
				$this->init();
			}
			$content['cp_linkto'] = array(
				'to_app' => 'courseprotocol',
				'to_id'  => $content['cp_id'],
			);
			if (!$this->data['cp_id'] && isset($_REQUEST['link_app']) && isset($_REQUEST['link_id']) && !is_array($content['link_to']['to_id']))
			{
				$link_ids = is_array($_REQUEST['link_id']) ? $_REQUEST['link_id'] : array($_REQUEST['link_id']);
				foreach(is_array($_REQUEST['link_app']) ? $_REQUEST['link_app'] : array($_REQUEST['link_app']) as $n => $link_app)
				{
					$link_id = $link_ids[$n];
					if (preg_match('/^[a-z_0-9-]+:[:a-z_0-9-]+$/i',$link_app.':'.$link_id))	// gard against XSS
					{
						egw_link::link('courseprotocol',$content['cp_linkto']['to_id'],$link_app,$link_id);
					}
				}
			}
		}
		$readonlys[$tabs]['history'] = true;
		$readonlys[$tabs]['custom'] = !$this->config['customfields'];
		$readonlys = array(
			'button[delete]'   => !$this->data['cp_id'] || !$this->check_acl(EGW_ACL_DELETE),
			'button[edit]'     => !$view || !$this->check_acl(EGW_ACL_EDIT),
			'button[save]'     => $view,
			'button[apply]'    => $view,
			);
		if ($view)
		{foreach(array_merge(array_keys($this->data),array('pm_id','pl_id','link_to')) as $key)
			{
				$readonlys[$key] = true;
			}
			$readonlys['cp_linkto'] = true;
			if (!$this->customfields) $readonlys[$tabs]['custom'] = true;	// suppress tab if there are not customfields

		}

		$GLOBALS['egw_info']['flags']['app_header'] = lang(courseprotocol).' - '.
			($view ? lang('View') : ($this->data['cp_id'] ? lang('Edit') : lang('Add')));

		$this->tmpl->read('courseprotocol.edit');
		//_debug_array($readonlys);
		$this->tmpl->exec('courseprotocol.uicourseprotocol.edit',$content,array(
			'cp_site' => $this->sites,
			'cp_occ_type' => $this->oc_types,
			'cp_helmet'=>$this->helmet,
			'cp_harness' => $this->harness,

		),$readonlys,array(
			'cp_id'=>$content['cp_id'],
			'occ' => array('cp_occ_id' => $content['occ']['cp_occ_id']),
			'occs' => $content['occs'],
			'view' => $view,
		),2);
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
		$GLOBALS['egw']->session->appsession('session_data','courseprotocol',$query);

		return parent::get_rows($query,$rows,$readonlys,$join);
	}




	function index($content=null)
	{

		if (is_array($content))
		{
			if ($content['nm']['rows']['delete'])
			{
				list($id) = each($content['nm']['rows']['delete']);
				unset($content['nm']['rows']['delete']);

				if ($this->delete(array('cp_id'=>$id)))
				{
					$content['msg'] = lang('Protocol deleted');
				}
				else
				{
					$content['msg'] = lang('Delete failed!');
				}
			}
		}
		else
		{
			$content['msg'] = $_GET['msg'];
		}
		// initializing of the nextmatch widget, through reading of stored sessiondata
    $content['nm']= $GLOBALS['egw']->session->appsession('session_data','courseprotocol');
    // if empty, or not an  array, then you have to do the initializing on your own.
    if (!is_array($content['nm']))
    {
        $content['nm'] = array(                           // I = value set by the app, 0 = value on return / output
            'get_rows'       => 'courseprotocol.uicourseprotocol.get_rows',   // I  method/callback to request the data for the rows eg. 'notes.bo.get_rows'
            'filter_label'   => '',                       // I  label for filter    (optional)
            'filter_help'    => '',                       // I  help-msg for filter (optional)
            'no_filter'      => True,                     // I  disable the 1. filter
            'no_filter2'     => True,                     // I  disable the 2. filter (params are the same as for filter)
            //'no_cat'         => True,                     // I  disable the cat-selectbox
            //'template'       =>   ,                     // I  template to use for the rows, if not set via options
            //'header_left'    =>   ,                     // I  template to show left of the range-value, left-aligned (optional)
            'header_right'   => 'courseprotocol.index.right', // I  template to show right of the range-value, right-aligned (optional)
            //'bottom_too'     => True,                   // I  show the nextmatch-line (arrows, filters, search, ...) again after the rows
            'never_hide'     => True,                     // I  never hide the nextmatch-line if less then maxmatch entrie
            'lettersearch'   => False,                    // I  show a lettersearch
            'searchletter'   => '',                       // I0 active letter of the lettersearch or false for [all]
            'start'          => 0,                        // IO position in list
            //'num_rows'       =>   ,                     // IO number of rows to show, defaults to maxmatches from the general prefs
            //'cat_id'         =>   ,                     // IO category, if not 'no_cat' => True
            //'search'         =>   ,                     // IO search pattern
            'order'          => 'cal_id',               // IO name of the column to sort after (optional for the sortheaders)
            'sort'           => 'DESC',                   // IO direction of the sort: 'ASC' or 'DESC'
            'col_filter'     => array(),                  // IO array of column-name value pairs (optional for the filterheaders)
            //'filter'         =>   ,                     // IO filter, if not 'no_filter' => True
            //'filter_no_lang' => True,                   // I  set no_lang for filter (=dont translate the options)
            //'filter_onchange'=> 'this.form.submit();',  // I onChange action for filter, default: this.form.submit();
            //'filter2'        =>   ,                     // IO filter2, if not 'no_filter2' => True
            //'filter2_no_lang'=> True,                   // I  set no_lang for filter2 (=dont translate the options)
            //'filter2_onchange'=> 'this.form.submit();', // I onChange action for filter, default: this.form.submit();
            //'rows'           =>   ,                     //  O content set by callback
            //'total'          =>   ,                     //  O the total number of entries
            //'sel_options'    =>   ,                     //  O additional or changed sel_options set by the callback and merged into $tmpl->sel_options
        );
    }
		//_debug_array($content);
		$this->tmpl->read('courseprotocol.index');
		$this->tmpl->set_cell_attribute('debuginfo','disabled',!$debug);
		$this->tmpl->set_cell_attribute('myhrule','disabled',!$separator);
		$this->tmpl->exec('courseprotocol.uicourseprotocol.index',$content,array(
			'cp_site' => $this->sites,
			'cp_helmet' => $this->helmet,
//			'cp_harness' =>$GLOBALS['egw']->tranlation->convert($this->harness,'utf-8'),
			'cp_harness' =>$this->harness,
		),array(),$preserv);
		// the debug info will be displayed at the very end of the page
		//_debug_array($content);

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
	function get_rows_occ($query,&$rows,&$readonlys,$join='')
	{
		$GLOBALS['egw']->session->appsession('occ_session_data','courseprotocol',$query);

		return $this->occ->get_rows($query,$rows,$readonlys,$join);
	}


	function occindex($content=null)
	{
		if (is_array($content))
		{
			if ($content['nm']['rows']['delete'])
			{
				list($id) = each($content['nm']['rows']['delete']);
				unset($content['nm']['rows']['delete']);

				if ($this->occ->delete(array('cp_occ_id'=>$id)))
				{
					$content['msg'] = lang('Occurence deleted');
				}
				else
				{
					$content['msg'] = lang('Delete failed!');
				}
			}
		}
		else
		{
			$content['msg'] = $_GET['msg'];
		}
			// initializing of thwe nextmatch widget, through reading of stored sessiondata
    $content['nm']= $GLOBALS['egw']->session->appsession('occ_session_data','courseprotocol');
    // if empty, or not an  array, then you have to do the initializing on your own.
   // if (!is_array($content['nm']))
    {
        $content['nm'] = array(                           // I = value set by the app, 0 = value on return / output
            'get_rows'       => 'courseprotocol.uicourseprotocol.get_rows_occ',   // I  method/callback to request the data for the rows eg. 'notes.bo.get_rows'
            'filter_label'   => '',                       // I  label for filter    (optional)
            'filter_help'    => '',                       // I  help-msg for filter (optional)
            'no_filter'      => True,                     // I  disable the 1. filter
            'no_filter2'     => True,                     // I  disable the 2. filter (params are the same as for filter)
            //'no_cat'         => True,                     // I  disable the cat-selectbox
            //'template'       =>   ,                     // I  template to use for the rows, if not set via options
            //'header_left'    =>   ,                     // I  template to show left of the range-value, left-aligned (optional)
            //'header_right'   =>   ,                     // I  template to show right of the range-value, right-aligned (optional)
            //'bottom_too'     => True,                   // I  show the nextmatch-line (arrows, filters, search, ...) again after the rows
            'never_hide'     => True,                     // I  never hide the nextmatch-line if less then maxmatch entrie
            'lettersearch'   => False,                    // I  show a lettersearch
            'searchletter'   => '',                       // I0 active letter of the lettersearch or false for [all]
            'start'          => 0,                        // IO position in list
            //'num_rows'       =>   ,                     // IO number of rows to show, defaults to maxmatches from the general prefs
            //'cat_id'         =>   ,                     // IO category, if not 'no_cat' => True
            //'search'         =>   ,                     // IO search pattern
            'order'          => 'cp_occ_date',               // IO name of the column to sort after (optional for the sortheaders)
            'sort'           => 'DESC',                   // IO direction of the sort: 'ASC' or 'DESC'
            'col_filter'     => array(),                  // IO array of column-name value pairs (optional for the filterheaders)
            //'filter'         =>   ,                     // IO filter, if not 'no_filter' => True
            //'filter_no_lang' => True,                   // I  set no_lang for filter (=dont translate the options)
            //'filter_onchange'=> 'this.form.submit();',  // I onChange action for filter, default: this.form.submit();
            //'filter2'        =>   ,                     // IO filter2, if not 'no_filter2' => True
            //'filter2_no_lang'=> True,                   // I  set no_lang for filter2 (=dont translate the options)
            //'filter2_onchange'=> 'this.form.submit();', // I onChange action for filter, default: this.form.submit();
            //'rows'           =>   ,                     //  O content set by callback
            //'total'          =>   ,                     //  O the total number of entries
            //'sel_options'    =>   ,                     //  O additional or changed sel_options set by the callback and merged into $tmpl->sel_options
         	'default_cols'   => '!cp_occ_analy'	// I  columns to use if there's no user or default pref (! as first char uses all but the named columns), default all columns
            );
    }
		$content['msg'] = $_GET['msg'];

		//_debug_array($content);
		$this->tmpl->read('courseprotocol.occindex');
		$this->tmpl->set_cell_attribute('debuginfo','disabled',!$debug);
		$this->tmpl->set_cell_attribute('myhrule','disabled',!$separator);
		$this->tmpl->exec('courseprotocol.uicourseprotocol.occindex',$content,array(
			'cp_occ_type' => $this->oc_types,
		),array(),$preserv);
		// the debug info will be displayed at the very end of the page
		//_debug_array($content);

	}
}


