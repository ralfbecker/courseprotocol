<?php
	/**
	 * eGroupWare - eTemplates for Application courseprotocol
	 * http://www.egroupware.org 
	 * generated by soetemplate::dump4setup() 2007-12-17 14:11
	 *
	 * @license http://opensource.org/licenses/gpl-license.php GPL - GNU General Public License
	 * @package courseprotocol
	 * @subpackage setup
	 * @version $Id: class.soetemplate.inc.php 23860 2007-05-13 11:24:12Z ralfbecker $
	 */

$templ_version=1;

$templ_data[] = array('name' => 'courseprotocol.edit','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:2:{i:0;a:4:{s:4:"type";s:4:"grid";s:4:"data";a:4:{i:0;a:5:{s:1:"A";s:3:"650";s:1:"B";s:3:"350";s:2:"h1";s:6:",!@msg";s:2:"c2";s:4:",top";s:2:"h3";s:13:",@hidebuttons";}i:1;a:2:{s:1:"A";a:4:{s:4:"span";s:13:"all,redItalic";s:7:"no_lang";s:1:"1";s:4:"name";s:3:"msg";s:4:"type";s:5:"label";}s:1:"B";a:1:{s:4:"type";s:5:"label";}}i:2;a:2:{s:1:"A";a:5:{s:4:"span";s:3:"all";s:4:"type";s:3:"tab";s:5:"label";s:57:"General|Describtion|Events|Occurrence|Links|Extra|History";s:4:"name";s:44:"general|desc|events|occ|links|custom|history";s:4:"help";s:125:"Customer name|Description of the course|Description of the Occurrence|Different Events|Differnet links|Custom fields| History";}s:1:"B";a:1:{s:4:"type";s:5:"label";}}i:3;a:2:{s:1:"A";a:5:{s:4:"type";s:4:"hbox";s:4:"size";s:1:"3";i:1;a:4:{s:4:"span";s:1:"4";s:5:"label";s:4:"Save";s:4:"name";s:12:"button[save]";s:4:"type";s:6:"button";}i:2;a:3:{s:5:"label";s:5:"Apply";s:4:"name";s:13:"button[apply]";s:4:"type";s:6:"button";}i:3;a:4:{s:5:"label";s:6:"Cancel";s:7:"onclick";s:15:"window.close();";s:4:"name";s:14:"button[cancel]";s:4:"type";s:6:"button";}}s:1:"B";a:5:{s:5:"label";s:6:"Delete";s:5:"align";s:5:"right";s:7:"onclick";s:39:"return confirm(\'Delete this protocol\');";s:4:"name";s:14:"button[delete]";s:4:"type";s:6:"button";}}}s:4:"cols";i:2;s:4:"rows";i:3;}i:1;a:1:{s:4:"type";s:5:"label";}}','size' => '','style' => '','modified' => '1193667514',);

$templ_data[] = array('name' => 'courseprotocol.edit.custom','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:6:{s:4:"type";s:4:"grid";s:4:"data";a:3:{i:0;a:3:{s:2:"c1";s:2:"th";s:2:"h1";s:2:"20";s:2:"h2";s:4:"100%";}i:1;a:1:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:13:"Custom fields";}}i:2;a:1:{s:1:"A";a:1:{s:4:"type";s:12:"customfields";}}}s:4:"cols";i:1;s:4:"rows";i:2;s:4:"size";s:25:"100%,500,,row_on,0,0,auto";s:7:"options";a:6:{i:3;s:6:"row_on";i:0;s:4:"100%";i:1;s:3:"500";i:6;s:4:"auto";i:4;s:1:"0";i:5;s:1:"0";}}}','size' => '100%,500,,row_on,0,0,auto','style' => '','modified' => '1193667173',);

$templ_data[] = array('name' => 'courseprotocol.edit.desc','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:6:{s:4:"type";s:4:"grid";s:4:"data";a:5:{i:0;a:3:{s:2:"c1";s:2:"th";s:2:"h1";s:2:"20";s:2:"h4";s:3:"30%";}i:1;a:1:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:42:"Cours description: (proccess, transfer,..)";}}i:2;a:1:{s:1:"A";a:1:{s:4:"type";s:5:"label";}}i:3;a:1:{s:1:"A";a:3:{s:4:"name";s:21:"cp_course_description";s:4:"type";s:8:"textarea";s:4:"size";s:5:"25,90";}}i:4;a:1:{s:1:"A";a:1:{s:4:"type";s:5:"label";}}}s:4:"cols";i:1;s:4:"rows";i:4;s:4:"size";s:4:",500";s:7:"options";a:1:{i:1;s:3:"500";}}}','size' => ',500','style' => '','modified' => '1193667181',);

