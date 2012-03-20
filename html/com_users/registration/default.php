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

require_once(JPATH_LIBRARIES . '/gantry/gantry.php');
$gantry->init();
gantry_import('core.utilities.gantryjformfieldaccessor');
?>
<div class="registration<?php echo $this->pageclass_sfx ?>">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate form-horizontal">
        <?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one. ?>
            <?php $fields = $this->form->getFieldset($fieldset->name); ?>
            <?php if (count($fields)): ?>
                <fieldset>
                    <?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend.?>
                        <legend><?php echo JText::_($fieldset->label); ?></legend>
                    <?php endif; ?>

                    <?php
                    foreach ($fields as $field):
                        $fa = new GantryJFormFieldAccessor($field);
                        if ($fa->getType() == "text" || $fa->getType() == "password" || $fa->getType() == "email")
                            $fa->addClass('inputbox');
                        ?>
                        <?php if ($field->hidden):// If the field is hidden, just display the input.?>
                            <?php echo $field->input; ?>
                        <?php else: ?>
                            <div class="control-group"><div class="control-label">
                                    <?php echo $field->label; ?>
                                    <?php if (!$field->required && (!$field->type == "spacer")): ?>
                                        <span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
                                    <?php endif; ?></div>
                                <div class="controls">            
                                    <?php echo $field->input; ?></div></div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </fieldset>
            <?php endif; ?>
        <?php endforeach; ?>
        <div>
            <div class="readon form-actions"><button type="submit" class="validate button btn btn-primary"><?php echo JText::_('JREGISTER'); ?></button>
                <a href="<?php echo JRoute::_(''); ?>" class="readon btn" title="<?php echo JText::_('JCANCEL'); ?>"><span><?php echo JText::_('JCANCEL'); ?></span></a></div>
            <input type="hidden" name="option" value="com_users" />
            <input type="hidden" name="task" value="registration.register" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
</div>
