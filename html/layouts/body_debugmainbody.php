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
class GantryLayoutBody_DebugMainBody extends GantryLayout {
    var $render_params = array(
        'counter'       =>  null,
        'schema'        =>  null,
        'pushPull'      =>  null,
        'classKey'      =>  null,
        'contents'       =>  null,
        'sidebars'      =>  ''
    );
    function render($params = array()){
        global $gantry;

        $fparams = $this-> _getParams($params);

        ob_start();
// XHTML LAYOUT
?>      <div id="rt-main" class="<?php echo $fparams->classKey; ?>">
            <span class="status">(<?php echo $fparams->counter; ?>) <?php echo $fparams->classKey; ?></span>
            <div class="jb-grid-<?php echo $fparams->schema['mb']; ?> <?php echo $fparams->pushPull[0]; ?>">
                <div class="jb-block">
                    <div id="rt-mainbody">
                        <?php echo $fparams->contents; ?>
                    </div>
                </div>
            </div>
            <?php echo $fparams->sidebars; ?>
            <div class="clear"></div>
        </div>
<?php
        return ob_get_clean();
    }
}