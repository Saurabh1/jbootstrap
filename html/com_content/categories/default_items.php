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
$class = ' class="first"';
if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
    ?>
    <dl>
        <?php foreach ($this->items[$this->parent->id] as $id => $item) : ?>
            <?php
            if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
                if (!isset($this->items[$this->parent->id][$id + 1])) {
                    $class = ' class="last"';
                }
                ?>
                <!-- li<?php echo $class; ?> -->
                <?php $class = ''; ?>
                <dt class="item-title"><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
                <?php echo $this->escape($item->title); ?></a>
                </dt>
                    <?php if ($this->params->get('show_subcat_desc_cat') == 1) : ?>
                    <?php if ($item->description) : ?>
                        <dd class="category-desc">
                        <?php echo JHtml::_('content.prepare', $item->description); ?>
                        </dd>
                        <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->params->get('show_cat_num_articles_cat') == 1) : ?>
                    <div class="article-count"><span class="jb_numitems_label">
                    <?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?></span>
                        <span class="jb_numitems_desc"><?php echo $item->numitems; ?></span>
                    </div>
            <?php endif; ?>

                <?php
                if (count($item->getChildren()) > 0) :
                    $this->items[$item->id] = $item->getChildren();
                    $this->parent = $item;
                    $this->maxLevelcat--;
                    echo $this->loadTemplate('items');
                    $this->parent = $item->getParent();
                    $this->maxLevelcat++;
                endif;
                ?>

                <!-- /li -->
            <?php endif; ?>
        <?php endforeach; ?>
    </dl>
<?php endif; ?>