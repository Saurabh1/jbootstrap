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

JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers');
$params = &$this->params;
?>

<div id="archive-items">
<?php foreach ($this->items as $i => $item) : ?>
	<div class="row<?php echo $i % 2; ?>">

		<h2 class="title">
		<?php if ($params->get('link_titles')): ?>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug,$item->catslug)); ?>">
		<?php echo $this->escape($item->title); ?></a>
		<?php else: ?>
			<?php echo $this->escape($item->title); ?>
		<?php endif; ?>
		</h2>

		<?php /** Begin Article Info **/ if (($params->get('show_author')) or ($params->get('show_parent_category')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))  or ($params->get('show_hits'))) : ?>
		<dl class="jb-articleinfo">
		<!--<dt class="article-info-term"><?php echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></dt>-->
		<?php endif; ?>
			<?php if ($params->get('show_parent_category')) : ?>
			<dd class="jb-parent-category">
				<?php	$title = $this->escape($item->parent_title);
						$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($item->parent_slug)).'">'.$title.'</a>';?>
				<?php if ($params->get('link_parent_category') && $item->parent_slug) : ?>
					<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
					<?php else : ?>
					<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
				<?php endif; ?>
			</dd>
			<?php endif; ?>

			<?php if ($params->get('show_category')) : ?>
			<dd class="jb-category">
				<?php	$title = $this->escape($item->category_title);
						$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)) . '">' . $title . '</a>'; ?>
				<?php if ($params->get('link_category') && $item->catslug) : ?>
					<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
					<?php else : ?>
					<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
				<?php endif; ?>
			</dd>
			<?php endif; ?>
	
			<?php if ($params->get('show_create_date')) : ?>
			<dd class="jb-date-posted">
				<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date',$item->created, JText::_('DATE_FORMAT_LC2'))); ?>
			</dd>
			<?php endif; ?>
			<?php if ($params->get('show_modify_date')) : ?>
			<dd class="jb-date-modified">
				<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date',$item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
			</dd>
			<?php endif; ?>
			<?php if ($params->get('show_publish_date')) : ?>
			<dd class="jb-date-published">
				<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE', JHtml::_('date',$item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
			</dd>
			<?php endif; ?>
			<?php if ($params->get('show_author') && !empty($item->author )) : ?>
			<dd class="jb-author"> 
				<?php $author =  $item->author; ?>
				<?php $author = ($item->created_by_alias ? $item->created_by_alias : $author);?>

				<?php if (!empty($item->contactid ) &&  $params->get('link_author') == true):?>
					<?php 	echo JText::sprintf('COM_CONTENT_WRITTEN_BY' , 
					 JHtml::_('link',JRoute::_('index.php?option=com_contact&view=contact&id='.$item->contactid),$author)); ?>

				<?php else :?>
					<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
				<?php endif; ?>
			</dd>
			<?php endif; ?>	
			<?php if ($params->get('show_hits')) : ?>
			<dd class="jb-hits">
				<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
			</dd>
			<?php endif; ?>
		<?php if (($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))  or ($params->get('show_hits'))) :?>
		</dl>
		<?php /** End Article Info **/ endif; ?>

		<?php if ($params->get('show_intro')) :?>
		<div class="intro">
			<?php echo JHtml::_('string.truncate', $item->introtext, $params->get('introtext_limit')); ?>
		</div>		
		<?php endif; ?>
	</div>
<?php endforeach; ?>
</div>

<div class="jb-pagination">
	<p class="jb-results">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>