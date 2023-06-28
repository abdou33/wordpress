<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Content {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {

        return array(
            'blockId' => '',

            /*============================
                Post Content Settings
            ============================*/
            'inheritWidth' => false,
            'contentWidth' => (object)['lg' =>'', 'ulg' =>'px'],
            'descColor' => '',
            'descTypo' => (object)['openTypography' => 0,'size' => (object)['lg' => '14', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>''],
            "contentAlign" => "0 auto",
            
            /*============================
                Drop Cap Settings
            ============================*/
            'showCap' => false,
            'firstCharSize' => '110',
            'firstCharXSpace' => '25',
            'firstCharYSpace' => '100',
            'firstLatterColor' => '',

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
        register_block_type( 'ultimate-post/post-content',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style' => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }
    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        
        $post_id = get_the_ID();
        $block_name = 'post-content';
        $wrapper_before = $wrapper_after = $content = '';
        $post_content = get_the_content();
        $post_type = get_post_type();
        if ($post_type != 'ultp_builder' && $post_type != 'revision' && $post_type != 'premade') { // premade used for ultp.wpxpo.com
            $post_content = apply_filters('the_content', $post_content);
            $post_content = str_replace(']]>', ']]&gt;', $post_content);
        }
        if ($post_content) {
            // from v.2.9.7 for Loading Post Content Css
            ultimate_post()->set_css_style( $post_id );
            
            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper">';
                    $content .= '<div class="ultp-builder-content" data-postid="'.$post_id.'">';
                        $content .= $post_content;
                    $content .= '</div>';
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        }
        return $wrapper_before.$content.$wrapper_after;
    }
}