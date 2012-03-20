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

defined('GANTRY_VERSION') or die();

gantry_import('core.gantrylayout');

/**
 *
 * @package gantry
 * @subpackage html.layouts
 */
class GantryLayoutMod_Standard extends GantryLayout {
    var $render_params = array(
        'contents'      =>  null,
        'gridCount'     =>  null,
        'prefixCount'   =>  0,
        'extraClass'      =>  ''
    );
    function render($params = array()){
        global $gantry;

        $rparams = $this-> _getParams($params);

        $prefixClass = '';

        if ($rparams->prefixCount !=0) {
            $prefixClass = " rt-prefix-".$rparams->prefixCount;
        }
        ob_start();
        // XHTML LAYOUT
?>
<div class="span<?php echo $rparams->gridCount.$prefixClass.$rparams->extraClass; ?>">
    <?php echo $rparams->contents;  ?>
</div>
<?php

        return ob_get_clean();
    }
}