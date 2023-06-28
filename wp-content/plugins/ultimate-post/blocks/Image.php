<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Image{
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {

        return array(
            'blockId' => '',
            'previewImg' => '',
            /*--------------------------
                Image Settings
            --------------------------*/
            'imageUpload' => (object)[ 'id'=>'999999', 'url' => ULTP_URL.'assets/img/ultp-placeholder.jpg' ],
            'linkType' => 'link',
            'imgLink' => '',
            'linkTarget' => '_blank',
            'imgAlt' => 'Image',
            'imgAlignment' => ['lg' => 'left'],
            'imgWidth' => (object)['lg' =>'', 'ulg' =>'px'],
            'imgHeight' => (object)['lg' =>'', 'unit' =>'px'],
            'imageScale' => 'cover',
            'imgAnimation' => 'none',
            'imgGrayScale' => (object)['lg' =>'0', 'ulg' =>'%', 'unit' =>'%'],
            'imgHoverGrayScale' => (object)['lg' =>'0', 'unit' =>'%'],
            'imgRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'imgHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'imgShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'imgHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'imgMargin' => (object)['lg'=>''],
            'imgOverlay' => false,
            'imgOverlayType' => 'default',
            'overlayColor' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#0e1523'],
            'imgOpacity' => .7,
            'imgLazy' => false,

            /*--------------------------
                Heading Setting/Style
            --------------------------*/
            'headingText' => 'This is a Image Example',
            'headingEnable' => false,
            'headingColor' => '',
            'alignment' => ['lg' => 'left'],
            'headingTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => '14', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => '', 'transform' => '', 'family'=>'','weight'=>''],
            'headingMargin' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],

            /*--------------------------
                Button Settings
            --------------------------*/
            'buttonEnable' => false,
            'btnText' => 'Free Download',
            'btnLink' => '#',
            'btnTarget' => '_blank',
            'btnPosition' => 'centerCenter',

            //style
            'btnTypo' => (object)['openTypography' => 1, 'size' => (object)['lg' =>14, 'unit' =>'px'], 'height' => (object)['lg' =>20, 'unit' =>'px'], 'spacing' => (object)['lg' =>0, 'unit' =>'px'], 'transform' => '', 'weight' => '', 'decoration' => 'none','family'=>'' ],
            'btnColor' => '#fff',
            'btnBgColor' => (object)['openColor' => 1,'type' => 'color', 'color' => '#037fff'],
            'btnBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'btnRadius' => (object)['lg' =>'2', 'unit' =>'px'],
            'btnShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'btnHoverColor' => '#fff',
            'btnBgHoverColor' => (object)['openColor' => 1,'type' => 'color', 'color' => '#1239e2'],
            'btnHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'btnHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'btnHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'btnSacing' => (object)['lg' =>(object)['top' => 0,'bottom' => 0,'left' => 0,'right' => 0, 'unit' =>'px']],
            'btnPadding' => (object)['lg' =>(object)['top' => "6",'bottom' => "6",'left' => "12",'right' => "12", 'unit' =>'px']],

            /*--------------------------
                Wrapper Settings
            --------------------------*/
            'wrapBg' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
            'wrapBorder' => (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'wrapShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'wrapRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'wrapHoverBackground' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#037fff'],
            'wrapHoverBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'wrapHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'wrapHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'wrapMargin' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'wrapOuterPadding' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
            'advanceId' => '',
            'advanceZindex' => '',
            'hideExtraLarge' => false,
            'hideTablet' => false,
            'hideMobile' => false,
            'advanceCss' => '',
        );
    }

    public function register() {
        register_block_type( 'ultimate-post/image',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }

    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        
        $wraper_before = '';
        $block_name = 'image';
        $attr['headingShow'] = true;
        $wraper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].''.(isset($attr["align"])? ' align' .$attr["align"]:'').''.(isset($attr["className"])?' '.$attr["className"]:'').'">';
            $wraper_before .= '<div class="ultp-block-wrapper">';
                $wraper_before .= '<figure class="ultp-image-block-wrapper">';
                    $wraper_before .= '<div class="ultp-image-block ultp-image-block-'.$attr['imgAnimation'].($attr["imgOverlay"] ? ' ultp-image-block-overlay ultp-image-block-'.$attr["imgOverlayType"] : '' ).'">';
                        // Single Image
                        $img_arr = (array)$attr['imageUpload'];
                        if (!empty($img_arr)) {
                            if (($attr['linkType'] == 'link') && $attr['imgLink']) {
                                $wraper_before .= '<a href="'.$attr['imgLink'].'" target="'.$attr['linkTarget'].'">'.ultimate_post()->get_image_html($img_arr['url'], 'full', 'ultp-image', $attr['imgAlt'], $attr['imgLazy']).'</a>';
                            } else {
                                $wraper_before .= ultimate_post()->get_image_html($img_arr['url'], 'full', 'ultp-image', $attr['imgAlt'], $attr['imgLazy']);
                            }
                        }
                        if ($attr['btnLink'] && ($attr['linkType'] == 'button')) {
                            $wraper_before .= '<div class="ultp-image-button ultp-image-button-'.$attr['btnPosition'].'"><a href="'.$attr['btnLink'].'" target="'.$attr['btnTarget'].'">'.$attr['btnText'].'</a></div>';
                        }
                    $wraper_before .= '</div>';
                    if ($attr['headingEnable'] == 1) {
                        $wraper_before .= '<figcaption class="ultp-image-caption">'.$attr['headingText'].'</figcaption>';
                    }
                $wraper_before .= '</figure>';
            $wraper_before .= '</div>';
        $wraper_before .= '</div>';

        return $wraper_before;
    }
}