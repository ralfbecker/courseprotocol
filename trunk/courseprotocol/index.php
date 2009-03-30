<?php
/**
 * Courseprotocol
 *
 * @link http://www.outdoor-training.de
 * @author Stefan Becker <StefanBecker-AT-outdoor-training.de>
 * @package courseprotocol
 * @license http://opensource.org/licenses/gpl-license.php GPL - GNU General Public License
 * @version $Id$
 */

header('Location: ../index.php?menuaction=courseprotocol.uicourseprotocol.index'.
	(isset($_GET['sessionid']) ? '&sessionid='.$_GET['sessionid'].'&kp3='.$_GET['kp3'] : ''));
