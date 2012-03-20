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

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>

<div class="subnav"><ul class="nav <?php echo $class_sfx; ?>"<?php
$tag = '';
if ($params->get('tag_id') != NULL) {
    $tag = $params->get('tag_id') . '';
    echo ' id="' . $tag . '"';
}
?>>
    <?php if ($class_sfx === 'nav-list') : ?>
        <li></li>
        <li class="nav-header"><?php echo $module->title; ?></li>
    <?php endif; ?>
    <?php
    foreach ($list as $i => &$item) :
        $class = '';
        if ($item->id == $active_id) {
            $class .= 'current ';
        }

        if ($item->type == 'alias' &&
                in_array($item->params->get('aliasoptions'), $path)
                || in_array($item->id, $path)) {
            $class .= 'active ';
        }
        if ($item->deeper) {
            $class .= 'deeper ';
        }

        if ($item->parent) {
            $class .= 'parent ';
        }

        if (!empty($class)) {
            $class = ' class="' . trim($class) . '"';
        }

        echo '<li id="item-' . $item->id . '"' . $class . '>';

        // Render the menu item.
        switch ($item->type) :
            case 'separator':
            case 'url':
            case 'component':
                require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                break;

            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                break;
        endswitch;

        // The next item is deeper.
        if ($item->deeper) {
            echo '<ul>';
        }
        // The next item is shallower.
        else if ($item->shallower) {
            echo '</li>';
            echo str_repeat('</ul></li>', $item->level_diff);
        }
        // The next item is on the same level.
        else {
            echo '</li>';
        }
    endforeach;
    ?>
</ul></div>

