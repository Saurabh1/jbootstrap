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
?>

<?php if (count($this->children[$this->category->id]) > 0 && $this->maxLevel != 0) : ?>
    <ul class="nav nav-list">
        <?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
            <?php
            if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) :
                if (!isset($this->children[$this->category->id][$id + 1])) :
                    $class = ' class="last"';
                endif;
                ?>
                <li<?php echo $class; ?>>
                    <?php $class = ''; ?>
                    <span class="item-title"><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id)); ?>">
                            <?php echo $this->escape($child->title); ?></a>
                    </span>

                    <?php if ($this->params->get('show_subcat_desc') == 1) : ?>
                        <?php if ($child->description) : ?>
                            <div class="category-desc">
                                <?php echo JHtml::_('content.prepare', $child->description, '', 'com_content.category'); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->params->get('show_cat_num_articles', 1)) : ?>
                        <dl>
                            <dt>
                            <?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?>
                            </dt>
                            <dd>
                                <?php echo $child->getNumItems(true); ?>
                            </dd>
                        </dl>
                    <?php endif; ?>

                    <?php
                    if (count($child->getChildren()) > 0):
                        $this->children[$child->id] = $child->getChildren();
                        $this->category = $child;
                        $this->maxLevel--;
                        if ($this->maxLevel != 0) :
                            echo $this->loadTemplate('children');
                        endif;
                        $this->category = $child->getParent();
                        $this->maxLevel++;
                    endif;
                    ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <?php

 endif;
