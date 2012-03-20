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

<fieldset id="users-profile-core">
    <legend>
        <?php echo JText::_('COM_USERS_PROFILE_CORE_LEGEND'); ?>
    </legend>
    <dl class="dl-horizontal">
        <dt>
        <?php echo JText::_('COM_USERS_PROFILE_NAME_LABEL'); ?>
        </dt>
        <dd>
            <?php echo $this->data->name; ?>
        </dd>
        <dt>
        <?php echo JText::_('COM_USERS_PROFILE_USERNAME_LABEL'); ?>
        </dt>
        <dd>
            <?php echo htmlspecialchars($this->data->username); ?>
        </dd>
        <dt>
        <?php echo JText::_('COM_USERS_PROFILE_REGISTERED_DATE_LABEL'); ?>
        </dt>
        <dd>
            <?php echo JHtml::_('date', $this->data->registerDate); ?>
        </dd>
        <dt>
        <?php echo JText::_('COM_USERS_PROFILE_LAST_VISITED_DATE_LABEL'); ?>
        </dt>

        <?php if ($this->data->lastvisitDate != '0000-00-00 00:00:00') { ?>
            <dd>
                <?php echo JHtml::_('date', $this->data->lastvisitDate); ?>
            </dd>
        <?php } else {
            ?>
            <dd>
                <?php echo JText::_('COM_USERS_PROFILE_NEVER_VISITED'); ?>
            </dd>
        <?php } ?>

    </dl>
</fieldset>
