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

// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );

echo "<h1>Gantry::getParams();</h1>";
var_dump(Gantry::getParams());

echo "<h1>Gantry::get('primaryStyle');</h1>";
var_dump(Gantry::get('primaryStyle'));

echo "<h1>Gantry::set('primaryStyle', 'moo');</h1>";
var_dump(Gantry::set('primaryStyle', 'moo'));

echo "<h1>Gantry::get('primaryStyle');</h1>";
var_dump(Gantry::get('primaryStyle'));

echo "<h1>Current Browser. Gantry::\$browser</h1>";
var_dump(Gantry::getBrowser());

echo "<h1>Gantry::getPositions()</h1>";
var_dump(Gantry::getPositions());

echo "<h1>Gantry::getPositions('top')</h1>";
var_dump(Gantry::getPositions('top'));

echo "<h1>Gantry::getPositions('top', '-')</h1>";
var_dump(Gantry::getPositions('top', '-'));

echo "<h1>Gantry::getPositions('user', '([0-9])?')</h1>";
var_dump(Gantry::getPositions('user', '([0-9])?'));

echo "<h1>Gantry::getPositions('user', '(\d)?')</h1>";
var_dump(Gantry::getPositions('user', '(\d)?'));

echo "<h1>Gantry::countModules('user', '(\d)?')</h1>";
var_dump(Gantry::countModules('user', '(\d)?'));

echo "<h1>Gantry::countModules('top')</h1>";
var_dump(Gantry::countModules('top'));

echo "<h1>Gantry::countModules('top', '-')</h1>";
var_dump(Gantry::countModules('top', '-'));
?>