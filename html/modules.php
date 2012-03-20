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
defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */
/*
 * Module chrome for rendering the module in a slider
 */

function modChrome_submenu($module, &$params, &$attribs) {
    $start = intval($params->get('submenu-startLevel'));

    $tabmenu = &JSite::getMenu();
    $item = $tabmenu->getActive();

    $level = sizeof($item->tree);

    if (isset($item) && $start <= $level) {
        $menu_title = "";

        if ($start == 0)
            $start = 1;

        $menu_title_item_id = $item->tree[$start - 1];
        $menu_title_item = $tabmenu->getItem($menu_title_item_id);

        if (!empty($module->content) && $module->content != '') :
            ?>
            <?php if ($params->get('moduleclass_sfx') != '') : ?>
                <div class="<?php echo $params->get('moduleclass_sfx'); ?>">
                <?php endif; ?>
                <div class="jb-block">
                    <div class="module-title"><div class="module-title2">
                            <h2 class="title"><?php echo $menu_title_item->title . ' ' . JText::_('Menu'); ?></h2>
                        </div><div class="clear"></div></div>
                    <div class="module-content">
                        <?php echo $module->content; ?>
                    </div>
                </div>
                <?php if ($params->get('moduleclass_sfx') != '') : ?>
                </div>
            <?php endif; ?>
            <?php
        endif;
    }
}

function modChrome_basic($module, &$params, &$attribs) {
    if (!empty($module->content)) :
        ?>
        <?php echo $module->content; ?>
        <?php
    endif;
}

function modChrome_standard($module, &$params, &$attribs) {
    if (!empty($module->content)) :
        ?>
        <?php if ($params->get('moduleclass_sfx') != '') : ?>
            <div class="<?php echo $params->get('moduleclass_sfx'); ?>">
            <?php endif; ?>
            <div class="jb-block">
                <?php if ($module->showtitle != 0) : ?>
                    <div class="module-title">
                        <h2 class="title"><?php echo $module->title; ?></h2>
                    </div>
                <?php endif; ?>
                <?php echo $module->content; ?>
            </div>
            <?php if ($params->get('moduleclass_sfx') != '') : ?>
            </div>
        <?php endif; ?>
        <?php
    endif;
}
?>