<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Tag {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {

        return array(
            'blockId' => '',

            /*============================
                Post Tag Settings
            ============================*/
            'tagLabelShow' => true,
            'tagIconShow' => true,
            'tagColor' => '#333',
            'tagBgColor' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
            'tagItemBorder' => (object)['openBorder'=>1, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#e2e2e2','type' => 'solid'],
            'tagRadius' => (object)['lg' =>'2', 'unit' =>'px'],
            'tagHovColor' => '#fff',
            'tagBgHovColor' => '#000',
            'tagItemHoverBorder' => (object)['openBorder'=>1, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#000','type' => 'solid'],
            'tagHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'tagTypo' => (object)['openTypography' => 0,'size' => (object)['lg' => '', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>''],
            'tagSpace' => (object)['lg' =>'8', 'unit' =>'px'],
            'tagItemPad' => (object)['lg' =>(object)['top' => '2','bottom' => '2','left' => '7','right' => '7', 'unit' =>'px']],
            'tagAlign' => (object)[],


            /*============================
                Tag Label Settings
            ============================*/
            'tagLabel' => 'Tags: ',
            'labelColor' => '',
            'labelBgColor' => '',
            'labelTypo' => (object)['openTypography' => 0,'size' => (object)['lg' => '', 'unit' =>'px']],
            'tagLabelSpace' => (object)['lg' =>'8', 'unit' =>'px'],
            'tagLabelBorder' => (object)['openBorder'=>0],
            'tagLabelRadius' => (object)[],
            'tagLabelPad' => (object)[],
            /*============================
                Tag Icon Settings
            ============================*/
            'tagIconStyle' => '',
            'tagIconColor' => '#a4a4a4',
            'tagIconHovColor' => '#a4a4a4',
            'tagIconSize' => (object)['lg' =>'16', 'unit' =>'px'],
            'tagIconSpace' => (object)['lg' =>'10', 'unit' =>'px'],

            //--------------------------
            //  Advanced Settings
            //--------------------------
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
        register_block_type( 'ultimate-post/post-tag',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }
    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        $block_name = 'post-tag';
        $wrapper_before = $wrapper_after = $content = '';

        $tag_list = get_the_tag_list('','');

        if ($tag_list) {
            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper">';
                    $content .= '<div class="ultp-builder-tag">';
                        if($attr["tagIconShow"]){
                            $content .= ultimate_post()->svg_icon(''.$attr["tagIconStyle"].'');
                        }
                        if ($attr['tagLabelShow']) {
                            $content .= '<div class="tag-builder-label">';
                                $content .= $attr['tagLabel'];
                            $content .= '</div>';
                        }
                        $content .= '<div class="tag-builder-content">';
                            $content .= $tag_list;
                        $content .= '</div>';
                    $content .= '</div>';
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        }

        return $wrapper_before.$content.$wrapper_after;
    }
}