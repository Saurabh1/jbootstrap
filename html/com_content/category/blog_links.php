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
?>


<div class="items-more">

    <h3><?php echo JText::_('COM_CONTENT_MORE_ARTICLES'); ?></h3>
    <ol>
        <?php
        foreach ($this->link_items as &$item) :
            ?>
            <li>
                <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid)); ?>">
                    <?php echo $item->title; ?></a>
            </li>
        <?php endforeach; ?>
    </ol>
</div>
