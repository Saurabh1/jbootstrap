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
defined('_JEXEC') or die;
foreach ($list as $item) :
    ?>
    <li <?php if ($_SERVER['PHP_SELF'] == JRoute::_(ContentHelperRoute::getCategoryRoute($item->id))) echo ' class="active"'; ?>> <?php $levelup = $item->level - $startLevel - 1; ?>
    <span class="h<?php echo $params->get('item_heading') + $levelup; ?>">
        <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
            <?php echo $item->title; ?></a>
    </span>

    <?php
    if ($params->get('show_description', 0)) {
        echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content');
    }
    if ($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0) || ($params->get('maxlevel') >= ($item->level - $startLevel))) && count($item->getChildren())) {

        echo '<ul class="nav nav-list">';
        $temp = $list;
        $list = $item->getChildren();
        require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items');
        $list = $temp;
        echo '</ul>';
    }
    ?>
    </li>
<?php endforeach; ?>