$templ_data[] = array('name' => 'courseprotocol.edit.events','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:6:{s:4:"type";s:4:"grid";s:4:"data";a:7:{i:0;a:7:{s:2:"c1";s:6:"th,top";s:2:"h1";s:2:"20";s:2:"h2";s:3:"200";s:2:"c3";s:2:"th";s:2:"h3";s:2:"20";s:2:"c5";s:2:"th";s:2:"h5";s:2:"20";}i:1;a:3:{s:1:"A";a:3:{s:4:"span";s:3:"all";s:4:"type";s:5:"label";s:5:"label";s:6:"Events";}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}}i:2;a:3:{s:1:"A";a:3:{s:4:"name";s:9:"cp_events";s:4:"size";s:14:"13,1,width:99%";s:4:"type";s:8:"tree-cat";}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}}i:3;a:3:{s:1:"A";a:3:{s:4:"span";s:3:"all";s:4:"type";s:5:"label";s:5:"label";s:8:"Material";}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}}i:4;a:3:{s:1:"A";a:4:{s:4:"type";s:4:"grid";s:4:"data";a:3:{i:0;a:0:{}i:1;a:2:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:4:"Helm";}s:1:"B";a:3:{s:4:"name";s:9:"cp_helmet";s:4:"type";s:6:"select";s:4:"size";s:1:"3";}}i:2;a:2:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:7:"Harness";}s:1:"B";a:3:{s:4:"name";s:10:"cp_harness";s:4:"type";s:6:"select";s:4:"size";s:1:"3";}}}s:4:"cols";i:2;s:4:"rows";i:2;}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}}i:5;a:3:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:7:"Defects";}s:1:"B";a:2:{s:4:"type";s:5:"label";s:5:"label";s:7:"Cleared";}s:1:"C";a:2:{s:4:"type";s:5:"label";s:5:"label";s:4:"Date";}}i:6;a:3:{s:1:"A";a:3:{s:4:"name";s:10:"cp_defects";s:4:"type";s:8:"textarea";s:4:"size";s:4:"5,60";}s:1:"B";a:3:{s:4:"type";s:14:"select-account";s:4:"size";s:1:"3";s:4:"name";s:17:"cp_defect_cleared";}s:1:"C";a:2:{s:4:"type";s:4:"date";s:4:"name";s:22:"cp_defect_cleared_date";}}}s:4:"cols";i:3;s:4:"rows";i:6;s:4:"size";s:8:"100%,500";s:7:"options";a:2:{i:0;s:4:"100%";i:1;s:3:"500";}}}','size' => '100%,500','style' => '','modified' => '1193667194',);

