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
class GantryFeaturelogo extends GantryFeature {

    var $_feature_name = 'logo';
    var $_autosize = false;

    function render($position = "") {
        global $gantry;


        // default location for custom icon is {template}/images/logo/logo.png, with 'perstyle' it's
        // located in {template}/images/logo/styleX/logo.png
        if ($gantry->get("logo-autosize")) {

            jimport('joomla.filesystem.file');

            $path = $gantry->templatePath . DS . 'images' . DS . 'logo';
            $logocss = $gantry->get('logo-css', 'body #rt-logo');

            // get proper path based on perstyle hidden param
            $path = (intval($gantry->get("logo-perstyle", 0)) === 1) ? $path . DS . $gantry->get("cssstyle") . DS : $path . DS;
            // append logo file
            $path .= 'logo.png';

            // if the logo exists, get it's dimentions and add them inline
            if (JFile::exists($path)) {
                $logosize = getimagesize($path);
                if (isset($logosize[0]) && isset($logosize[1])) {
                    $gantry->addInlineStyle($logocss . ' {width:' . $logosize[0] . 'px;height:' . $logosize[1] . 'px;}');
                }
            }
        }

        ob_start();
        ?>
        <div class="jb-block">
            <a href="<?php echo $gantry->baseUrl; ?>" id="jb-logo"></a>
        </div>
        <?php
        return ob_get_clean();
    }

}