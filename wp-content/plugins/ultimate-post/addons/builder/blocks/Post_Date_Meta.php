<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Date_Meta {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {
        
        return array(
            'blockId' => '',
            
            /*============================
                Post Date Meta Setting
            ============================*/
            "prefixEnable" => false,
            'metaDateIconShow' => true,
            "dateFormat" => "updated",
            'metaDateFormat' => 'M j, Y',
            'metaDateColor' => '',
            'metaDateTypo' => (object)['openTypography' => 0,'size' => (object)['lg' => '', 'unit' =>'px']],
            'metaDateCountAlign' => [],

            /*============================
                Post Date Meta Label
            ============================*/
            'datePubLabel' => 'Publish Date',
            'dateUpLabel' => 'Updated Date',
            'datePrefixColor' => '',
            'datePrefixSpace' => (object)['lg' =>'12', 'unit' =>'px'],
            
            /*============================
                Post Date Meta icon style
            ============================*/
            'metaDateIconStyle' => 'date1',
            'iconColor' => '',
            'metaDateIconSize' => (object)['lg' =>'15', 'unit' =>'px'],
            'metaDateIconSpace' => (object)['lg' =>'8', 'unit' =>'px'],
            
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
        register_block_type( 'ultimate-post/post-date-meta',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }

    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        $block_name = 'post-date-meta';
        $wrapper_before = $wrapper_after = $content = '';

            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class=" wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper">';
                    $content .= '<div class="ultp-date-meta">';
                        if ($attr["prefixEnable"]) {
                            $content .= '<span class="ultp-date-meta-prefix">';   
                                if($attr['dateFormat'] == "publish"){
                                    $content .= $attr['datePubLabel']; 
                                } else {
                                    $content .= $attr['dateUpLabel']; 
                                }

                            $content .= '</span>';    
                        }
                        if ($attr["metaDateIconShow"] && $attr["metaDateIconStyle"]) {
                            $content .= '<span class="ultp-date-meta-icon">';   
                                $content .= ultimate_post()->svg_icon($attr["metaDateIconStyle"]); 
                            $content .= '</span>';
                        }
                        if ($attr['metaDateFormat']) {
                            $content .= '<span class="ultp-date-meta-format">';   
                                if ($attr['dateFormat'] == 'updated') {
                                    $content .= get_the_modified_date(ultimate_post()->get_format($attr["metaDateFormat"])); 
                                } else {
                                    $content .= get_the_date(ultimate_post()->get_format($attr["metaDateFormat"])); 
                                }
                                
                            $content .= '</span>';
                        }
                    $content .= '</div>';
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        
        return $wrapper_before.$content.$wrapper_after;
    }
}