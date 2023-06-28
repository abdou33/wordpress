<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Author_Meta {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {
        
        return array(
            'blockId' => '',

            /*============================
                Post Author Meta  Settings
            ============================*/
            'authMetaIconColor' => '',
            'authMetaHoverColor' => '',
            'authMetaTypo' => (object)['openTypography' => 0,'size' => (object)['lg' => '', 'unit' =>'px']],
            'authMetAvatar' => true,
            'authMetaIconShow' => false,
            'authMetaCountAlign' => [],
            
            /*============================
                Post Author Avatar Style
            ============================*/
            'authMetAvSize' => (object)['lg' =>'30', 'unit' =>'px'],
            'authMetAvSpace' => (object)['lg' =>'10', 'unit' =>'px'],
            'authMetAvRadius' => (object)['lg' =>'100', 'unit' =>'px'],
            'authMetaLabel' => true,

            /*============================
                Post Author Icon Style
            ============================*/
            'authMetaIconStyle' => 'author1',
            'iconColor' => '#656565',
            'authMetaIconSize' => (object)['lg' =>'15', 'unit' =>'px'],
            'authMetaSpace' => (object)['lg' =>'10', 'unit' =>'px'],
            
            /*============================
                Post Author Label Style
            ============================*/
            'authMetaLabelText' => 'By',
            'authMetaLabelColor' => '#656565',
            'authMetaLabelTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            'authMetaLabelSpace' => (object)['lg' =>'8', 'unit' =>'px'],
            
            /*============================
                Advance Settings
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
        register_block_type( 'ultimate-post/post-author-meta',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }

    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        $block_name = 'post-author-meta';
        $wrapper_before = $wrapper_after = $content = '';
        $author_id = get_post_field('post_author' , get_the_ID());
        
        if ($author_id) {
            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper">';
                    $content .= '<span class="ultp-authMeta-count">';
                        if ($attr["authMetaIconShow"] && ($attr["authMetaIconStyle"] != '')) {
                            $content .= ultimate_post()->svg_icon($attr["authMetaIconStyle"]); 
                        }
                        if ($attr["authMetAvatar"]) {
                            $content .= '<div class="ultp-authMeta-avatar">';
                                $content .= get_avatar( $author_id, 32 ); 
                            $content .= '</div>';
                        }
                        if ($attr["authMetaLabel"]) {
                            $content .= '<span class="ultp-authMeta-label">'.$attr["authMetaLabelText"].'</span>';
                        }   
                        $content .= '<a class="ultp-authMeta-name" href="'.get_author_posts_url( $author_id ).'">';
                            $content .= get_the_author_meta('display_name', $author_id);
                        $content .= '</a>';
                    $content .= '</span>';
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        }
            
        return $wrapper_before.$content.$wrapper_after;
    }
}