$templ_data[] = array('name' => 'courseprotocol.edit.general','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:6:{s:4:"type";s:4:"grid";s:4:"data";a:13:{i:0;a:6:{s:1:"A";s:3:"15%";s:1:"B";s:3:"30%";s:3:"h12";s:3:"50%";s:3:"c11";s:4:",top";s:3:"h10";s:2:",1";s:2:"c8";s:4:",top";}i:1;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:8:"Calendar";}s:1:"B";a:3:{s:4:"name";s:6:"cal_id";s:4:"size";s:8:"calendar";s:4:"type";s:10:"link-entry";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:2;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:7:"Company";}s:1:"B";a:3:{s:4:"name";s:10:"cp_company";s:4:"size";s:11:"addressbook";s:4:"type";s:10:"link-entry";}s:1:"C";a:5:{s:4:"size";s:6:"30,128";s:5:"label";s:10:"Department";s:4:"name";s:17:"cp_company_custom";s:4:"type";s:4:"text";s:5:"align";s:5:"right";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:3;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:21:"Number of participant";}s:1:"B";a:2:{s:4:"type";s:4:"text";s:4:"name";s:18:"cp_num_participant";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:4;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:16:"Number of groups";}s:1:"B";a:2:{s:4:"type";s:4:"text";s:4:"name";s:9:"cp_groups";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:5;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:4:"Area";}s:1:"B";a:2:{s:4:"name";s:7:"cp_site";s:4:"type";s:6:"select";}s:1:"C";a:5:{s:5:"label";s:4:"City";s:4:"name";s:13:"cp_mobil_city";s:4:"type";s:4:"text";s:4:"size";s:6:"30,128";s:5:"align";s:5:"right";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:6;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:9:"Carabiner";}s:1:"B";a:2:{s:4:"name";s:12:"cp_carabiner";s:4:"type";s:3:"int";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:7;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:11:"Photo album";}s:1:"B";a:2:{s:4:"name";s:8:"cp_fotos";s:4:"type";s:3:"int";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:8;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:7:"Trainer";}s:1:"B";a:3:{s:4:"type";s:14:"select-account";s:4:"name";s:10:"cp_trainer";s:4:"size";s:1:"4";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:9;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:19:"Additional trainer ";}s:1:"B";a:4:{s:4:"size";s:6:"70,128";s:4:"span";s:3:"all";s:4:"name";s:17:"cp_trainer_custom";s:4:"type";s:4:"text";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:10;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:7:"Concept";}s:1:"B";a:3:{s:4:"span";s:1:"2";s:4:"name";s:9:"cp_linkto";s:4:"type";s:7:"link-to";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:11;a:4:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:19:"Consumable material";}s:1:"B";a:4:{s:4:"name";s:22:"cp_consumable_material";s:4:"type";s:8:"textarea";s:4:"size";s:4:"5,60";s:4:"span";s:3:"all";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}i:12;a:4:{s:1:"A";a:1:{s:4:"type";s:5:"label";}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}}}s:4:"cols";i:4;s:4:"rows";i:12;s:4:"size";s:4:",500";s:7:"options";a:1:{i:1;s:3:"500";}}}','size' => ',500','style' => '','modified' => '1193667207',);

$templ_data[] = array('name' => 'courseprotocol.edit.history','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:6:{s:4:"type";s:4:"grid";s:4:"data";a:2:{i:0;a:1:{s:2:"h1";s:4:"100%";}i:1;a:1:{s:1:"A";a:2:{s:4:"type";s:10:"historylog";s:4:"name";s:7:"history";}}}s:4:"cols";i:1;s:4:"rows";i:1;s:4:"size";s:25:"100%,500,,row_on,0,0,auto";s:7:"options";a:6:{i:3;s:6:"row_on";i:0;s:4:"100%";i:1;s:3:"500";i:6;s:4:"auto";i:4;s:1:"0";i:5;s:1:"0";}}}','size' => '100%,500,,row_on,0,0,auto','style' => '','modified' => '1194256332',);

$templ_data[] = array('name' => 'courseprotocol.edit.links','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:6:{s:4:"type";s:4:"grid";s:4:"data";a:6:{i:0;a:5:{s:2:"c1";s:2:"th";s:2:"h1";s:8:"20,@view";s:2:"c3";s:2:"th";s:2:"h3";s:2:"20";s:2:"h5";s:3:"60%";}i:1;a:1:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:16:"Create new links";}}i:2;a:1:{s:1:"A";a:2:{s:4:"name";s:9:"cp_linkto";s:4:"type";s:7:"link-to";}}i:3;a:1:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:14:"Existing links";}}i:4;a:1:{s:1:"A";a:2:{s:4:"name";s:9:"cp_linkto";s:4:"type";s:9:"link-list";}}i:5;a:1:{s:1:"A";a:1:{s:4:"type";s:5:"label";}}}s:4:"cols";i:1;s:4:"rows";i:5;s:4:"size";s:4:",500";s:7:"options";a:1:{i:1;s:3:"500";}}}','size' => ',500','style' => '','modified' => '1193667218',);

