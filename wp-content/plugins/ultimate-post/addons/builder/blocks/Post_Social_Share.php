<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Social_Share {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {
        return array(
            'blockId' => '',
            'repetableField' => [
                [ 'type' => 'facebook', 'enableLabel' => true, 'label' => 'Facebook', 'iconColor' => '#fff', 'iconColorHover' => '#d2d2d2', 'shareBg' => '#4267B2', 'bgHoverColor' => '#f5f5f5' ],
                [ 'type' => 'twitter', 'enableLabel' => true, 'label' => 'Twitter',  'iconColor' => '#fff', 'iconColorHover' => '#d2d2d2', 'shareBg' => '#1DA1F2', 'bgHoverColor' => '#f5f5f5'   ],
                [ 'type' => 'pinterest', 'enableLabel' => true, 'label' => 'Pinterest',  'iconColor' => '#fff', 'iconColorHover' => '#d2d2d2', 'shareBg' => '#E60023', 'bgHoverColor' => '#f5f5f5' ],
                [ 'type' => 'linkedin', 'enableLabel' => true, 'label' => 'Linkedin',  'iconColor' => '#fff', 'iconColorHover' => '#d2d2d2', 'shareBg' => '#0A66C2', 'bgHoverColor' => '#f5f5f5' ],
                [ 'type' => 'mail', 'enableLabel' => true,'label' => 'Mail', 'iconColor' => '#fff','iconColorHover' => '#d2d2d2','shareBg' => '#EA4335','bgHoverColor' => '#f5f5f5' ],
            ],
            /*============================
                Social Share item style 
            ============================*/
            'shareItemTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => '18', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>''],
            'shareIconSize' => (object)['lg' =>'20', 'unit' =>'px'],
            'shareBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#c3c3c3','type' => 'solid' ],
            'shareRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'disInline' => true,
            'itemPadding' => (object)['lg' =>(object)['top' => '15','bottom' => '15', 'left'=>'15','right'=>'15', 'unit' =>'px']],
            'itemSpacing' => (object)['lg' =>(object)['top' => '5','bottom' => '5', 'left'=>'5','right'=>'5', 'unit' =>'px']],
            "itemContentAlign" => "flex-start",
            'itemAlign' => 'left',
            
            /*============================
                Post Social Share Label Style
            ============================*/
            'shareLabelShow' => true,
            'labelIconSize' => (object)['lg' => '24'],
            'labelIconSpace' => (object)['lg' =>(object)['top' => '0','bottom' => '0', 'left'=>'0','right'=>'15', 'unit' =>'px']],
            'shareLabelIconColor' => '#002dff',
            'shareLabelStyle' => 'style1',
            'shareCountShow' => true,
            'Labels1BorderColor' => '#',
            'shareCountColor' => '#',
            'shareCountTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => '14', 'unit' => 'px'], 'height' => (object)['lg' => '20', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>''],
            'shareCountLabel' => 'Shares',
            'shareLabelColor' => '#',
            'shareLabelTypo' => (object)['openTypography' => 0,'size' => (object)['lg' => '12', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>''],
            'shareLabelBackground' => '#fff',
            'shareLabelBorder' => (object)['openBorder'=>1, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#c3c3c3','type' => 'solid' ],
            'shareLabelRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'shareLabelPadding' => (object)['lg' =>(object)['top' => '10','bottom' => '10', 'left'=>'25','right'=>'25', 'unit' =>'px']],

            /*============================
                Post Social Share sticky position Style
            ============================*/
            'enableSticky' => false,
            'itemPosition' => 'bottom',
            'stickyLeftOffset' => "20",
            'stickyRightOffset' => "20",
            'stickyTopOffset' => "20",
            'stickyBottomOffset' => "20",
            'resStickyPost' => false,
            'floatingResponsive' => "600",
            'stopSticky' => false,

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
        register_block_type( 'ultimate-post/post-social-share',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }

    public function share_link($key = 'facebook', $post_link = '') {
        $shareLink = [
            'facebook' => 'http://www.facebook.com/sharer.php?u='.$post_link,
            'twitter' => 'http://twitter.com/share?url='.$post_link,
            'linkedin' => 'https://www.linkedin.com/sharing/share-offsite/?url='.$post_link,
            'pinterest' => 'http://pinterest.com/pin/create/link?url='.$post_link,
            'whatsapp' => 'https://api.whatsapp.com/send?text='.$post_link,
            'messenger' => 'https://www.facebook.com/dialog/send?app_id=1904103319867886&amp;link='.$post_link.'&amp;redirect_uri='.$post_link,
            'mail' => 'mailto:?body='.$post_link,
            'reddit' => 'https://www.reddit.com/submit?url='.$post_link,
            'skype' => 'https://web.skype.com/share?url='.$post_link,
        ];
        return $shareLink[$key];
    }
    
    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        $block_name = 'post_share';
        
        $wrapper_before = $wrapper_after = $wrapper_content = '';

        $post_id = get_the_ID();
        $post_link = esc_url(home_url($_SERVER['REQUEST_URI']));
        $total_share = get_post_meta($post_id, 'share_count', true);
        $total_share = $total_share ? $total_share : 0;
        
        $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
            $wrapper_before .= '<div class="ultp-block-wrapper">';
                $wrapper_content .= '<div class="ultp-post-share">';
                    $wrapper_content .= '<div class="ultp-post-share-layout ultp-inline-'.($attr["disInline"]?'true':'false').' '.($attr['stopSticky'] && $attr['enableSticky'] ? 'ultp-disable-sticky-footer' : '').'">';
                        if ($attr["shareLabelShow"]) {
                            $wrapper_content .= '<div class="ultp-post-share-count-section ultp-post-share-count-section-'.$attr["shareLabelStyle"].'">';
                                if ($attr["shareLabelStyle"] != 'style2' && $attr["shareCountShow"]) {
                                    $wrapper_content .= '<span class="ultp-post-share-count">'.$total_share.'</span>';
                                }
                                if ($attr["shareLabelStyle"] == 'style2') {
                                    $wrapper_content .= '<span class="ultp-post-share-icon-section">'.ultimate_post()->svg_icon('share').'</span>';
                                }
                                if ($attr["shareLabelStyle"] != 'style2' && $attr["shareCountLabel"]) {
                                    $wrapper_content .= '<span class="ultp-post-share-label">'.$attr["shareCountLabel"].'</span>';
                                }
                            $wrapper_content .= '</div>';
                        }
                        $wrapper_content .= '<div class="ultp-post-share-item-inner-block" postId="'.$post_id.'" count="'.$total_share.'">';

                            foreach ($attr["repetableField"] as $key => $value) {
                                $wrapper_content .= '<div class="ultp-post-share-item ultp-repeat-'.$key.' ultp-social-'.$value["type"].'">';
                                    $wrapper_content .= '<a href="javascript:" class="ultp-post-share-item-'.$value["type"].'" url="'.$this->share_link($value['type'], $post_link).'">';
                                        $wrapper_content .= '<span class="ultp-post-share-item-icon">'.ultimate_post()->svg_icon($value['type']).'</span>';
                                        $wrapper_content .= ''.$value['enableLabel'] ? '<span class="ultp-post-share-item-label">'.$value['label'].'</span>' : "".' ';
                                    $wrapper_content .= '</a>';
                                $wrapper_content .= '</div>';
                            }
                        $wrapper_content .= '</div>';
                    $wrapper_content .= '</div>';
                $wrapper_content .= '</div>';
            $wrapper_after .= '</div>';
        $wrapper_after .= '</div>';

        return $wrapper_before.$wrapper_content.$wrapper_after;
    }
}