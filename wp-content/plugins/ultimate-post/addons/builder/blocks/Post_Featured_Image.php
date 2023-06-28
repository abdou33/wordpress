<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Featured_Image {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {
        
        return array(
            'blockId' => '',
            /*============================
                Post Featured Image Setting
            ============================*/
            'altText'  => 'Image',
            'imgWidth' => (object)['lg' =>'', 'ulg' =>'px', 'unit' =>'px'],
            'imgHeight' => (object)['lg' =>'', 'ulg' =>'px', 'unit' =>'px'],
            'imgRadius' => (object)['lg' =>'', 'ulg' =>'px', 'unit' =>'px'],
            'imgScale' => 'cover',
            'imageScale' => 'cover',
            'imgAlign' => (object)['lg' =>'left'],
            
            /*============================
                Dynamic Caption 
            ============================*/
            'enableCaption' => false,
            'captionColor' => '#000',
            'captionHoverColor' => '#222',
            'captionTypo' => (object)['openTypography' => 0,'size' => (object)['lg' => '', 'unit' =>'px']],
            'captionAlign' => 'center',
            'captionSpace' => (object)['lg' =>'', 'unit' =>'px'],

            /*============================
                Video Settings
            ============================*/
            'enableVideoCaption' => false,
            'videoWidth' => (object)['lg' =>'100'],
            'videoHeight' => (object)['lg' =>'', 'ulg' =>'px', 'unit' =>'px'],
            'vidAlign' => '',
            'stickyEnable' => false,
            'stickyWidth' => (object)['lg' =>'450'],
            'stickyPosition' => 'bottomRight',
            'flexiblePosition' => (object)['lg'=>'15', 'ulg' =>'px', 'unit' => 'px'],
            'stickyBg' => '#000',
            'stickyBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'stickyBoxShadow' => (object)['openShadow' => 1, 'width' => (object)['top' => 0, 'right' => 0, 'bottom' => 24, 'left' => 1],'color' => '#000000e6'],
            'stickyRadius' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
            'stickyPadding' => (object)['lg' =>(object)[]],
            'stickyCloseSize' => '47',
            'stickyCloseColor' => '#fff',
            'stickyCloseBg' => ' rgb(43, 43, 43)',

            /*============================
                Advanced Settings
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
        register_block_type( 'ultimate-post/post-featured-image',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }

    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        $block_name = 'post-image';
        $wrapper_before = $wrapper_after = $content = '';

        $post_video = get_post_meta(get_the_ID(), '__builder_feature_video', true);
        $caption = get_post_meta(get_the_ID(), '__builder_feature_caption', true); 

        $embeded = $post_video ? ultimate_post()->get_embeded_video($post_video, false, true, true, true, true, false, true, array('width' => array('width' => $attr["videoWidth"])) ) : '';
        $post_thumb_id = get_post_thumbnail_id(get_the_ID());
        $img_content = ultimate_post()->get_image($post_thumb_id, '', '', $attr['altText']);
        $img_caption = wp_get_attachment_caption($post_thumb_id);

        if ($embeded || has_post_thumbnail()) {
            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper">';
                    $wrapper_before .= '<div class="ultp-image-wrapper">';
                        $wrapper_before .= '<div  class="ultp-builder-'.($embeded ? "video": "image").'">';
                            $content .= '<div class="ultp-'.($embeded ? "video": "image").'-block'.($attr['stickyEnable'] ? " ultp-sticky-video": "").'">';
                            $content .= $embeded ? $embeded : $img_content;
                        $wrapper_after .= '<span class="ultp-sticky-close"></span></div>';
                        $wrapper_after .= '</div>';
                    $wrapper_after .= '</div>';

                    if($attr['enableCaption'] && $img_caption || $caption && $attr['enableVideoCaption']){
                        $wrapper_after .= '<div class="ultp-featureImg-caption">';
                        $wrapper_after .= $embeded ? $caption : $img_caption;
                        $wrapper_after .= '</div>';
                    }
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        }
        return $wrapper_before.$content.$wrapper_after;
    }
}