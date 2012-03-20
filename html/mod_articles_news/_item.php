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
<?php if ($params->get('item_title')) : ?>

    <<?php echo $params->get('item_heading'); ?> class="newsflash-title <?php echo $params->get('moduleclass_sfx'); ?>">
    <?php if ($params->get('link_titles') && $item->link != '') : ?>
        <a href="<?php echo $item->link; ?>">
            <?php echo $item->title; ?></a>
    <?php else : ?>
        <?php echo $item->title; ?>
    <?php endif; ?>
    </<?php echo $params->get('item_heading'); ?>>

<?php endif; ?>

<?php
if (!$params->get('intro_only')) :
    echo $item->afterDisplayTitle;
endif;
?>

<?php echo $item->beforeDisplayContent; ?>

<?php echo $item->introtext; ?>

<?php
if (isset($item->link) && $item->readmore && $params->get('readmore')) :
    echo '<a class="readon btn" href="' . $item->link . '"><span>' . $item->linkText . '</span></a>';
endif;
?>
