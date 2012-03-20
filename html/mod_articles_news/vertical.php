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
<ul class="newsflash-vert nav nav-list">
    <?php for ($i = 0, $n = count($list); $i < $n; $i++) :
        $item = $list[$i];
        ?>
        <li class="newsflash-item">
            <?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item');
            if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator'))) :
                ?>
                <span class="article-separator">&#160;</span>
        <?php endif; ?>
        </li>
<?php endfor; ?>
</ul>
