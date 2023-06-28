<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Title{
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {

        return array(
            'blockId' =>  '',

            /*============================
                Post Title Settings
            ============================*/
            'titleColor' =>  '',
            'titleTypo' =>   (object)['openTypography' => 0,'size' => (object)['lg' => '', 'unit' =>'px']],
            'titleTag' =>  'h1',
            'titleAlign' =>  (object)[],

            //--------------------------
            //  Advanced Style
            //--------------------------
            'advanceId' =>  '',
            'advanceZindex' =>  '',
            'wrapMargin' =>  (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'wrapOuterPadding' =>  (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
            'wrapBg' =>  (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
            'wrapBorder' =>  (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'wrapShadow' =>  (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'wrapRadius' =>  (object)['lg' =>'', 'unit' =>'px'],
            'wrapHoverBackground' =>  (object)['openColor' => 0, 'type' => 'color', 'color' => '#037fff'],
            'wrapHoverBorder' =>  (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'wrapHoverRadius' =>  (object)['lg' =>'', 'unit' =>'px'],
            'wrapHoverShadow' =>  (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'hideExtraLarge' =>  false,
            'hideDesktop' =>  false,
            'hideTablet' =>  false,
            'hideMobile' =>  false,
            'advanceCss' =>  '',
        );
    }
    public function register() {
        register_block_type( 'ultimate-post/post-title',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'render_callback' =>  array($this, 'content')
            )
        );
    }
    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        $block_name = 'post-title';
        $wrapper_before = $wrapper_after = $content = '';

        $post_title = get_the_title();

        if ($post_title) {
            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper">';
                    $content .= '<'.$attr['titleTag'].' class="ultp-builder-title">'.$post_title.'</'.$attr['titleTag'].'>';
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        }
        return $wrapper_before.$content.$wrapper_after;
    }
}