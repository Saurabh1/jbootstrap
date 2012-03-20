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

defined('_JEXEC') or die;
JHtml::_('behavior.tooltip');
?>
<div class="profile<?php echo $this->pageclass_sfx ?>">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1>
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <?php echo $this->loadTemplate('core'); ?>

    <?php echo $this->loadTemplate('params'); ?>

    <?php echo $this->loadTemplate('custom'); ?>

    <?php if (JFactory::getUser()->id == $this->data->id) : ?>
        <a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>">
            <?php echo JText::_('COM_USERS_Edit_Profile'); ?></a>
    <?php endif; ?>
</div>
