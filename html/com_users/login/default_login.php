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
JHtml::_('behavior.keepalive');

require_once(JPATH_LIBRARIES . '/gantry/gantry.php');
$gantry->init();
gantry_import('core.utilities.gantryjformfieldaccessor');
?>
<div class="login<?php echo $this->pageclass_sfx ?>">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1>
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <?php if ($this->params->get('logindescription_show') == 1 || $this->params->get('login_image') != '') : ?>
        <div class="login-description">
        <?php endif; ?>

        <?php if ($this->params->get('logindescription_show') == 1) : ?>
            <?php echo $this->params->get('login_description'); ?>
        <?php endif; ?>

        <?php if (($this->params->get('login_image') != '')) : ?>
            <img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JTEXT::_('COM_USER_LOGIN_IMAGE_ALT') ?>"/>
        <?php endif; ?>

        <?php if ($this->params->get('logindescription_show') == 1 || $this->params->get('login_image') != '') : ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post">

        <fieldset>
            <?php
            foreach ($this->form->getFieldset('credentials') as $field):
                $fa = new GantryJFormFieldAccessor($field);
                if ($fa->getType() == "text" || $fa->getType() == "password")
                    $fa->addClass('inputbox');
                ?>
                <?php if (!$field->hidden): ?>
                    <div class="login-fields"><?php echo $field->label; ?>
                        <?php echo $field->input; ?></div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="readon"><button type="submit" class="button btn"><?php echo JText::_('JLOGIN'); ?></button></div>
            <input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>" />
            <?php echo JHtml::_('form.token'); ?>
        </fieldset>
    </form>
</div>