$templ_data[] = array('name' => 'courseprotocol.edit.occ','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:6:{s:4:"type";s:4:"grid";s:4:"data";a:8:{i:0;a:3:{s:2:"c1";s:2:"th";s:2:"h1";s:2:"20";s:2:"c4";s:4:",top";}i:1;a:3:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:17:"Create occurrence";}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}}i:2;a:3:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:15:"Occurrence type";}s:1:"B";a:3:{s:4:"name";s:16:"occ[cp_occ_type]";s:4:"type";s:6:"select";s:4:"size";s:10:"Select one";}s:1:"C";a:1:{s:4:"type";s:5:"label";}}i:3;a:3:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:4:"Date";}s:1:"B";a:2:{s:4:"name";s:16:"occ[cp_occ_date]";s:4:"type";s:9:"date-time";}s:1:"C";a:2:{s:4:"type";s:5:"label";s:5:"label";s:7:"Trainer";}}i:4;a:3:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:5:"Event";}s:1:"B";a:3:{s:4:"name";s:17:"occ[cp_occ_event]";s:4:"size";s:12:",1,width:99%";s:4:"type";s:8:"tree-cat";}s:1:"C";a:3:{s:4:"type";s:14:"select-account";s:4:"name";s:19:"occ[cp_occ_trainer]";s:4:"size";s:1:"3";}}i:5;a:3:{s:1:"A";a:1:{s:4:"type";s:5:"label";}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}}i:6;a:1:{s:1:"A";a:6:{s:4:"type";s:4:"grid";s:4:"data";a:3:{i:0;a:0:{}i:1;a:2:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:22:"Occurrence description";}s:1:"B";a:2:{s:4:"type";s:5:"label";s:5:"label";s:14:"Cause analysis";}}i:2;a:2:{s:1:"A";a:3:{s:4:"name";s:16:"occ[cp_occ_desc]";s:4:"type";s:8:"textarea";s:4:"size";s:4:"8,40";}s:1:"B";a:3:{s:4:"name";s:17:"occ[cp_occ_analy]";s:4:"type";s:8:"textarea";s:4:"size";s:4:"8,40";}}}s:4:"cols";i:2;s:4:"rows";i:2;s:4:"span";s:3:"all";s:7:"options";a:0:{}}}i:7;a:1:{s:1:"A";a:8:{s:4:"type";s:4:"grid";s:4:"data";a:3:{i:0;a:2:{s:2:"c1";s:2:"th";s:2:"c2";s:7:"row,top";}i:1;a:6:{s:1:"A";a:2:{s:4:"type";s:5:"label";s:5:"label";s:5:"Event";}s:1:"B";a:2:{s:4:"type";s:5:"label";s:5:"label";s:4:"Date";}s:1:"C";a:2:{s:4:"type";s:5:"label";s:5:"label";s:15:"Occurrence type";}s:1:"D";a:2:{s:4:"type";s:5:"label";s:5:"label";s:7:"Trainer";}s:1:"E";a:2:{s:4:"type";s:5:"label";s:5:"label";s:11:"Description";}s:1:"F";a:2:{s:4:"type";s:5:"label";s:5:"label";s:7:"Actions";}}i:2;a:6:{s:1:"A";a:3:{s:4:"type";s:10:"select-cat";s:8:"readonly";s:4:"true";s:4:"name";s:20:"${row}[cp_occ_event]";}s:1:"B";a:3:{s:8:"readonly";s:4:"true";s:4:"name";s:19:"${row}[cp_occ_date]";s:4:"type";s:9:"date-time";}s:1:"C";a:3:{s:8:"readonly";s:4:"true";s:4:"name";s:19:"${row}[cp_occ_type]";s:4:"type";s:6:"select";}s:1:"D";a:3:{s:4:"type";s:14:"select-account";s:8:"readonly";s:4:"true";s:4:"name";s:22:"${row}[cp_occ_trainer]";}s:1:"E";a:4:{s:8:"readonly";s:1:"1";s:4:"name";s:19:"${row}[cp_occ_desc]";s:4:"type";s:8:"textarea";s:4:"span";s:10:",multiline";}s:1:"F";a:4:{s:4:"type";s:4:"hbox";s:4:"size";s:1:"2";i:1;a:4:{s:5:"label";s:4:"Edit";s:4:"name";s:26:"edit[$row_cont[cp_occ_id]]";s:4:"type";s:6:"button";s:4:"size";s:4:"edit";}i:2;a:4:{s:5:"label";s:6:"Delete";s:4:"name";s:28:"delete[$row_cont[cp_occ_id]]";s:4:"type";s:6:"button";s:4:"size";s:6:"delete";}}}}s:4:"cols";i:6;s:4:"rows";i:2;s:4:"size";s:4:"100%";s:4:"span";s:3:"all";s:4:"name";s:4:"occs";s:7:"options";a:1:{i:0;s:4:"100%";}}}}s:4:"cols";i:3;s:4:"rows";i:7;s:4:"size";s:4:",500";s:7:"options";a:1:{i:1;s:3:"500";}}}','size' => ',500','style' => '','modified' => '1193667470',);

