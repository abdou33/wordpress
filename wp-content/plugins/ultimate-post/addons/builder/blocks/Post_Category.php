<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Category {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {

        return array(
            'blockId' => '',

            /*============================
                Post Category Setting
            ============================*/
            'catLabelShow' => true,
            'catIconShow' => true,
            'catColor' => '#333',
            'catBgColor' => [],
            'catItemBorder' => (object)['openBorder'=>1, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#e2e2e2','type' => 'solid'],
            'catRadius' => (object)['lg' =>'2', 'unit' =>'px'],
            'catHovColor' => '#fff',
            'catBgHovColor' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#e2e2e2'],
            'catItemHoverBorder' => (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#323232','type' => 'solid'],
            'catHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'catTypo' => (object)['openTypography' => 0,'size' => (object)['lg' => '', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>''],
            'catSeparator' => ',',
            'catSpace' => (object)['lg' =>'8', 'unit' =>'px'],
            'catItemPad' => (object)['lg' =>(object)['top' => '3','bottom' => '3','left' => '7','right' => '7', 'unit' =>'px']],
            'catAlign' => (object)[],

            /*============================
                Categories Label Settings
            ============================*/
            'catLabel' => 'Category : ',
            'catLabelColor' => '',
            'catLabelTypo' => [],
            'catLabelSpace' => (object)['lg' =>'8', 'unit' =>'px'],
            'catLabelBgColor' => [],
            'catLabelBorder' => (object)['openTypography' => 0,'size' => (object)['lg' => '', 'unit' =>'px']],
            'catLabelRadius' => [],
            'catLabelPad' => (object)[],

            /*============================
                Categories Icon Style
            ============================*/
            'catIconStyle' => '',
            'catIconColor' => '#a4a4a4',
            'catIconHovColor' => '#a4a4a4',
            'catIconSize' => (object)['lg' =>'16', 'unit' =>'px'],
            'catIconSpace' => (object)['lg' =>'10', 'unit' =>'px'],

            /*============================
                Advance Setting
            ============================*/
            'advanceId' => '',
            'advanceZindex' => '',
            'wrapMargin' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'wrapOuterPadding' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
            'wrapBg' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
            'wrapBorder' => (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'wrapShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'wrapRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'wrapHoverBackground' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#037fff'],
            'wrapHoverBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'wrapHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'wrapHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'hideExtraLarge' => false,
            'hideDesktop' => false,
            'hideTablet' => false,
            'hideMobile' => false,
            'advanceCss' => '',
        );
    }

    public function register() {
        register_block_type( 'ultimate-post/post-category',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style' => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }

    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        $block_name = 'post-category';
        $wrapper_before = $wrapper_after = $content = '';

        $categories = get_the_category();
        if (!empty($categories)) {
            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper">';
                    $content .= '<div class="ultp-builder-category">';
                        if($attr["catIconShow"]){
                            $content .= ultimate_post()->svg_icon(''.$attr["catIconStyle"].'');
                        }
                        if ($attr['catLabelShow'] ) { 
                            $content .= '<div class="cat-builder-label">'.$attr['catLabel'].'</div>';
                        }
                        $content .= '<div class="cat-builder-content">';
                            foreach ($categories as $key => $category) {
                                $content .= ( ($key > 0 && $attr['catSeparator']) ? ' '.$attr['catSeparator']:'').'<a class="ultp-category-list" href="'.get_term_link($category->term_id).'">'.$category->name.'</a>';
                            }
                        $content .= '</div>';
                    $content .= '</div>';
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        }

        return $wrapper_before.$content.$wrapper_after;
    }
}