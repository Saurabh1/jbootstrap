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
class GantryLayoutDoc_Body extends GantryLayout {
    var $render_params = array(
        'classes'       =>  null,
        'id'            =>  null
    );
    function render($params = array()){
        global $gantry;

        $fparams = $this-> _getParams($params);

    ob_start();
	//XHTML LAYOUT
?><?php if(null != $fparams->id):?>id="<?php echo $fparams->id;?>"<?php endif;?> <?php if(strlen($fparams->classes) > 0):?>class="<?php echo $fparams->classes; ?>"<?php endif;?><?php
	return ob_get_clean();
    }
}