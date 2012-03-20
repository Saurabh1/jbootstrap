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
class GantryLayoutBody_MainBody extends GantryLayout {

    var $render_params = array(
        'schema' => null,
        'pushPull' => null,
        'classKey' => null,
        'sidebars' => '',
        'contentTop' => null,
        'contentBottom' => null
    );

    function render($params = array()) {
        global $gantry;

        $fparams = $this->_getParams($params);

        // logic to determine if the component should be displayed
        $display_component = !($gantry->get("component-enabled", true) == false && JRequest::getVar('view') == 'featured');
        ob_start();
// XHTML LAYOUT
        ?>          

        <div id="jb-main" class="container-fluid">
            <div class="row-fluid">
                <div class="span<?php echo $fparams->schema['mb']; ?><?php echo ($fparams->pushPull[0] ? ' offset' . $fparams->pushPull[0] : ''); ?>">
                    <?php if (isset($fparams->contentTop)) : ?>
                        <div id="jb-content-top">
                            <?php echo $fparams->contentTop; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($display_component) : ?>
                        <div class="jb-block">
                            <div id="jb-mainbody">
                                <div class="component-content">
                                    <jdoc:include type="component" />
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($fparams->contentBottom)) : ?>
                        <div id="jb-content-bottom">
                            <?php echo $fparams->contentBottom; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php echo $fparams->sidebars; ?>                    
            </div>
        </div>

        <?php
        return ob_get_clean();
    }

}