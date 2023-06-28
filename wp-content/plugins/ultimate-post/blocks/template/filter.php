<?php
defined('ABSPATH') || exit;
$page_post_id = ultimate_post()->get_page_post_id($page_post_id, $attr['blockId']);
$wraper_before .= '<div class="ultp-filter-wrap" data-taxtype='.$attr['filterType'].' data-blockid="'.$attr['blockId'].'" data-blockname="ultimate-post_'.$block_name.'" data-postid="'.$page_post_id.'">';
    $wraper_before .= ultimate_post()->filter($attr['filterText'], $attr['filterType'], $attr['filterValue'], $attr['filterMobileText'], $attr['filterMobile']);
$wraper_before .= '</div>';