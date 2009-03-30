<?php
/**
 * CourseProtocol - setup definitions
 *
 * @link http://www.egroupware.org
 * @author Stefan Becker <stefanBecker-AT-outdoor-training.de>
 * @package courseprotocol
 * @subpackage setup
 * @copyright (c) 2007 by Stefan Becker <StefanBecker-AT-outdoor-training.de>
 * @license http://opensource.org/licenses/gpl-license.php GPL - GNU General Public License
 * @version $Id: setup.inc.php 23739 2007-10-15 09:10:36Z StefanBecker $
 */

$setup_info['courseprotocol']['name']      = 'courseprotocol';
$setup_info['courseprotocol']['title']     = 'Course Protocol';
$setup_info['courseprotocol']['version']   = '1.6';
$setup_info['courseprotocol']['app_order'] = 100;     // at the end
$setup_info['courseprotocol']['tables']    = array('egw_courseprotocol','egw_courseprotocol_extra','egw_courseprotocol_occ'); // if there are any
$setup_info['courseprotocol']['enable']    = 1;
$setup_info['courseprotocol']['index']     = 'courseprotocol.uicourseprotocol.index';

/* Dependencies for this app to work */
$setup_info['courseprotocol']['depends'][] = array(
		'appname'  => 'phpgwapi',
		'versions' => Array('1.5','1.6','1.7')
	);
$setup_info['courseprotocol']['depends'][] = array(
		'appname'  => 'etemplate',
		'versions' => Array('1.5','1.6','1.7')
	);
$setup_info['courseprotocol']['tables'] = array('egw_courseprotocol','egw_courseprotocol_extra','egw_courseprotocol_occ');

$setup_info['courseprotocol']['license']  = 'GPL';
$setup_info['courseprotocol']['description'] =
'Coursprotocol for Outdoor Training.';
$setup_info['courseprotocol']['note'] =
'The Coursprotocl application is sponsored by:<ul>
<li> <a href="http://www.outdoor-training.de" target="_blank">Outdoor Unlimited Training GmbH</a></li>
</ul>';


/* The hooks this app includes, needed for hooks registration */
$setup_info['courseprotocol']['hooks']['preferences'] = 'courseprotocol'.'.cp_admin_prefs_sidebox_hooks.all_hooks';
$setup_info['courseprotocol']['hooks']['settings'] = 'courseprotocol'.'.cp_admin_prefs_sidebox_hooks.settings';
$setup_info['courseprotocol']['hooks']['admin'] = 'courseprotocol'.'.cp_admin_prefs_sidebox_hooks.all_hooks';
$setup_info['courseprotocol']['hooks']['sidebox_menu'] = 'courseprotocol'.'.cp_admin_prefs_sidebox_hooks.all_hooks';
$setup_info['courseprotocol']['hooks']['search_link'] = 'courseprotocol'.'.bocourseprotocol.search_link';
$setup_info['courseprotocol']['hooks']['group_acl'] = 'cp_admin_prefs_sidebox_hooks::group_acl';