$templ_data[] = array('name' => 'courseprotocol.index','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:5:{s:4:"type";s:4:"grid";s:4:"data";a:5:{i:0;a:1:{s:2:"h2";s:2:",1";}i:1;a:2:{s:1:"A";a:4:{s:4:"span";s:13:"all,redItalic";s:5:"align";s:6:"center";s:4:"name";s:3:"msg";s:4:"type";s:5:"label";}s:1:"B";a:1:{s:4:"type";s:5:"label";}}i:2;a:2:{s:1:"A";a:1:{s:4:"type";s:5:"label";}s:1:"B";a:3:{s:4:"type";s:8:"template";s:5:"align";s:5:"right";s:4:"name";s:26:"courseprotocol.index.right";}}i:3;a:1:{s:1:"A";a:4:{s:4:"span";s:3:"all";s:4:"name";s:2:"nm";s:4:"size";s:25:"courseprotocol.index.rows";s:4:"type";s:9:"nextmatch";}}i:4;a:2:{s:1:"A";a:4:{s:5:"label";s:3:"Add";s:7:"onclick";s:173:"window.open(egw::link(\'/index.php\',\'menuaction=courseprotocol.uicourseprotocol.edit\'),\'_blank\',\'dependent=yes,width=800,height=600,scrollbars=yes,status=yes\'); return false;";s:4:"name";s:3:"add";s:4:"type";s:6:"button";}s:1:"B";a:1:{s:4:"type";s:5:"label";}}}s:4:"cols";i:2;s:4:"rows";i:4;s:4:"size";s:7:"100%,,0";}}','size' => '100%,,0','style' => '','modified' => '1193666684',);

$templ_data[] = array('name' => 'courseprotocol.index.right','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:4:{s:5:"label";s:3:"Add";s:7:"onclick";s:173:"window.open(egw::link(\'/index.php\',\'menuaction=courseprotocol.uicourseprotocol.edit\'),\'_blank\',\'dependent=yes,width=800,height=600,scrollbars=yes,status=yes\'); return false;";s:4:"name";s:3:"add";s:4:"type";s:10:"buttononly";}}','size' => '','style' => '','modified' => '1195307102',);

