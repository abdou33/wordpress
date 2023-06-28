<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Slider_2 {

    public function __construct() {
        add_action('init', array($this, 'register'));
    }

    public function get_attributes() {

        return array(
            'blockId' => '',
            'previewImg' => '',

            /*============================
                General Setting
            ============================*/
            'slidesToShow' => (object)['lg' =>'1', 'sm' =>'1', 'xs' =>'1'],
            'autoPlay' => true,
            'height' => (object)['lg' =>'550', 'unit' =>'px'],
            'slidesCenterPadding' => (object)['lg'=>'160', 'sm'=>'100', 'xs'=>'50',],
            'allItemScale' => (object)['lg'=>'.9'],
            'centerItemScale' => (object)['lg'=>'1.12'],
            'slideSpeed' => '3000',
            'sliderGap' => '',
            'dots' => true,
            'arrows' => true,
            'preLoader' => false,
            'fade' => false,
            'titleShow' => true,
            'titleStyle' => 'none',
            'headingShow' => false,
            'excerptShow' => false,
            'catShow' => true,
            'metaShow' => true,
            'readMore' => false,
            'contentTag' => 'div',
            'openInTab' => false,
            'notFoundMessage' => 'No Post Found',

            /*============================
                Query Setting
            ============================*/
            'layout' => 'slide1',
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

            /*============================
                Arrow Style
            ============================*/
            'arrowStyle' => 'leftAngle2#rightAngle2',
            'arrowSize' => (object)['lg' =>'80', 'unit' =>'px'],
            'arrowWidth' => (object)['lg' =>'60', 'unit' =>'px'],
            'arrowHeight' => (object)['lg' =>'60', 'unit' =>'px'],
            'arrowPos' => 'left',
            'arrowVartical' => (object)['lg' =>'45', 'sm' =>'16', 'xs' =>'0','unit' =>'px'],
            'prevArrowPos' => (object)['lg' =>'', 'unit' =>'px'],
            'nextArrowPos' => (object)['lg' =>'60', 'unit' =>'px'],
            'arrowColor' => '#000',
            'arrowHoverColor' => '#000',
            'arrowBg' => '',
            'arrowHoverBg' => '',
            'arrowBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'arrowHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'arrowRadius' => (object)['lg' =>(object)['top' => '0','bottom' => '50', 'left' => '50','right' => '50', 'unit' =>'px']],
            'arrowHoverRadius' => (object)['lg' =>(object)['top' => '50','bottom' => '50', 'left' => '50','right' => '50', 'unit' =>'px']],
            'arrowShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'arrowHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],

            /*============================
                Heading Style
            ============================*/
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

            /*============================
                Content Wrap Style
            ============================*/
            'contentVerticalPosition' => 'bottomPosition',
            'contentHorizontalPosition' => 'centerPosition',
            'contentAlign' => "center",
            'contenWraptWidth' => (object)['lg'=>'100','unit' =>'%'],
            'contenWraptHeight' => (object)['lg'=>''],
            'slideBgBlur' => '',
            'contentWrapBg' => '#00000069',
            'contentWrapHoverBg' => '#00000069',
            'contentWrapBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'contentWrapHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'contentWrapRadius' => (object)['lg' =>(object)['top' => '6','bottom' => '6', 'left' => '6', 'right' => '6', 'unit' =>'px']],
            'contentWrapHoverRadius' => (object)['lg' =>(object)['top' => '','bottom' => '', 'left' => '', 'right' => '', 'unit' =>'px']],
            'contentWrapShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 0, 'right' => 5, 'bottom' => 15, 'left' => 0],'color' => 'rgba(0,0,0,0.15)'],
            'contentWrapHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 0, 'right' => 10, 'bottom' => 25, 'left' => 0],'color' => 'rgba(0,0,0,0.25)'],
            'contentWrapPadding' => (object)['lg' =>(object)['top' => '27','bottom' => '27', 'left'=>'','right'=>'', 'unit' =>'px']],
            'slideWrapMargin' => (object)['lg' =>(object)['top' => '50','bottom' => '50', 'left'=>'50','right'=>'50', 'unit' =>'px']],

            /*============================
                Image Style
            ============================*/
            'imageShow' => true,
            'imgCrop' => 'full',
            'imgOverlay' => false,
            'imgBgbrightness' => '',
            'imgBgBlur' => '',
            'imgOverlayType' => 'default',
            'overlayColor' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#0e1523'],
            'imgOpacity' => .7,
            'imgHeight' => (object)['lg'=>''],
            'imgWidth' => (object)['lg'=>'', 'unit'=>'%'],
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

            /*============================
                Dot Setting/Style
            ============================*/
            'dotWidth' => (object)['lg' =>'5', 'unit' =>'px'],
            'dotHeight' => (object)['lg' =>'5', 'unit' =>'px'],
            'dotHoverWidth' => (object)['lg' =>'8', 'unit' =>'px'],
            'dotHoverHeight' => (object)['lg' =>'8', 'unit' =>'px'],
            'dotSpace' => (object)['lg' =>'4', 'unit' =>'px'],
            'dotVartical' => (object)['lg' =>'-20', 'unit' =>'px'],
            'dotHorizontal' => (object)['lg'=>''],
            'dotBg' => '#9b9b9b',
            'dotHoverBg' => '#9b9b9b',
            'dotBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'dotHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'dotRadius' => (object)['lg' =>(object)['top' => '50','bottom' => '50','left' => '50','right' => '50', 'unit' =>'px']],
            'dotHoverRadius' => (object)['lg' =>(object)['top' => '50','bottom' => '50','left' => '50','right' => '50', 'unit' =>'px']],
            'dotShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'dotHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],

            /*============================
                Read more Setting/Style
            ============================*/
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

            /*============================
                Title Setting/Style
            ============================*/
            'titleTag' => 'h3',
            'titlePosition' => true,
            'titleColor' => '#fff',
            'titleHoverColor' => 'rgba(107,107,107,1)',
            'titleTypo' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'24', 'unit'=>'px'], 'height'=>(object)['lg'=>'36', 'unit'=>'px'], 'decoration'=>'none','family'=>'','weight'=>'300', 'transform' => 'uppercase'],
            'titlePadding' => (object)['lg'=>(object)['top'=> 0,'bottom'=> 0, 'unit'=>'px']],
            'titleLength' => 0,
            'titleBackground' => '',
            'titleAnimColor' => 'black',

            /*============================
                Meta Setting/Style
            ============================*/
            'metaPosition' => 'top',
            'metaStyle' => 'noIcon',
            'authorLink' => true,
            'metaSeparator' => 'dot',
            'metaList' => '["metaAuthor","metaDate"]',
            'metaMinText' => 'min read',
            'metaAuthorPrefix' => '',
            'metaDateFormat' => 'j M Y',
            'metaTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>12, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px'], 'weight' => '300','decoration' => 'none','family'=>''],
            'metaColor' => '#FFFFFFA8',
            'metaHoverColor' => '#a5a5a5',
            'metaSpacing' => (object)['lg' =>'10', 'unit' =>'px'],
            'metaMargin' => (object)['lg' =>(object)['top' => '5','bottom' => '', 'left'=>'','right'=>'', 'unit' =>'px']],
            'metaPadding' => (object)['lg' =>(object)['top' => '5','bottom' => '5', 'left'=>'','right'=>'', 'unit' =>'px']],
            'metaBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => '0', 'bottom' => '0', 'left' => '0'],'color' => '#009fd4','type' => 'solid'],
            'metaBg' => '',

            /*============================
                Category Setting/Style
            ============================*/
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
            'catTypo' => (object)['openTypography' => 1, 'size' => (object)['lg' =>12, 'unit' =>'px'], 'height' => (object)['lg' =>15, 'unit' =>'px'], 'spacing' => (object)['lg' => 7.32, 'unit' =>'px'], 'transform' => 'uppercase', 'weight' => '300', 'decoration' => 'none','family'=>'' ],
            'catColor' => '#fff',
            'catBgColor' => (object)['openColor' => 1,'type' => 'color', 'color' => ''],
            'catBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'catRadius' => (object)['lg' =>'2', 'unit' =>'px'],
            'catHoverColor' => '#a5a5a5',
            'catBgHoverColor' => (object)['openColor' => 1, 'type' => 'color', 'color' => ''],
            'catHoverBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'catSacing' => (object)['lg' =>(object)['top' => 0,'bottom' => 0,'left' => 0,'right' => 0, 'unit' =>'px']],
            'catPadding' => (object)['lg' =>(object)['top' => 8,'bottom' => 6,'left' => 16,'right' => 16, 'unit' =>'px']],

            /*============================
                Excerpt Style
            ============================*/
            'showSeoMeta' => false,
            'showFullExcerpt' => false,
            'excerptLimit' => 40,
            'excerptColor' => '#fff8',
            'excerptTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>14, 'unit' =>'px'],'height' => (object)['lg' =>26, 'unit' =>'px'], 'decoration' => 'none','family'=>''],
            'excerptPadding' => (object)['lg' =>(object)['top' => 10,'bottom' => '', 'unit' =>'px']],
            
            /*============================
                Wrapper Style
            ============================*/
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
        register_block_type( 'ultimate-post/post-slider-2',
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
        $is_active = ultimate_post()->is_lc_active(); 
        if($is_active){
            $block_name = 'post-slider-2';
        $page_post_id = ultimate_post()->get_ID();
        $wraper_before = $wraper_after = $post_loop = '';
        $attr['queryNumber'] = ultimate_post()->get_post_number(5, $attr['queryNumber'], $attr['queryNumPosts']);
        $recent_posts = new \WP_Query( ultimate_post()->get_query( $attr ) );
        $pageNum = ultimate_post()->get_page_number($attr, $recent_posts->found_posts);
        // Dummy Img Url
        $dummy_url = ULTP_URL.'assets/img/ultp-fallback-img.png';

        $slides = is_object($attr['slidesToShow']) ? json_decode(json_encode($attr['slidesToShow']),true) : $attr['slidesToShow'];

        $centerPadd = is_object($attr['slidesCenterPadding']) ? json_decode(json_encode($attr['slidesCenterPadding']),true) : $attr['slidesCenterPadding'];
        if ($recent_posts->have_posts() ) {
            $wraper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].''.(isset($attr["align"])? ' align' .$attr["align"]:'').''.(isset($attr["className"])?' '.$attr["className"]:'').'">';
                $wraper_before .= '<div class="ultp-block-wrapper">';
                    if ($attr['headingShow']) {
                        $wraper_before .= '<div class="ultp-heading-filter">';
                            $wraper_before .= '<div class="ultp-heading-filter-in">';
                                include ULTP_PATH.'blocks/template/heading.php';
                            $wraper_before .= '</div>';
                        $wraper_before .= '</div>';
                    }
                    $wraper_before .= '<div class="ultp-block-items-wrap ultp-slide-'.$attr['layout'].'" data-layout="'.$attr['layout'].'"  data-arrows="'.$attr['arrows'].'" data-dots="'.$attr['dots'].'" data-autoplay="'.$attr['autoPlay'].'" data-slidespeed="'.$attr['slideSpeed'].'" data-fade="'.$attr['fade'].'" data-slidelg="'.(isset($slides['lg'])?$slides['lg']:1).'" data-slidesm="'.(isset($slides['sm'])?$slides['sm']:1).'" data-slidexs="'.(isset($slides['xs']) ? $slides['xs']:1).'" 
                    data-paddlg="'.(isset($centerPadd["lg"]) ? $centerPadd["lg"] : 100 ).'" data-paddsm="'.(isset($centerPadd["sm"]) ? $centerPadd["sm"] : 100 ).'" data-paddxs="'.(isset($centerPadd["xs"]) ? $centerPadd['xs'] : 50).'">';
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
                                                        $post_loop .= ultimate_post()->get_image($block_img_id, $attr['imgCrop'], '', $title, $attr['imgSrcset'], $attr['imgLazy']);
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
            $wraper_after .= '</div>'; //.wp-block-ultimate-post-post-slider-2

            wp_reset_query();
        }else {
            $wraper_before .= ultimate_post()->get_no_result_found_html( $attr['notFoundMessage'] );
        }
        
        return $noAjax ? $post_loop : $wraper_before.$post_loop.$wraper_after;
        }
    }

}