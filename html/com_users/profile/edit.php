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
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
//load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load('plg_user_profile', JPATH_ADMINISTRATOR);

/*
 * <div class="control-group">
  <label for="input01" class="control-label">Text input</label>
  <div class="controls">
  <input type="text" id="input01" class="input-xlarge">
  <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>
  </div>
  </div>
 */
?>
<div class="profile-edit<?php echo $this->pageclass_sfx ?>">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
        <?php foreach ($this->form->getFieldsets() as $group => $fieldset):// Iterate through the form fieldsets and display each one. ?>
            <?php $fields = $this->form->getFieldset($group); ?>
            <?php if (count($fields)): ?>
                <fieldset>
                    <?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend. ?>
                        <legend><?php echo JText::_($fieldset->label); ?></legend>
                    <?php endif; ?>
                    <?php foreach ($fields as $field):// Iterate through the fields in the set and display them.?>
                        <?php if ($field->hidden):// If the field is hidden, just display the input.?>
                            <?php echo $field->input; ?>
                        <?php else: ?>
                            <div class="control-group"><div class="control-label"><?php echo $field->label; ?>
                                    <?php if (!$field->required && $field->type != 'Spacer'): ?>
                                        <span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
                                    <?php endif; ?></div>
                                <div class="controls">            
                                    <?php echo $field->input; ?></div></div>
                                <?php endif; ?>
                    <?php endforeach; ?>
                </fieldset>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="form-actions">
            <button type="submit" class="validate btn btn-primary"><span><?php echo JText::_('JSUBMIT'); ?></span></button>
            <a href="<?php echo JRoute::_(''); ?>" class="btn" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>

            <input type="hidden" name="option" value="com_users" />
            <input type="hidden" name="task" value="profile.save" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
</div>