$templ_data[] = array('name' => 'courseprotocol.index.rows','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:5:{s:4:"type";s:4:"grid";s:4:"data";a:3:{i:0;a:2:{s:2:"c1";s:2:"th";s:2:"c2";s:7:"row,top";}i:1;a:9:{s:1:"A";a:4:{s:5:"label";s:7:"Company";s:4:"name";s:10:"cp_company";s:4:"type";s:16:"nextmatch-header";s:4:"span";s:3:",th";}s:1:"B";a:4:{s:5:"label";s:4:"Date";s:4:"name";s:7:"cp_date";s:4:"type";s:20:"nextmatch-sortheader";s:4:"span";s:3:",th";}s:1:"C";a:4:{s:5:"label";s:7:"Trainer";s:4:"name";s:10:"cp_trainer";s:4:"type";s:23:"nextmatch-accountfilter";s:4:"span";s:3:",th";}s:1:"D";a:3:{s:5:"label";s:4:"Area";s:4:"name";s:7:"cp_site";s:4:"type";s:22:"nextmatch-filterheader";}s:1:"E";a:3:{s:5:"label";s:6:"Events";s:4:"name";s:9:"cp_events";s:4:"type";s:20:"nextmatch-sortheader";}s:1:"F";a:3:{s:5:"label";s:17:"Cours description";s:4:"name";s:21:"cp_course_description";s:4:"type";s:16:"nextmatch-header";}s:1:"G";a:3:{s:5:"label";s:18:"Special occurrence";s:4:"name";s:20:"cp_course_occurrency";s:4:"type";s:16:"nextmatch-header";}s:1:"H";a:3:{s:4:"type";s:16:"nextmatch-header";s:5:"label";s:23:"Special occurrence text";s:4:"name";s:25:"cp_course_occurrency_text";}s:1:"I";a:3:{s:5:"label";s:7:"Actions";s:4:"name";s:7:"Actions";s:4:"type";s:16:"nextmatch-header";}}i:2;a:9:{s:1:"A";a:5:{s:8:"readonly";s:4:"true";s:4:"type";s:4:"vbox";s:4:"size";s:1:"2";i:1;a:4:{s:8:"readonly";s:1:"1";s:4:"name";s:18:"{$row}[cp_company]";s:4:"size";s:11:"addressbook";s:4:"type";s:4:"link";}i:2;a:2:{s:4:"name";s:25:"{$row}[cp_company_custom]";s:4:"type";s:5:"label";}}s:1:"B";a:4:{s:8:"readonly";s:1:"1";s:4:"name";s:14:"{$row}[cal_id]";s:4:"size";s:8:"calendar";s:4:"type";s:4:"link";}s:1:"C";a:3:{s:4:"type";s:14:"select-account";s:8:"readonly";s:4:"true";s:4:"name";s:18:"{$row}[cp_trainer]";}s:1:"D";a:3:{s:8:"readonly";s:4:"true";s:4:"name";s:15:"{$row}[cp_site]";s:4:"type";s:6:"select";}s:1:"E";a:4:{s:4:"type";s:10:"select-cat";s:8:"readonly";s:4:"true";s:4:"name";s:17:"{$row}[cp_events]";s:4:"size";s:1:"2";}s:1:"F";a:2:{s:4:"name";s:29:"{$row}[cp_course_description]";s:4:"type";s:5:"label";}s:1:"G";a:2:{s:4:"name";s:18:"${row}[occurences]";s:4:"type";s:5:"label";}s:1:"H";a:2:{s:4:"type";s:5:"label";s:4:"name";s:22:"${row}[occurences_txt]";}s:1:"I";a:4:{s:4:"type";s:4:"hbox";s:4:"size";s:1:"2";i:1;a:5:{s:5:"label";s:10:"Bearbeiten";s:7:"onclick";s:196:"window.open(egw::link(\'/index.php\',\'menuaction=courseprotocol.uicourseprotocol.edit&cp_id=$row_cont[cp_id]\'),\'_blank\',\'dependent=yes,width=850,height=620,scrollbars=yes,status=yes\'); return false;";s:4:"name";s:22:"edit[$row_cont[cp_id]]";s:4:"type";s:6:"button";s:4:"size";s:4:"edit";}i:2;a:6:{s:5:"label";s:6:"Delete";s:7:"onclick";s:39:"return confirm(\'Delete this protocol\');";s:4:"name";s:24:"delete[$row_cont[cp_id]]";s:4:"type";s:6:"button";s:4:"size";s:6:"delete";s:4:"help";s:20:"Delete this protocol";}}}}s:4:"cols";i:9;s:4:"rows";i:2;s:4:"size";s:4:"100%";}}','size' => '100%','style' => '','modified' => '1193666703',);

$templ_data[] = array('name' => 'courseprotocol.occindex','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:5:{s:4:"type";s:4:"grid";s:4:"data";a:5:{i:0;a:0:{}i:1;a:5:{s:1:"A";a:4:{s:4:"span";s:13:"all,redItalic";s:5:"align";s:6:"center";s:4:"name";s:3:"msg";s:4:"type";s:5:"label";}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}s:1:"E";a:1:{s:4:"type";s:5:"label";}}i:2;a:3:{s:1:"A";a:4:{s:4:"span";s:1:"2";s:4:"name";s:2:"nm";s:4:"size";s:28:"courseprotocol.occindex.rows";s:4:"type";s:9:"nextmatch";}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}}i:3;a:5:{s:1:"A";a:4:{s:5:"label";s:3:"Add";s:7:"onclick";s:173:"window.open(egw::link(\'/index.php\',\'menuaction=courseprotocol.uicourseprotocol.edit\'),\'_blank\',\'dependent=yes,width=800,height=600,scrollbars=yes,status=yes\'); return false;";s:4:"name";s:3:"add";s:4:"type";s:6:"button";}s:1:"B";a:2:{s:4:"span";s:3:"all";s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}s:1:"D";a:1:{s:4:"type";s:5:"label";}s:1:"E";a:1:{s:4:"type";s:5:"label";}}i:4;a:3:{s:1:"A";a:2:{s:7:"content";s:2:"nm";s:4:"type";s:8:"template";}s:1:"B";a:1:{s:4:"type";s:5:"label";}s:1:"C";a:1:{s:4:"type";s:5:"label";}}}s:4:"cols";i:5;s:4:"rows";i:4;s:4:"size";s:7:"100%,,0";}}','size' => '100%,,0','style' => '','modified' => '1193666785',);

