<?php
/**
 * Courseprotocol -  Admin-, Preferences- and SideboxMenu-Hooks
 *
 * @link http://www.egroupware.org
 * @author Stefan Becker <StefanBecker-AT-outdoor-training.de>
 * @package courseprotocol
 * @copyright (c) 2007 by Stefan Becker <StefanBecker-AT-outdoor-training.de>
 * @license http://opensource.org/licenses/gpl-license.php GPL - GNU General Public License
 * @version $Id: class.cp_admin_prefs_sidebox_hooks.inc.php 
 */


class cp_admin_prefs_sidebox_hooks
{
	var $public_functions = array(
//		'check_set_default_prefs' => true,
	);
	var $config = array();

	function pm_admin_prefs_sidebox_hooks()
	{
		$config =& CreateObject('phpgwapi.config','courseprotocol');
		$config->read_repository();
		$this->config =& $config->config_data;
		unset($config);
	}

	/**
	 * hooks to build projectmanager's sidebox-menu plus the admin and preferences sections
	 *
	 * @param string/array $args hook args
	 */
	function all_hooks($args)
	{
		$appname = 'courseprotocol';
		$location = is_array($args) ? $args['location'] : $args;
		//echo "<p>ts_admin_prefs_sidebox_hooks::all_hooks(".print_r($args,True).") appname='$appname', location='$location'</p>\n";

		if ($location == 'sidebox_menu')
		{
			$file = array(
			);
			display_sidebox($appname,$GLOBALS['egw_info']['apps'][$appname]['title'].' '.lang('Menu'),$file);
		}

		if ($GLOBALS['egw_info']['user']['apps']['preferences'] && $location != 'admin')
		{
			{
			$file = array(
				'View Occurrence' => $GLOBALS['egw']->link('/index.php','menuaction=courseprotocol.uicourseprotocol.occindex'),
			);
			display_sidebox($appname,lang('Courseprotocol menu'),$file);
		}

			
			
			$file = array(
//				'Preferences'     => $GLOBALS['egw']->link('/index.php','menuaction=preferences.uisettings.index&appname='.$appname),
//				'Grant Access'    => $GLOBALS['egw']->link('/index.php','menuaction=preferences.uiaclprefs.index&acl_app='.$appname),
//				'Edit Categories' => $GLOBALS['egw']->link('/index.php','menuaction=preferences.uicategories.index&cats_app=' . $appname . '&cats_level=True&global_cats=True'),
	
				);
			if ($location == 'preferences')
			{
				display_section($appname,$file);
			}
			else
			{
				display_sidebox($appname,lang('Preferences'),$file);
			}
		}

		if ($GLOBALS['egw_info']['user']['apps']['admin'] && $location != 'preferences')
		{
			$file = Array(
//				'Site Configuration' => $GLOBALS['egw']->link('/index.php','menuaction=admin.uiconfig.index&appname=' . $appname),
				'Custom fields' => $GLOBALS['egw']->link('/index.php','menuaction=admin.customfields.edit&appname='.$appname),
				'Global Categories'  => $GLOBALS['egw']->link('/index.php',array(
					'menuaction' => 'admin.uicategories.index',
					'appname'    => $appname,
					'global_cats'=> true)),
					
			);
			if ($location == 'admin')
			{
				display_section($appname,$file);
			}
			else
			{
				display_sidebox($appname,lang('Admin'),$file);
			}
		}
	}
	
	/**
	 * populates $GLOBALS['settings'] for the preferences
	 */
	function settings()
	{
		$this->check_set_default_prefs();

		return true;	// otherwise prefs say it cant find the file ;-)
	}
	
	/**
	 * Check if reasonable default preferences are set and set them if not
	 *
	 * It sets a flag in the app-session-data to be called only once per session
	 */
	function check_set_default_prefs()
	{
		if ($GLOBALS['egw']->session->appsession('default_prefs_set','courseprotocol'))
		{
			return;
		}
		$GLOBALS['egw']->session->appsession('default_prefs_set','courseprotocol','set');

		$default_prefs =& $GLOBALS['egw']->preferences->default['courseprotocol'];

		$defaults = array(
		);
		foreach($defaults as $var => $default)
		{
			if (!isset($default_prefs[$var]) || $default_prefs[$var] === '')
			{
				$GLOBALS['egw']->preferences->add('courseprotocol',$var,$default,'default');
				$need_save = True;
			}
		}
		if ($need_save)
		{
			$GLOBALS['egw']->preferences->save_repository(False,'default');
		}
	}
}