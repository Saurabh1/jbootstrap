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
class GantryLayoutBody_iPhoneMainBody extends GantryLayout {
    var $render_params = array(
        'schema'        =>  null,
        'classKey'      =>  null
    );
    function render($params = array()){
        global $gantry;

        $fparams = $this-> _getParams($params);

        // logic to determine if the component should be displayed
        $display_component = !($gantry->get("component-enabled",true)==false && JRequest::getVar('view') == 'featured');
        ob_start();
// XHTML LAYOUT
?>          <div id="rt-main" class="<?php echo $fparams->classKey; ?>">
                <div class="jb-container">
                    <div class="jb-grid-12">
                        <div class="jb-block">
                            <?php if ($display_component) : ?>
                            <div id="rt-mainbody">
								<div class="component-content">
                                	<jdoc:include type="component" />
								</div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
<?php
        return ob_get_clean();
    }
}