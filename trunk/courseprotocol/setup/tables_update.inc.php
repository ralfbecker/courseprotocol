<?php
/**
 * eGroupWare - Setup
 * http://www.egroupware.org
 * Created by eTemplates DB-Tools written by ralfbecker@outdoor-training.de
 *
 * @license http://opensource.org/licenses/gpl-license.php GPL - GNU General Public License
 * @package courseprotocol
 * @subpackage setup
 * @version $Id: class.db_tools.inc.php 23717 2007-04-29 14:25:19Z ralfbecker $
 */

function courseprotocol_upgrade1_5_001()
{
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_consumable_material',array(
		'type' => 'text',
		'precision' => '255'
	));

	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.5.002';
}


function courseprotocol_upgrade1_5_002()
{
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_defects',array(
		'type' => 'text',
		'precision' => '255'
	));

	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.5.003';
}


function courseprotocol_upgrade1_5_003()
{
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_helmet',array(
		'type' => 'int',
		'precision' => '4'
	));
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_harness',array(
		'type' => 'varchar',
		'precision' => '255'
	));

	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.5.004';
}


function courseprotocol_upgrade1_5_004()
{
	$GLOBALS['egw_setup']->oProc->AlterColumn('egw_courseprotocol','cp_participants',array(
		'type' => 'varchar',
		'precision' => '255'
	));
	$GLOBALS['egw_setup']->oProc->AlterColumn('egw_courseprotocol','cp_harness',array(
		'type' => 'text',
		'precision' => '255'
	));
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_groups',array(
		'type' => 'text',
		'precision' => '255'
	));

	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.5.005';
}


function courseprotocol_upgrade1_5_005()
{
	$GLOBALS['egw_setup']->oProc->AlterColumn('egw_courseprotocol','cp_participants',array(
		'type' => 'text',
		'precision' => '255'
	));

	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.5.006';
}


function courseprotocol_upgrade1_5_006()
{
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_num_participant',array(
		'type' => 'text',
		'precision' => '255'
	));

	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.5.007';
}


function courseprotocol_upgrade1_5_007()
{
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_defect_cleared',array(
		'type' => 'varchar',
		'precision' => '255'
	));
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_defect_cleared_date',array(
		'type' => 'int',
		'precision' => '8'
	));

	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.5.008';
}


function courseprotocol_upgrade1_5_008()
{
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_mobil_city',array(
		'type' => 'text',
		'precision' => '255'
	));

	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.5.009';
}


function courseprotocol_upgrade1_5_009()
{
	$GLOBALS['egw_setup']->oProc->AddColumn('egw_courseprotocol','cp_status',array(
		'type' => 'varchar',
		'precision' => '255'
	));

	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.5.010';
}


function courseprotocol_upgrade1_5_010()
{
	return $GLOBALS['setup_info']['courseprotocol']['currentver'] = '1.6';
}