$templ_data[] = array('name' => 'courseprotocol.occindex.rows','template' => '','lang' => '','group' => '0','version' => '1.5.001','data' => 'a:1:{i:0;a:5:{s:4:"type";s:4:"grid";s:4:"data";a:3:{i:0;a:2:{s:2:"c1";s:2:"th";s:2:"c2";s:7:"row,top";}i:1;a:7:{s:1:"A";a:4:{s:5:"label";s:4:"Date";s:4:"name";s:11:"cp_occ_date";s:4:"type";s:16:"nextmatch-header";s:4:"span";s:3:",th";}s:1:"B";a:4:{s:5:"label";s:15:"Occurrence type";s:4:"name";s:11:"cp_occ_type";s:4:"type";s:22:"nextmatch-filterheader";s:4:"span";s:3:",th";}s:1:"C";a:4:{s:5:"label";s:7:"Trainer";s:4:"name";s:14:"cp_occ_trainer";s:4:"type";s:23:"nextmatch-accountfilter";s:4:"span";s:3:",th";}s:1:"D";a:3:{s:5:"label";s:5:"Event";s:4:"name";s:12:"cp_occ_event";s:4:"type";s:22:"nextmatch-filterheader";}s:1:"E";a:3:{s:5:"label";s:22:"Occurrence description";s:4:"name";s:11:"cp_occ_desc";s:4:"type";s:16:"nextmatch-header";}s:1:"F";a:3:{s:5:"label";s:14:"Cause analysis";s:4:"name";s:12:"cp_occ_analy";s:4:"type";s:16:"nextmatch-header";}s:1:"G";a:3:{s:5:"label";s:7:"Actions";s:4:"name";s:7:"Actions";s:4:"type";s:16:"nextmatch-header";}}i:2;a:7:{s:1:"A";a:3:{s:8:"readonly";s:4:"true";s:4:"name";s:19:"${row}[cp_occ_date]";s:4:"type";s:4:"date";}s:1:"B";a:3:{s:8:"readonly";s:4:"true";s:4:"name";s:19:"{$row}[cp_occ_type]";s:4:"type";s:6:"select";}s:1:"C";a:3:{s:4:"type";s:14:"select-account";s:8:"readonly";s:4:"true";s:4:"name";s:22:"{$row}[cp_occ_trainer]";}s:1:"D";a:3:{s:4:"type";s:10:"select-cat";s:8:"readonly";s:4:"true";s:4:"name";s:20:"{$row}[cp_occ_event]";}s:1:"E";a:4:{s:8:"readonly";s:4:"true";s:4:"name";s:19:"{$row}[cp_occ_desc]";s:4:"type";s:8:"textarea";s:4:"span";s:10:",multiline";}s:1:"F";a:4:{s:8:"readonly";s:4:"true";s:4:"name";s:20:"{$row}[cp_occ_analy]";s:4:"type";s:8:"textarea";s:4:"span";s:10:",multiline";}s:1:"G";a:5:{s:5:"label";s:5:"H Box";s:4:"type";s:4:"hbox";s:4:"size";s:1:"2";i:1;a:5:{s:5:"label";s:10:"Bearbeiten";s:7:"onclick";s:196:"window.open(egw::link(\'/index.php\',\'menuaction=courseprotocol.uicourseprotocol.edit&cp_id=$row_cont[cp_id]\'),\'_blank\',\'dependent=yes,width=850,height=580,scrollbars=yes,status=yes\'); return false;";s:4:"name";s:22:"edit[$row_cont[cp_id]]";s:4:"type";s:6:"button";s:4:"size";s:4:"edit";}i:2;a:6:{s:5:"label";s:6:"Delete";s:7:"onclick";s:40:"return confirm(\'Delete this occurence\');";s:4:"name";s:28:"delete[$row_cont[cp_occ_id]]";s:4:"type";s:6:"button";s:4:"size";s:6:"delete";s:4:"help";s:21:"Delete this occurence";}}}}s:4:"cols";i:7;s:4:"rows";i:2;s:4:"size";s:4:"100%";}}','size' => '100%','style' => '','modified' => '1193666834',);

