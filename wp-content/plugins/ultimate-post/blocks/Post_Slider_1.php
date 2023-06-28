<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Slider_1{

    public function __construct() {
        add_action('init', array($this, 'register'));
    }

    public function get_attributes() {

        return array(
            'blockId' => '',
            'previewImg' => '',
            //--------------------------
            //      Query Setting
            //--------------------------
            'queryQuick' => '',
            'queryNumPosts' => (object)['lg'=>5],
            'queryNumber' => 5,
            'queryType' => 'post',
            'queryTax' => 'category',
            'queryTaxValue' => '[]',
            'queryRelation' => 'OR',
            'queryOrderBy' => 'date',
            'metaKey' => 'custom_meta_key',
            'queryOrder' => 'desc',
            // Include Remove from Version 2.5.4
            'queryInclude' => '',
            'queryExclude' => '[]',
            'queryAuthor' => '[]',
            'queryOffset' => '0',
            'queryExcludeTerm' => '[]',
            'queryExcludeAuthor' => '[]',
            'querySticky' => true,
            'queryUnique' => '',
            'queryPosts' => '[]',
            'queryCustomPosts' => '[]',
            //--------------------------
            //      General Setting
            //--------------------------
            'slidesToShow' => (object)['lg' =>'1', 'sm' =>'1', 'xs' =>'1'],
            'autoPlay' => true,
            'height' => (object)['lg' =>'550', 'unit' =>'px'],
            'slideSpeed' => '3000',
            'sliderGap' => '10',
            'dots' => true,
            'arrows' => true,
            'preLoader' => false,
            'fade' => true,
            'titleShow' => true,
            'titleStyle' => 'none',
            'titleAnimColor' => 'black',
            'headingShow' => false,
            'excerptShow' => true,
            'catShow' => true,
            'metaShow' => true,
            'readMore' => true,
            'contentTag' => 'div',
            'openInTab' => false,
            'notFoundMessage' => 'No Post Found',

            //--------------------------
            //      Heading Setting/Style
            //--------------------------
            'headingText' => 'Post Slider #1',
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
            'headingSpacing' => (object)['lg'=>20, 'unit'=>'px'],
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
            'titleTag' => 'h3',
            'titlePosition' => true,
            'titleColor' => '#0e1523',
            'titleHoverColor' => '#037fff',
            'titleTypo' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'28', 'unit'=>'px'], 'height'=>(object)['lg'=>'36', 'unit'=>'px'], 'decoration'=>'none','family'=>'','weight'=>'500'],
            'titlePadding' => (object)['lg'=>(object)['top'=>25,'bottom'=>12, 'unit'=>'px']],
            'titleLength' => 0,
            'titleBackground' => '',

            //--------------------------
            // Content Setting/Style
            //--------------------------
            'showSeoMeta' => false,
            'showFullExcerpt' => false,
            'excerptLimit' => 40,
            'excerptColor' => '#777',
            'excerptTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>14, 'unit' =>'px'],'height' => (object)['lg' =>26, 'unit' =>'px'], 'decoration' => 'none','family'=>''],
            'excerptPadding' => (object)['lg' =>(object)['top' => 10,'bottom' => '', 'unit' =>'px']],

            //--------------------------
            // Content Wrap Setting/Style
            //--------------------------
            'contentVerticalPosition' => 'middlePosition',
            'contentHorizontalPosition' => 'centerPosition',
            'contentAlign' => "center",
            'contenWraptWidth' => (object)['lg'=>'60', 'xs'=>'90', 'unit' =>'%'],
            'contenWraptHeight' => (object)['lg'=>''],
            'contentWrapBg' => '#fff',
            'contentWrapHoverBg' => '',
            'contentWrapBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'contentWrapHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'contentWrapRadius' => (object)['lg' =>(object)['top' => '6','bottom' => '6', 'left' => '6', 'right' => '6', 'unit' =>'px']],
            'contentWrapHoverRadius' => (object)['lg' =>(object)['top' => '10','bottom' => '10', 'left' => '10', 'right' => '10', 'unit' =>'px']],
            'contentWrapShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 0, 'right' => 5, 'bottom' => 15, 'left' => 0],'color' => 'rgba(0,0,0,0.15)'],
            'contentWrapHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 0, 'right' => 10, 'bottom' => 25, 'left' => 0],'color' => 'rgba(0,0,0,0.25)'],
            'contentWrapPadding' => (object)['lg' =>(object)['top' => '50','bottom' => '50', 'left'=>'50','right'=>'50', 'unit' =>'px'], 'xs' =>(object)['top' => '20','bottom' => '20', 'left'=>'20','right'=>'20', 'unit' =>'px']],

            //--------------------------
            // Arrow Setting/Style
            //--------------------------
            'arrowStyle' => 'leftAngle2#rightAngle2',
            'arrowSize' => (object)['lg' =>'', 'unit' =>'px'],
            'arrowWidth' => (object)['lg' =>'60', 'unit' =>'px'],
            'arrowHeight' => (object)['lg' =>'60', 'unit' =>'px'],
            'arrowVartical' => (object)['lg' =>'', 'unit' =>'px'],
            'arrowColor' => '#037fff',
            'arrowHoverColor' => '#fff',
            'arrowBg' => '#fff',
            'arrowHoverBg' => '#037fff',
            'arrowBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'arrowHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'arrowRadius' => (object)['lg' =>(object)['top' => '50','bottom' => '50', 'left' => '50','right' => '50', 'unit' =>'px']],
            'arrowHoverRadius' => (object)['lg' =>(object)['top' => '50','bottom' => '50', 'left' => '50','right' => '50', 'unit' =>'px']],
            'arrowShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'arrowHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],

            //--------------------------
            // Dot Setting/Style
            //--------------------------
            'dotWidth' => (object)['lg' =>'10', 'unit' =>'px'],
            'dotHeight' => (object)['lg' =>'10', 'unit' =>'px'],
            'dotHoverWidth' => (object)['lg' =>'16', 'unit' =>'px'],
            'dotHoverHeight' => (object)['lg' =>'16', 'unit' =>'px'],
            'dotSpace' => (object)['lg' =>'4', 'unit' =>'px'],
            'dotVartical' => (object)['lg' =>'40', 'unit' =>'px'],
            'dotHorizontal' => (object)['lg'=>''],
            'dotBg' => '#f5f5f5',
            'dotHoverBg' => '#000',
            'dotBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'dotHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'dotRadius' => (object)['lg' =>(object)['top' => '50','bottom' => '50','left' => '50','right' => '50', 'unit' =>'px']],
            'dotHoverRadius' => (object)['lg' =>(object)['top' => '50','bottom' => '50','left' => '50','right' => '50', 'unit' =>'px']],
            'dotShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'dotHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],

            //--------------------------
            // Category Setting/Style
            //--------------------------
            'maxTaxonomy'=> '30',
            'taxonomy' => 'category',
            'catStyle' => 'classic',
            'catPosition' => 'aboveTitle',
            'customCatColor' => false,
            'seperatorLink' => admin_url( 'edit-tags.php?taxonomy=category' ),
            'onlyCatColor' => false,
            'catLineWidth' => (object)['lg'=>'20'],
            'catLineSpacing' => (object)['lg'=>'30'],
            'catLineColor' => '#000',
            'catLineHoverColor' => '#037fff',
            'catTypo' => (object)['openTypography' => 1, 'size' => (object)['lg' =>12, 'unit' =>'px'], 'height' => (object)['lg' =>15, 'unit' =>'px'], 'spacing' => (object)['lg' =>1, 'unit' =>'px'], 'transform' => '', 'weight' => '500', 'decoration' => 'none','family'=>'' ],
            'catColor' => '#fff',
            'catBgColor' => (object)['openColor' => 1,'type' => 'color', 'color' => '#000'],
            'catBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'catRadius' => (object)['lg' =>'2', 'unit' =>'px'],
            'catHoverColor' => '#fff',
            'catBgHoverColor' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#037fff'],
            'catHoverBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'catSacing' => (object)['lg' =>(object)['top' => -65,'bottom' => 5,'left' => 0,'right' => 0, 'unit' =>'px'], 'xs' =>(object)['top' => -34,'bottom' => 5,'left' => 0,'right' => 0, 'unit' =>'px']],
            'catPadding' => (object)['lg' =>(object)['top' => 8,'bottom' => 6,'left' => 16,'right' => 16, 'unit' =>'px']],

            //--------------------------
            // Image Style
            //--------------------------
            'imageShow' => true,
            'imgCrop' => 'full',
            'imgOverlay' => false,
            'imgOverlayType' => 'default',
            'overlayColor' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#0e1523'],
            'imgOpacity' => .7,
            'imgGrayScale' => (object)['lg' =>'0', 'ulg' =>'%', 'unit' =>'%'],
            'imgHoverGrayScale' => (object)['lg' =>'0', 'unit' =>'%'],
            'imgRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'imgHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'imgShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'imgHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'fallbackEnable' => true,
            'fallbackImg' => '',
            'imgSrcset' => false,
            'imgLazy' => false,


            //--------------------------
            // Read more Setting/Style
            //--------------------------
            'readMoreText' => '',
            'readMoreIcon' => 'rightArrowLg',
            'readMoreTypo' => (object)['openTypography' => 1, 'size' => (object)['lg' =>12, 'unit' =>'px'], 'height' => (object)['lg' =>'', 'unit' =>'px'], 'spacing' => (object)['lg' =>1, 'unit' =>'px'], 'transform' => '', 'weight' => '500', 'decoration' => 'none','family'=>'' ],
            'readMoreIconSize' => (object)['lg' =>'', 'unit' =>'px'],
            'readMoreColor' => '#000',
            'readMoreBgColor' => (object)['openColor' => 0,'type' => 'color', 'color' => '#037fff'],
            'readMoreBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'readMoreRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'readMoreHoverColor' => '#037fff',
            'readMoreBgHoverColor' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#0c32d8'],
            'readMoreHoverBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'readMoreHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'readMoreSacing' => (object)['lg' =>(object)['top' => 30,'bottom' => '','left' => '','right' => '', 'unit' =>'px']],
            'readMorePadding' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '','right' => '', 'unit' =>'px']],

            //--------------------------
            // Meta Setting/Style
            //--------------------------
            'metaPosition' => 'top',
            'metaStyle' => 'icon',
            'authorLink' => true,
            'metaSeparator' => 'dash',
            'metaList' => '["metaAuthor","metaDate","metaRead"]',
            'metaMinText' => 'min read',
            'metaAuthorPrefix' => 'By',
            'metaDateFormat' => 'M j, Y',
            'metaTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>12, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px'], 'decoration' => 'none','family'=>''],
            'metaColor' => '#989898',
            'metaHoverColor' => '#037fff',
            'metaSpacing' => (object)['lg' =>'15', 'unit' =>'px'],
            'metaMargin' => (object)['lg' =>(object)['top' => '5','bottom' => '', 'left'=>'','right'=>'', 'unit' =>'px']],
            'metaPadding' => (object)['lg' =>(object)['top' => '5','bottom' => '5', 'left'=>'','right'=>'', 'unit' =>'px']],
            'metaBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => '0', 'bottom' => '0', 'left' => '0'],'color' => '#009fd4','type' => 'solid'],
            'metaBg' => '',

            //--------------------------
            //  Wrapper Style
            //--------------------------
            'loadingColor' => '#000',
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
            'wrapInnerPadding' => (object)['lg' =>(object)['unit' =>'px']],
            'advanceId' => '',
            'advanceZindex' => '',
            'hideExtraLarge' => false,
            'hideTablet' => false,
            'hideMobile' => false,
            'advanceCss' => '',

        );
    }

    public function register() {
        register_block_type( 'ultimate-post/post-slider-1',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }

    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        global $unique_ID;

        if (!$noAjax) {
            $paged = is_front_page() ? get_query_var('page') : get_query_var('paged');
            $attr['paged'] = $paged ? $paged : 1;
        }

        $block_name = 'post-slider-1';
        $page_post_id = ultimate_post()->get_ID();
        $wraper_before = $wraper_after = $post_loop = '';
        $attr['queryNumber'] = ultimate_post()->get_post_number(5, $attr['queryNumber'], $attr['queryNumPosts']);
        $recent_posts = new \WP_Query( ultimate_post()->get_query( $attr ) );
        $pageNum = ultimate_post()->get_page_number($attr, $recent_posts->found_posts);
        // Dummy Img Url
        $dummy_url = ULTP_URL.'assets/img/ultp-fallback-img.png';

        $slides = is_object($attr['slidesToShow']) ? json_decode(json_encode($attr['slidesToShow']),true) : $attr['slidesToShow'];
    
        if ($recent_posts->have_posts() ) {
            $wraper_before .= '<div '.($attr['advanceId'] ? 'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].''.(isset($attr["align"])? ' align' .$attr["align"]:'').''.(isset($attr["className"])?' '.$attr["className"]:'').'">';
                $wraper_before .= '<div class="ultp-block-wrapper">';
                    if ($attr['headingShow']) {
                        $wraper_before .= '<div class="ultp-heading-filter">';
                            $wraper_before .= '<div class="ultp-heading-filter-in">';
                                include ULTP_PATH.'blocks/template/heading.php';
                            $wraper_before .= '</div>';
                        $wraper_before .= '</div>';
                    }
                    
                    $wraper_before .= '<div class="ultp-block-items-wrap" data-arrows="'.$attr['arrows'].'" data-dots="'.$attr['dots'].'" data-autoplay="'.$attr['autoPlay'].'" data-slidespeed="'.$attr['slideSpeed'].'" data-fade="'.$attr['fade'].'" data-slidelg="'.(isset($slides['lg'])?$slides['lg']:1).'" data-slidesm="'.(isset($slides['sm'])?$slides['sm']:1).'" data-slidexs="'.(isset($slides['xs'])?$slides['xs']:1).'">';
                        $idx = $noAjax ? 1 : 0;
                        while ( $recent_posts->have_posts() ): $recent_posts->the_post();
                            
                            include ULTP_PATH.'blocks/template/data.php';

                            if ($attr['queryUnique']) {
                                $unique_ID[$attr['queryUnique']][] = $post_id;
                            }

                            $post_loop .= '<'.$attr['contentTag'].' class="ultp-block-item post-id-'.$post_id.'">';
                                if($attr['preLoader']) {
                                    $post_loop .= '<div class="ultp-post-slider-loader-container">';
                                        $post_loop .= ultimate_post()->loading();
                                    $post_loop .= '</div>';
                                }
                                
                                $post_loop .= '<div>';
                                $post_loop .= '<div class="ultp-block-slider-wrap">';

                                    $post_loop .= '<div class="ultp-block-image-inner">';
                                        if ($attr['imageShow']) {
                                            if($post_thumb_id || $attr['fallbackEnable']) {
                                                $post_loop .= '<div class="ultp-block-image '.($attr["imgOverlay"] ? ' ultp-block-image-overlay ultp-block-image-'.$attr["imgOverlayType"].' ultp-block-image-'.$attr["imgOverlayType"].$idx : '' ).'">';
                                                    $post_loop .= '<a href="'.$titlelink.'" '.($attr['openInTab'] ? 'target="_blank"' : '').'>';
                                                    // Post Image Id
                                                    $block_img_id = $post_thumb_id ? $post_thumb_id : ($attr['fallbackEnable'] && isset($attr['fallbackImg']['id']) ? $attr['fallbackImg']['id'] : '');
                                                    // Post Image 
                                                    if($post_thumb_id || ($attr['fallbackEnable'] && $block_img_id)) {
                                                        $post_loop .=  ultimate_post()->get_image($block_img_id, $attr['imgCrop'], '', $title, $attr['imgSrcset'], $attr['imgLazy']);
                                                    } else {
                                                        $post_loop .= '<img  src="'.$dummy_url.'" alt="dummy-img" />';
                                                    }
                                                $post_loop .= '</a></div>'; //.ultp-block-image    
                                            }
                                        }
                                    $post_loop .= '</div>'; //.ultp-block-image-inner                  

                                    $post_loop .= '<div class="ultp-block-content ultp-block-content-'.$attr['contentVerticalPosition'].' ultp-block-content-'.$attr['contentHorizontalPosition'].'">';
                                        $post_loop .= '<div class="ultp-block-content-inner">';
                                            
                                            include ULTP_PATH.'blocks/template/category.php';
                                            $post_loop .= $category;

                                            if ($title && $attr['titleShow'] && $attr['titlePosition']) {
                                                include ULTP_PATH.'blocks/template/title.php';
                                            }
                                            
                                            if ($attr['metaPosition'] =='top' ) {
                                                include ULTP_PATH.'blocks/template/meta.php';
                                            }

                                            if ($title && $attr['titleShow'] && !$attr['titlePosition']) {
                                                include ULTP_PATH.'blocks/template/title.php';
                                            }

                                            if ($attr['excerptShow']) {
                                                $post_loop .= '<div class="ultp-block-excerpt">'.ultimate_post()->get_excerpt($post_id, $attr['showSeoMeta'], $attr['showFullExcerpt'], $attr['excerptLimit']).'</div>';
                                            }

                                            if ($attr['readMore']) {
                                                $post_loop .= '<div class="ultp-block-readmore"><a aria-label="'.$title.'" href="'.$titlelink.'" '.($attr['openInTab'] ? 'target="_blank"' : '').'>'.($attr['readMoreText'] ? $attr['readMoreText'] : esc_html__( "Read More", "ultimate-post" )).ultimate_post()->svg_icon($attr['readMoreIcon']).'</a></div>';
                                            }

                                            if ($attr['metaPosition'] =='bottom' ) {
                                                include ULTP_PATH.'blocks/template/meta.php';
                                            }
                                            
                                        $post_loop .= '</div>'; //.ultp-block-content-inner
                                    $post_loop .= '</div>'; //.ultp-block-content

                                $post_loop .= '</div>'; //.ultp-block-slider-wrap
                                $post_loop .= '</div>'; //div
                            $post_loop .= '</'.$attr['contentTag'].'>'; //.ultp-block-item

                        endwhile;

                    $wraper_after .= '</div>'; //.ultp-block-items-wrap

                    if ($attr['arrows']) {
                        $wraper_after .= '<div class="ultp-slick-nav" style="display:none">';
                            $nav = explode('#', $attr['arrowStyle']);
                            $wraper_after .= '<div class="ultp-slick-prev"><div class="slick-arrow slick-prev">'.ultimate_post()->svg_icon($nav[0]).'</div></div>';
                            $wraper_after .= '<div class="ultp-slick-next"><div class="slick-arrow slick-next">'.ultimate_post()->svg_icon($nav[1]).'</div></div>';
                        $wraper_after .= '</div>';
                    }

                $wraper_after .= '</div>'; //.ultp-block-wrapper
            $wraper_after .= '</div>'; //.wp-block-ultimate-post-post-slider-1

            wp_reset_query();
        }else {
            $wraper_before .= ultimate_post()->get_no_result_found_html( $attr['notFoundMessage'] );
        }
        
        return $noAjax ? $post_loop : $wraper_before.$post_loop.$wraper_after;
    }

}