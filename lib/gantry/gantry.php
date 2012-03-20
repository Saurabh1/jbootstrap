<?php
/* ------------------------------------------------------------------------
  # JBootstrap - Twitter's Bootstrap for Joomla (with RocketTheme's Gantry administration)
  # ------------------------------------------------------------------------
  # author    Prieco S.A.
  # copyright Copyright (C) 2012 Prieco.com. All Rights Reserved.
  # @license - http://http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
  # Websites: http://www.prieco.com
  # Technical Support:  Forum - http://www.prieco.com/en/forum/index.html
  ------------------------------------------------------------------------- */

defined('JPATH_BASE') or die();
global $gantry;

$gantry_path_j15 = JPATH_SITE . '/components/com_gantry/gantry.php';
$gantry_path_j16 = JPATH_SITE . '/libraries/gantry/gantry.php';

$gantry_path = '';
if (version_compare(JVERSION, '1.5', '>=') && version_compare(JVERSION, '1.6', '<')) {
    $gantry_path = $gantry_path_j15;
}
else if (version_compare(JVERSION, '1.6', '>=')) {
    $gantry_path = $gantry_path_j16;
}

if (!file_exists($gantry_path)) {
    echo JText::_('Unable to find Gantry library.  Please make sure you have it installed.');
    die;
}
require_once($gantry_path);

$app = JFactory::getApplication();
if (!$app->isAdmin()){
    $app->triggerEvent('onGantryTemplateInit', array($filename));
}