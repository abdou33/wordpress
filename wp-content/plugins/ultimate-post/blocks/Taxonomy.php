<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Taxonomy{
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {

        return array(
            'blockId' => '',
            'previewImg' => '',
            //--------------------------
            //      Layout
            //--------------------------
            'layout' => '1',

            //--------------------------
            //      Query Setting
            //--------------------------
            'taxType' => 'regular',
            'taxSlug' => 'category',
            'taxValue' => '[]',
            'queryNumber' => 6,
            //--------------------------
            //      General Setting
            //--------------------------
            'taxGridEn' => true,
            'columns' => (object)['lg' =>'1'],
            'columnGridGap' => (object)['lg' =>'20', 'unit' =>'px'],
            'rowGap' => (object)['lg' =>'20', 'unit' =>'px'],
            'titleShow' => true,
            'headingShow' => true,
            'excerptShow' => false,
            'countShow' => true,
            'openInTab' => false,
            'notFoundMessage' => 'No Taxonomy Found.',

            //--------------------------
            //      Heading Setting/Style
            //--------------------------
            'headingText' => 'Post Taxonomy',
            'headingURL' => '',
            'headingBtnText' => 'View More',
            'headingStyle' => 'style9',
            'headingTag' => 'h2',
            'headingAlign' => 'left',
            'headingTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => '20', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>'700'],
            'headingColor' => '#0e1523',
            'headingBorderBottomColor' => '#0e1523',
            'headingBorderBottomColor2' => '#e5e5e5',
            'headingBg' => '#037fff',
            'headingBg2' => '#e5e5e5',
            'headingBtnTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => '14', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none','family'=>''],
            'headingBtnColor' => '#037fff',
            'headingBtnHoverColor' => '#0a31da',
            'headingBorder' => '3',
            'headingSpacing' => (object)['lg'=>20, 'sm'=>10, 'unit'=>'px'],
            'headingRadius' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
            'headingPadding' => (object)['lg' =>(object)['unit' =>'px']],
            'subHeadingShow' => false,
            'subHeadingText' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut sem augue. Sed at felis ut enim dignissim sodales.',
            'subHeadingTypo' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'16', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)[ 'lg'=>'27', 'unit'=>'px'],'decoration'=>'none','transform' => '','family'=>'','weight'=>'500'],
            'subHeadingColor' => '#989898',
            'subHeadingSpacing' => (object)['lg' =>(object)['top' => '8', 'unit' =>'px']],

            //--------------------------
            //      Title Setting/Style
            //--------------------------
            'titleTag' => 'span',
            'contentTitleAlign' => 'left',
            'titlePosition' => true,
            'customTaxTitleColor' => false,
            'seperatorTaxTitleLink' => admin_url( 'edit-tags.php?taxonomy=category' ),
            'titleColor' => '',
            'TitleBgColor' => '#f2f2f2',
            'TitleBgHoverColor' => '#c5c5c5',
            'titleHoverColor' => '',
            'titleTypo' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'14', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)['lg'=>'22', 'unit'=>'px'],'transform' => '', 'decoration'=>'none','family'=>'','weight'=>''],
            'titleDotColor' => '#cacaca',
            'titleDotSize' => 'solid',
            'titleDotStyle' => (object)['lg'=>'1'],
            'titlePadding' => (object)['lg'=>(object)['unit'=>'px']],
            'titleRadius' => (object)['lg'=>'20', 'unit'=>'px'],

            //--------------------------
            // Content Setting/Style
            //--------------------------
            'excerptLimit' => 30,
            'excerptColor' => '',
            'excerptTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>14, 'unit' =>'px'],'height' => (object)['lg' =>'22', 'unit' =>'px'], 'decoration' => 'none','family'=>''],
            'excerptPadding' => (object)['lg' =>(object)['top' => '0','bottom' => '', 'unit' =>'px']],

            //--------------------------
            // Count Style Setting/Style
            //--------------------------
            'counterTypo' => (object)['openTypography' => 1, 'size' => (object)['lg' =>14, 'unit' =>'px'], 'height' => (object)['lg' =>'22', 'unit' =>'px'], 'spacing' => (object)['lg' =>0, 'unit' =>'px'], 'transform' => '', 'weight' => '400', 'decoration' => 'none','family'=>'' ],
            'counterColor' => '',
            'counterBgColor' => (object)['openColor' => 1,'type' => 'color', 'color' => ''],
            'counterWidth' => '',
            'counterHeight' => '',
            'counterBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'counterRadius' => (object)['lg' =>'', 'unit' =>'px'],

            //--------------------------
            // Inner Content Setting/Style
            //--------------------------
            'contentWrapBg' => '',
            'contentWrapHoverBg' => '',
            'contentWrapBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'contentWrapHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'contentWrapRadius' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'contentWrapHoverRadius' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'contentWrapShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'contentWrapHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'contentWrapPadding' => (object)['lg' =>(object)['unit' =>'px']],

            //--------------------------
            // Image Setting/Style
            //--------------------------
            'imgCrop' => (ultimate_post()->get_setting('disable_image_size') == 'yes' ? 'full' : 'ultp_layout_landscape'),
            'imgWidth' => (object)['lg' =>'', 'ulg' =>'%'],
            'imgHeight' => (object)['lg' =>'', 'unit' =>'px'],
            'imgSpacing' => (object)['lg'=>''],
            'contentAlign' => "center",

            //--------------------------
            // Separator
            //--------------------------
            'separatorShow' => false,
            'septColor' => '#e5e5e5',
            'septStyle' => 'solid',
            'septSize' => (object)['lg'=>'1'],
            'septSpace' => (object)['lg'=>'5'],

            //--------------------------
            //  Custom Wrapper Style
            //--------------------------
            'customTaxColor' => false,
            'seperatorTaxLink' => admin_url( 'edit-tags.php?taxonomy=category' ),
            'TaxAnimation' => 'none',
            'TaxWrapBg' => '',
            'TaxWrapHoverBg' => '',
            'TaxWrapBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'TaxWrapHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'TaxWrapShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'TaxWrapHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'TaxWrapRadius' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'TaxWrapHoverRadius' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'customOpacityTax' => .6,
            'customTaxOpacityHover' => .9,
            'TaxWrapPadding' => (object)['lg' =>(object)[ 'unit' =>'px']],

            //--------------------------
            //  Wrapper Style
            //--------------------------
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
        register_block_type( 'ultimate-post/ultp-taxonomy',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style' => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }

    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());

        if (!$noAjax) {
            $paged = is_front_page() ? get_query_var('page') : get_query_var('paged');
            $attr['paged'] = $paged ? $paged : 1;
        }

        $block_name = 'ultp-taxonomy';
        $wraper_before = $wraper_after = $post_loop = '';
        
        $recent_posts = ultimate_post()->get_category_data( json_decode($attr['taxValue']), $attr['queryNumber'], $attr['taxType'], $attr['taxSlug'] );

        if (!empty($recent_posts)) {
            $wraper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].' '.(isset($attr["class"])?$attr["class"]:'').'">';
                $wraper_before .= '<div class="ultp-block-wrapper">';

                    // Loading
                    $wraper_before .= ultimate_post()->loading();

                    if ($attr['headingShow']) {
                        $wraper_before .= '<div class="ultp-heading-filter">';
                            $wraper_before .= '<div class="ultp-heading-filter-in">';
                                // Heading
                                include ULTP_PATH.'blocks/template/heading.php';
                            $wraper_before .= '</div>';
                        $wraper_before .= '</div>';
                    }
                    $wraper_before .= '<div class="ultp-block-items-wrap">';
                        $idx = $noAjax ? 1 : 0;

                        $wraper_before .= '<ul class="ultp-taxonomy-items '.(isset($attr["TaxAnimation"])? ' ultp-taxonomy-animation-' .$attr["TaxAnimation"]:'').' ultp-taxonomy-column-'.json_decode(json_encode($attr['columns']), True)['lg'].' ultp-taxonomy-layout-'.$attr['layout'].'">';
                        foreach ($recent_posts as $value) {
                            $_style = ( ($attr["customTaxColor"] && $value['color'])  ? ' style="background-color:'.$value['color'].';"' : '');
                            $_style_color = ((in_array($attr['layout'], [1,4,5]) && $value['color'] && $attr["customTaxTitleColor"] ) ? ' style="color:'.$value['color'].';"' : '');
                            $_style_title_bg = ((in_array($attr['layout'], [7,8]) && $value['color'] && $attr["customTaxTitleColor"] ) ? ' style="background:'.$value['color'].';"' : '');

                            $post_loop .= '<li class="ultp-block-item ultp-taxonomy-item">';

                                $style = in_array($attr['layout'], [2,3,6,7,8]) ? 'style="'.($value['image'] ? 'background-image: url('.$value['image'][ $attr['imgCrop']].')' : 'background-color:'.$value['color']).'"' : '';
                                $name = ($attr['titleShow'] && $value['name']) ? '<'.$attr['titleTag'].' class="ultp-taxonomy-name" '.$_style_color.'>'.$value['name'].'</'.$attr['titleTag'].'>' : '';
                                $count = ($attr['countShow'] && $value['count']) ? '<span class="ultp-taxonomy-count" '.$_style_color.'>'.$value['count'].'</span>' : '';
                                $excerpt = ($attr['excerptShow'] && $value['desc']) ? '<div class="ultp-taxonomy-desc">'.$value['desc'].'</div>' : '';

                                $post_loop .= '<a href="'.$value['url'].'" '.($attr['layout'] != 3 ? $style : '').'>';
                                    switch ($attr['layout']) {
                                        case 1:
                                            $post_loop .= $name.$count.$excerpt;
                                            break;
                                        case 2:
                                            $post_loop .= '<div class="ultp-taxonomy-lt2-overlay"'.$_style.'></div><div class="ultp-taxonomy-lt2-content">'.$name.'<span class="ultp-taxonomy-bar"></span>'.$count.'</div>'.$excerpt;
                                            break;
                                        case 3:
                                            $post_loop .= '<div class="ultp-taxonomy-lt3-img" '.$style.'></div><div class="ultp-taxonomy-lt3-overlay"'.$_style.'></div><div class="ultp-taxonomy-lt3-content">'.$name.'<span class="ultp-taxonomy-bar"></span>'.$count.'</div>'.$excerpt;
                                            break;
                                        case 4:
                                            $img = $value['image'] ? '<img src="'.$value['image'][ $attr['imgCrop']].'" alt="'.$value['name'].'"/>' : '';
                                            $post_loop .= $img.'<div class="ultp-taxonomy-lt4-content">'.$name.$count.'</div>'.$excerpt;
                                            break;
                                            case 5:
                                                $img = $value['image'] ? '<img src="'.$value['image'][ $attr['imgCrop']].'" alt="'.$value['name'].'"/>' : '';
                                            $post_loop .= $img.'<span class="ultp-taxonomy-lt5-content">'.$name.$count.$excerpt.'</span>';
                                            break;
                                        case 6:
                                            $post_loop .= '<div class="ultp-taxonomy-lt6-overlay"'.$_style.'></div>'.$name.$count.$excerpt;
                                            break;
                                        case 7:
                                            $post_loop .= '<div class="ultp-taxonomy-lt7-overlay"'.$_style.'></div><'.$attr['titleTag'].' class="ultp-taxonomy-name" '.$_style_title_bg.'>'.$value['name'].$count.'</'.$attr['titleTag'].'>'.$excerpt;
                                            break;
                                        case 8:
                                            $post_loop .= '<div class="ultp-taxonomy-lt8-overlay"'.$_style.'></div><'.$attr['titleTag'].' class="ultp-taxonomy-name" '.$_style_title_bg.'>'.$value['name'].$count.'</'.$attr['titleTag'].'>'.$excerpt;
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }
                                $post_loop .= '</a>';
                            $post_loop .= '</li>';
                            $idx ++;
                        }
                        $wraper_after .= '</ul>';
                    $wraper_after .= '</div>';//ultp-block-items-wrap
                $wraper_after .= '</div>';
            $wraper_after .= '</div>';
            wp_reset_query();
        }else {
            $wraper_before .= ultimate_post()->get_no_result_found_html( $attr['notFoundMessage'] );
        }

        return $noAjax ? $post_loop : $wraper_before.$post_loop.$wraper_after;
    }
}