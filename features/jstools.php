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

gantry_import('core.gantryfeature');

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryFeatureJSTools extends GantryFeature {
    var $_feature_name = 'jstools';

    function isEnabled(){
        return false;
    }
    function isInPosition($position) {
        return false;
    }
	function isOrderable(){
		return false;
	}
	

	function init() {
        global $gantry;
		
		// date
		if ($gantry->get('date-enabled') && $gantry->get('date-clientside')) {
			$gantry->addScript('gantry-date.js');
			$gantry->addInlineScript($this->_dateFormat());
		}
		// build spans
		if ($gantry->get('buildspans-enabled')) {
			$modules = "['rt-block']";
			$headers = "['h3','h2','h1']";
			
			$gantry->addScript('gantry-buildspans.js');
			$gantry->addInlineScript($this->_buildSpans($modules, $headers));
		}
		// inputs
		if ($gantry->get('inputstyling-enabled') && !($gantry->browser->name == 'ie' && $gantry->browser->shortversion == '6')) {
			$exclusions = $gantry->get('inputstyling-exclusions');
			$gantry->addScript('gantry-inputs.js');
			$gantry->addInlineScript("InputsExclusion.push($exclusions)");
		}
	}
	
	function _dateLanguage() {
		
		$days = array(
			'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat',
			'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
		);
		
		$months = array(
			'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
			'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'		
		);
		
		return "dayNames:['" . implode("', '", $days) . "'], monthNames:['" . implode("', '", $months) . "']";
	}
	
	function _dateFormat() {
		global $gantry;
		
		$formats = str_replace("%", "$", $gantry->get('date-formats'));

		$js = "
			dateFormat.i18n = {
				".$this->_dateLanguage()."
			};
			var dateFeature = new Date().format('$formats');
			window.addEvent('domready', function() {
				var dates = $$('.date-block .date, .date, .rt-date-feature');
				if (dates.length) {
					dates.each(function(date) {
						date.set('text', dateFeature);
					});
				}
			});
		";
		
		return $js;
	}
	
	function _buildSpans($modules, $headers) {
		global $gantry;
		
		$js = "
			window.addEvent('domready', function() {
				var modules = $modules;
				var header = $headers;
				GantryBuildSpans(modules, header);
			});
		";
		
		return $js;
	}
}