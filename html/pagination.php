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
defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to pagination rendering.
 *
 * pagination_list_footer
 * 	Input variable $list is an array with offsets:
 * 		$list[limit]		: int
 * 		$list[limitstart]	: int
 * 		$list[total]		: int
 * 		$list[limitfield]	: string
 * 		$list[pagescounter]	: string
 * 		$list[pageslinks]	: string
 *
 * pagination_list_render
 * 	Input variable $list is an array with offsets:
 * 		$list[all]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[start]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[previous]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[next]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[end]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[pages]
 * 			[{PAGE}][data]		: string
 * 			[{PAGE}][active]	: boolean
 *
 * pagination_item_active
 * 	Input variable $item is an object with fields:
 * 		$item->base	: integer
 * 		$item->link	: string
 * 		$item->text	: string
 *
 * pagination_item_inactive
 * 	Input variable $item is an object with fields:
 * 		$item->base	: integer
 * 		$item->link	: string
 * 		$item->text	: string
 *
 * This gives template designers ultimate control over how pagination is rendered.
 *
 * NOTE: If you override pagination_item_active OR pagination_item_inactive you MUST override them both
 */
function pagination_list_footer($list) {
    $html = "<div class=\"list-footer\">\n";

    $html .= "\n<div class=\"limit\">" . JText::_('Display Num') . $list['limitfield'] . "</div>";
    $html .= $list['pageslinks'];
    $html .= "\n<div class=\"counter pager\">" . $list['pagescounter'] . "</div>";

    $html .= "\n<input type=\"hidden\" name=\"limitstart\" value=\"" . $list['limitstart'] . "\" />";
    $html .= "\n</div>";

    return $html;
}

/* <div class="pagination">
  <ul>
  <li class="disabled"><a href="#">«</a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">»</a></li>
  </ul>
  </div> */

function pagination_list_render($list) {
    // Initialize variables
    $html = "<div><ul>";
    $html .= $list['start']['data'];
    $html .= $list['previous']['data'];

    foreach ($list['pages'] as $page) {
        /*if ($page['data']['active']) {
            $html .= '';
        }*/

        $html .= $page['data'];

        /*if ($page['data']['active']) {
            $html .= '';
        }*/
    }

    $html .= $list['next']['data'];
    $html .= $list['end']['data'];

    $html .= "</ul></div>";
    return $html;
}

function pagination_item_active(&$item) {
    return "<a href=\"" . $item->link . "\" title=\"" . $item->text . "\">" . $item->text . "</a>";
}

function pagination_item_inactive(&$item) {
    return "<li class=\"disabled\"><a href=\"#\">" . $item->text . "</a></li>";
}

?>