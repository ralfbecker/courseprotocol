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


	$phpgw_baseline = array(
		'egw_courseprotocol' => array(
			'fd' => array(
				'cp_id' => array('type' => 'auto','precision' => '10','nullable' => False),
				'cp_company' => array('type' => 'int','precision' => '4'),
				'cp_participants' => array('type' => 'text','precision' => '255'),
				'cp_date' => array('type' => 'int','precision' => '8'),
				'cp_carabiner' => array('type' => 'int','precision' => '2'),
				'cp_fotos' => array('type' => 'varchar','precision' => '128'),
				'cp_trainer' => array('type' => 'varchar','precision' => '255'),
				'cp_trainer_custom' => array('type' => 'varchar','precision' => '128'),
				'cp_travel_expenses' => array('type' => 'varchar','precision' => '255'),
				'cp_course_description' => array('type' => 'text','precision' => '255'),
				'cp_created' => array('type' => 'int','precision' => '8'),
				'cp_modified' => array('type' => 'int','precision' => '8'),
				'cp_creator' => array('type' => 'int','precision' => '4'),
				'cp_modifier' => array('type' => 'int','precision' => '4'),
				'cp_company_custom' => array('type' => 'varchar','precision' => '255'),
				'cp_course' => array('type' => 'varchar','precision' => '255'),
				'cp_site' => array('type' => 'int','precision' => '2'),
				'cp_events' => array('type' => 'varchar','precision' => '255'),
				'cal_id' => array('type' => 'int','precision' => '4'),
				'cp_consumable_material' => array('type' => 'text','precision' => '255'),
				'cp_defects' => array('type' => 'text','precision' => '255'),
				'cp_helmet' => array('type' => 'int','precision' => '4'),
				'cp_harness' => array('type' => 'text','precision' => '255'),
				'cp_groups' => array('type' => 'text','precision' => '255'),
				'cp_num_participant' => array('type' => 'text','precision' => '255'),
				'cp_defect_cleared' => array('type' => 'varchar','precision' => '255'),
				'cp_defect_cleared_date' => array('type' => 'int','precision' => '8'),
				'cp_mobil_city' => array('type' => 'text','precision' => '255')
			),
			'pk' => array('cp_id'),
			'fk' => array(),
			'ix' => array(),
			'uc' => array()
		),
		'egw_courseprotocol_extra' => array(
			'fd' => array(
				'cp_id' => array('type' => 'int','precision' => '4','nullable' => False),
				'cp_extra_name' => array('type' => 'varchar','precision' => '32','nullable' => False),
				'cp_extra_value' => array('type' => 'varchar','precision' => '255','nullable' => False)
			),
			'pk' => array('cp_id','cp_extra_name'),
			'fk' => array(),
			'ix' => array(),
			'uc' => array()
		),
		'egw_courseprotocol_occ' => array(
			'fd' => array(
				'cp_occ_id' => array('type' => 'auto','precision' => '10','nullable' => False),
				'cp_id' => array('type' => 'int','precision' => '4'),
				'cp_occ_type' => array('type' => 'int','precision' => '4'),
				'cp_occ_date' => array('type' => 'int','precision' => '8'),
				'cp_occ_event' => array('type' => 'int','precision' => '4'),
				'cp_occ_trainer' => array('type' => 'varchar','precision' => '255'),
				'cp_occ_desc' => array('type' => 'text'),
				'cp_occ_analy' => array('type' => 'text')
			),
			'pk' => array('cp_occ_id'),
			'fk' => array(),
			'ix' => array('cp_id'),
			'uc' => array()
		)
	);
