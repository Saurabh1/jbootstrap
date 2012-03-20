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
?>
<div class="logout<?php echo $this->pageclass_sfx ?>">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1>
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <?php if ($this->params->get('logoutdescription_show') == 1 || $this->params->get('logout_image') != '') : ?>
        <div class="logout-description">
        <?php endif; ?>

        <?php if ($this->params->get('logoutdescription_show') == 1) : ?>
            <?php echo $this->params->get('logout_description'); ?>
        <?php endif; ?>

        <?php if (($this->params->get('logout_image') != '')) : ?>
            <img src="<?php echo $this->escape($this->params->get('logout_image')); ?>" class="logout-image" alt="<?php echo JTEXT::_('COM_USER_LOGOUT_IMAGE_ALT') ?>"/>
        <?php endif; ?>

        <?php if ($this->params->get('logoutdescription_show') == 1 || $this->params->get('logout_image') != '') : ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.logout'); ?>" method="post">
        <div>
            <div class="readon"><button type="submit" class="button btn"><?php echo JText::_('JLOGOUT'); ?></button></div>
            <input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('logout_redirect_url', $this->form->getValue('return'))); ?>" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
</div>
