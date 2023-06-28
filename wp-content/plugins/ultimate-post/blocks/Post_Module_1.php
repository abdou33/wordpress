<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Module_1{

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
            'layout' => 'layout1',

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
            'titleShow' => true,
            'titleStyle' => 'none',
            'titleAnimColor' => 'black',
            'headingShow' => true,
            'excerptShow' => true,
            'catShow' => true,
            'metaShow' => true,
            'showImage' => true,
            'filterShow' => false,
            'paginationShow' => false,
            'readMore' => false,
            'columnGridGap' => (object)['lg' =>'15', 'unit' =>'px'],
            'largeHeight' => (object)['lg' =>'245', 'unit' =>'px'],
            'contentTag' => 'div',
            'openInTab' => false,
            'notFoundMessage' => 'No Post Found',

            //--------------------------
            //      Heading Setting/Style
            //--------------------------
            'headingText' => 'Post Module #1',
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
            'headingPadding' => (object)['lg'=>'', 'unit'=>'px'],
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
            'titleHoverColor' => '#828282',
            'titleLgTypo' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'24', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)[ 'lg'=>'32', 'unit'=>'px'],'decoration'=>'none','transform' => '','family'=>'','weight'=>'500'],
            'titleTypo' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'14', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)['lg'=>'22', 'unit'=>'px'],'transform' => '', 'decoration'=>'none','family'=>'','weight'=>'500'],
            'titlePadding' => (object)['lg'=>(object)['top'=>0,'bottom'=>5, 'unit'=>'px']],
            'titleLgPadding' => (object)['lg'=>(object)['top'=>10,'bottom'=>8, 'unit'=>'px']],
            'titleLength' => 0,

            //--------------------------
            // Content Setting/Style
            //--------------------------
            
            'varticalAlign' => 'middle',
            'showSeoMeta' => false,
            'showSmallExcerpt' => false,
            'showFullExcerpt' => false,
            'excerptLimit' => 20,
            'excerptColor' => '#777',
            'excerptTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>14, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px'], 'decoration' => 'none','family'=>''],
            'excerptPadding' => (object)['lg' =>(object)['top' => 5,'bottom' => '', 'unit' =>'px']],

            //--------------------------
            // Count Style Setting/Style
            //--------------------------
            'counterTypo' => (object)['openTypography' => 1, 'size' => (object)['lg' =>14, 'unit' =>'px'], 'height' => (object)['lg' =>'', 'unit' =>'px'], 'spacing' => (object)['lg' =>0, 'unit' =>'px'], 'transform' => '', 'weight' => '400', 'decoration' => 'none','family'=>'' ],
            'counterColor' => '#828282',
            'counterBgColor' => (object)['openColor' => 1,'type' => 'color', 'color' => ''],
            'counterWidth' => '',
            'counterHeight' => '',
            'counterBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'counterRadius' => (object)['lg' =>'', 'unit' =>'px'],

            //--------------------------
            // Category Setting/Style
            //--------------------------
            'maxTaxonomy'=> '30',
            'taxonomy' => 'category',
            'showSmallCat' => false,
            'catStyle' => 'classic',
            'catPosition' => 'aboveTitle',
            'customCatColor' => false,
            'seperatorLink' => admin_url( 'edit-tags.php?taxonomy=category' ),
            'onlyCatColor' => false,
            'catLineWidth' => (object)['lg'=>'20'],
            'catLineSpacing' => (object)['lg'=>'30'],
            'catLineColor' => '#828282',
            'catLineHoverColor' => '#037fff',
            'catTypo' => (object)['openTypography' => 1, 'size' => (object)['lg' =>14, 'unit' =>'px'], 'height' => (object)['lg' =>20, 'unit' =>'px'], 'spacing' => (object)['lg' =>0, 'unit' =>'px'], 'transform' => '', 'weight' => '400', 'decoration' => 'none','family'=>'' ],
            'catColor' => '#037fff',
            'catBgColor' => (object)['openColor' => 1,'type' => 'color', 'color' => ''],
            'catBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'catRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'catHoverColor' => '#828282',
            'catBgHoverColor' => (object)['openColor' => 1, 'type' => 'color', 'color' => ''],
            'catHoverBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'catSacing' => (object)['lg' =>(object)['top' => 5,'bottom' => 5,'left' => 0,'right' => 0, 'unit' =>'px']],
            'catPadding' => (object)['lg' =>(object)['unit' =>'px']],

            //--------------------------
            // Meta Setting/Style
            //--------------------------
            'showSmallMeta' => true,
            'metaPosition' => 'top',
            'metaStyle' => 'icon',
            'authorLink' => true,
            'metaSeparator' => 'dot',
            'metaList' => '["metaAuthor","metaDate","metaRead"]',
            'metaMinText' => 'min read',
            'metaAuthorPrefix' => 'By',
            'metaDateFormat' => 'M j, Y',
            'metaListSmall' => '["metaAuthor","metaDate"]',
            'metaTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>12, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px'], 'decoration' => 'none','family'=>''],
            'metaColor' => '#989898',
            'metaHoverColor' => '#000',
            'metaSpacing' => (object)['lg' =>'10', 'unit' =>'px'],
            'metaMargin' => (object)['lg' =>(object)['top' => '','bottom' => '0', 'left'=>'','right'=>'', 'unit' =>'px']],
            'metaPadding' => (object)['lg' =>(object)['top' => '5','bottom' => '5', 'left'=>'','right'=>'', 'unit' =>'px']],
            'metaBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => '0', 'bottom' => '0', 'left' => '0'],'color' => '#009fd4','type' => 'solid'],
            'metaBg' => '',


            //--------------------------
            // Inner Content Setting/Style
            //--------------------------
            'contentAlign' => "left",
            'contentWrapBg' => '',
            'contentWrapHoverBg' => '',
            'contentWrapBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'contentWrapHoverBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'contentWrapRadius' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'contentWrapHoverRadius' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'contentWrapShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'contentWrapHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'contentWrapInnerPadding' => (object)['lg' =>(object)['top' => '','bottom' => '', 'left'=>'','right'=>'', 'unit' =>'px']],
            'contentWrapPadding' => (object)['lg' =>(object)['top' => '','bottom' => '', 'left'=>'','right'=>'', 'unit' =>'px']],

            //--------------------------
            // Image Setting/Style
            //--------------------------
            'columnFlip' => false,
            'imgCrop' => 'full',
            'imgCropSmall' => (ultimate_post()->get_setting('disable_image_size') == 'yes' ? 'full' : 'ultp_layout_square'),
            'imgWidth' => (object)['lg' =>'80', 'sm' =>'65', 'xs' =>'', 'ulg' =>'px', 'usm' =>'px'],
            'imgHeight' => (object)['lg' =>'', 'unit' =>'px'],
            'imageScale' => 'cover',
            'imgAnimation' => 'opacity',
            'imgGrayScale' => (object)['lg' =>'0', 'ulg' =>'%', 'unit' =>'%'],
            'imgHoverGrayScale' => (object)['lg' =>'0', 'unit' =>'%'],
            'imgRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'imgHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'imgShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'imgHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'imgSpacing' => (object)['lg'=>'20'],
            'imgOverlay' =>  false,
            'imgOverlayType' => 'default',
            'overlayColor' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#0e1523'],
            'imgOpacity' => .7,
            'fallbackEnable' => true,
            'fallbackImg' => '',
            'imgSrcset' => false,
            'imgLazy' => false,

            //--------------------------
            // Video Setting/Style
            //--------------------------
            'vidIconEnable' => true,
            'popupAutoPlay' => true,
            'vidIconPosition' => 'center',
            'popupIconColor' => '#fff',
            'popupHovColor' => '#d2d2d2',
            'iconSize' => (object)['lg'=>'40', 'sm'=> '30', 'xs'=> '30', 'unit' => 'px'],
            // by default should be off
            'enablePopup' => false,
            'popupWidth' => (object)['lg'=>'70'],
            'enablePopupTitle' => true,
            'popupTitleColor' => '#fff',
            'closeIconSep' => '#fff',
            'closeIconColor' => '#fff',
            'closeHovColor' => '#8f8f8f',
            'closeSize' => (object)['lg'=>'70', 'unit' => 'px'],

            //--------------------------
            // Separator
            //--------------------------
            'separatorShow' => false,
            'septColor' => '#e5e5e5',
            'septStyle' => 'dashed',
            'septSize' => (object)['lg'=>'1'],
            'septSpace' => (object)['lg'=>'15'],

            //--------------------------
            // Read more Setting/Style
            //--------------------------
            'showSmallBtn' => false,
            'readMoreText' => '',
            'readMoreIcon' => 'rightArrowLg',
            'readMoreTypo' => (object)['openTypography' => 1, 'size' => (object)['lg' =>12, 'unit' =>'px'], 'height' => (object)['lg' =>'', 'unit' =>'px'], 'spacing' => (object)['lg' =>1, 'unit' =>'px'], 'transform' => '', 'weight' => '400', 'decoration' => 'none','family'=>'' ],
            'readMoreIconSize' => (object)['lg' =>'', 'unit' =>'px'],
            'readMoreColor' => '#0d1523',
            'readMoreBgColor' => (object)['openColor' => 0,'type' => 'color', 'color' => ''],
            'readMoreBorder' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
            'readMoreRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'readMoreHoverColor' => '#0c32d8',
            'readMoreBgHoverColor' => (object)['openColor' => 0, 'type' => 'color', 'color' => ''],
            'readMoreHoverBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'readMoreHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'readMoreSacing' => (object)['lg' =>(object)['top' => 15,'bottom' => '','left' => '','right' => '', 'unit' =>'px']],
            'readMorePadding' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '','right' => '', 'unit' =>'px']],

            //--------------------------
            // Filter Setting/Style
            //--------------------------
            'filterBelowTitle' => false,
            'filterAlign' => (object)['lg' =>''],
            'filterType' => 'category',
            'filterText' => 'all',
            'filterValue' => '[]',
            'fliterTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>14, 'unit' =>'px'],'height' => (object)['lg' =>22, 'unit' =>'px'], 'decoration' => 'none','family'=>'','weight'=>500],
            'filterColor' => '#0e1523',
            'filterHoverColor' => '#828282',
            'filterBgColor' => '',
            'filterHoverBgColor' => '',
            'filterBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'filterHoverBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'filterRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'fliterSpacing' => (object)['lg' =>(object)['top' => '','bottom' => '', 'right' => '', 'left' => '20', 'unit' =>'px']],
            'fliterPadding' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
            'filterDropdownColor' => '#0e1523',
            'filterDropdownHoverColor' => '#037fff',
            'filterDropdownBg' => '#fff',
            'filterDropdownRadius' => (object)['lg'=>'0'],
            'filterDropdownPadding' => (object)['lg' =>(object)['top' => '15','bottom' => '15','left' => '20','right' => '20', 'unit' =>'px']],
            'filterMobile' => true,
            'filterMobileText' => 'More',

            //--------------------------
            // Pagination Setting/Style
            //--------------------------
            'paginationType' => 'navigation',
            'paginationNav' => 'textArrow',
            'navPosition' => 'topRight',
            'pagiAlign' => (object)['lg' =>'left'],
            'pagiTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>14, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px'], 'decoration' => 'none','family'=>''],
            'pagiArrowSize' => (object)['lg'=>'14'],
            'pagiColor' => '#fff',
            'pagiBgColor' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#0e1523'],
            'pagiBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'pagiShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'pagiRadius' => (object)['lg' =>(object)['top' => '2','bottom' => '2','left' => '2','right' => '2', 'unit' =>'px']],
            'pagiHoverColor' => '#fff',
            'pagiHoverbg' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#037fff','replace'=>1],
            'pagiHoverBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'pagiHoverShadow' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
            'pagiHoverRadius' => (object)['lg' =>(object)['top' => '2','bottom' => '2','left' => '2','right' => '2', 'unit' =>'px']],
            'pagiPadding' => (object)['lg' =>(object)['top' => '8','bottom' => '8','left' => '14','right' => '14', 'unit' =>'px']],
            'navMargin' => (object)['lg' =>(object)['top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0', 'unit' =>'px']],

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
        register_block_type( 'ultimate-post/post-module-1',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style' => 'ultp-blocks-editor-css',
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
        if($attr['queryUnique'] && isset($attr['savedQueryUnique'])) {
            $unique_ID = $attr['savedQueryUnique'];
        }

        $bigloop = '';
        $block_name = 'post-module-1';
        $page_post_id = ultimate_post()->get_ID();
        $wraper_before = $wraper_after = $post_loop = '';
        $attr['queryNumber'] = ultimate_post()->get_post_number(5, $attr['queryNumber'], $attr['queryNumPosts']);
        $recent_posts = new \WP_Query( ultimate_post()->get_query( $attr ) );
        $pageNum = ultimate_post()->get_page_number($attr, $recent_posts->found_posts);
        // Dummy Img Url
        $dummy_url = ULTP_URL.'assets/img/ultp-fallback-img.png';

        // Loadmore and Unique content 
        if($attr['queryUnique'] && isset($attr['loadMoreQueryUnique']) && $attr['paginationShow'] && ($attr['paginationType'] == 'loadMore')) {
            $unique_ID = $attr['loadMoreQueryUnique'];
            $current_unique_posts = $attr['ultp_current_unique_posts'];
        }

        if ($recent_posts->have_posts()) {
            
            $wraper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].''.(isset($attr["align"])? ' align' .$attr["align"]:'').''.(isset($attr["className"])?' '.$attr["className"]:'').'">';
                $wraper_before .= '<div class="ultp-block-wrapper">';

                    // Loading
                    $wraper_before .= ultimate_post()->loading();

                    if ($attr['headingShow'] || $attr['filterShow'] || $attr['paginationShow']) {
                        $wraper_before .= '<div class="ultp-heading-filter">';
                            $wraper_before .= '<div class="ultp-heading-filter-in">';
                                
                                // Heading
                                include ULTP_PATH.'blocks/template/heading.php';
                                
                                if ($attr['filterShow'] || $attr['paginationShow']) {
                                    $wraper_before .= '<div class="ultp-filter-navigation">';
                                        // Filter
                                        if($attr['filterShow'] && $attr['queryType'] != 'posts' && $attr['queryType'] != 'customPosts') {
                                            include ULTP_PATH.'blocks/template/filter.php';
                                        }
                                        // Navigation
                                        if ($attr['paginationShow'] && ($attr['paginationType'] == 'navigation') && ($attr['navPosition'] == 'topRight')) {
                                            include ULTP_PATH.'blocks/template/navigation-before.php';
                                        }
                                    $wraper_before .= '</div>';
                                }

                            $wraper_before .= '</div>';
                        $wraper_before .= '</div>';
                    }
             
                    $wraper_before .= '<div class="ultp-block-items-wrap ultp-block-post-module1 ultp-block-content-'.$attr['varticalAlign'].' ultp-block-content-'.($attr['columnFlip'] ? 'true' : 'false').' ultp-'.$attr['layout'].'">';
                        $idx = 0; // $idx = $noAjax ? 1 : 0;
                        while ( $recent_posts->have_posts() ): $recent_posts->the_post();
                            
                            include ULTP_PATH.'blocks/template/data.php';

                            include ULTP_PATH.'blocks/template/category.php';

                            if ($attr['queryUnique']) {
                                $unique_ID[$attr['queryUnique']][] = $post_id;
                                $current_unique_posts[] = $post_id;
                            }

                            $post_loop .= '<'.$attr['contentTag'].' class="ultp-block-item post-id-'.$post_id.'">';

                                $post_loop .= '<div class="ultp-block-content-wrap">';
                                    if(($post_thumb_id || $attr['fallbackEnable']) && $attr['showImage'] && ($idx == 0 || $attr['layout'] == 'layout2' || $attr['layout'] == 'layout3' || $attr['layout'] == 'layout5')) {
                                        $post_loop .= '<div class="ultp-block-image ultp-block-image-'.$attr['imgAnimation'].($attr["imgOverlay"] ? ' ultp-block-image-overlay ultp-block-image-'.$attr["imgOverlayType"].' ultp-block-image-'.$attr["imgOverlayType"].$idx : '' ).'">';
                                            if ($idx == 0) {
                                                $post_loop .= '<a href="'.$titlelink.'" '.($attr['openInTab'] ? 'target="_blank"' : '').'>';
                                                // Post Image Id
                                                $block_img_id = $post_thumb_id ? $post_thumb_id : ($attr['fallbackEnable'] && isset($attr['fallbackImg']['id']) ? $attr['fallbackImg']['id'] : '');
                                                // Post Image 
                                                if($post_thumb_id || ($attr['fallbackEnable'] && $block_img_id)) {
                                                    $post_loop .= ultimate_post()->get_image($block_img_id, $attr['imgCrop'], '', $title, $attr['imgSrcset'], $attr['imgLazy']);
                                                } else {
                                                    $post_loop .= '<img  src="'.$dummy_url.'" alt="dummy-img" />';
                                                }
                                                $post_loop .= '</a>';
                                                if($post_video){
                                                    $post_loop .= '<div enableAutoPlay="'.$attr['popupAutoPlay'].'" class="ultp-video-icon">'.ultimate_post()->svg_icon('play_line').'</div>';
                                                }
                                            } else {
                                                if ($attr['layout'] == 'layout2' || $attr['layout'] == 'layout3' || $attr['layout'] == 'layout5') {
                                                    $post_loop .= '<a href="'.$titlelink.'" '.($attr['openInTab'] ? 'target="_blank"' : '').'>';
                                                    // Post Image Id
                                                    $block_img_id = $post_thumb_id ? $post_thumb_id : ($attr['fallbackEnable'] && isset($attr['fallbackImg']['id']) ? $attr['fallbackImg']['id'] : '');
                                                    // Post Image 
                                                    if($post_thumb_id || ($attr['fallbackEnable'] && $block_img_id)) {
                                                        $post_loop .= ultimate_post()->get_image($block_img_id, $attr['imgCropSmall'], '', $title, $attr['imgSrcset'], $attr['imgLazy']);
                                                    } else {
                                                        $post_loop .= '<img  src="'.$dummy_url.'" alt="dummy-img" />';
                                                    }
                                                    $post_loop .= '</a>';
                                                    if($post_video){
                                                        $post_loop .= '<div enableAutoPlay="'.$attr['popupAutoPlay'].'" class="ultp-video-icon">'.ultimate_post()->svg_icon('play_line').'</div>';
                                                    }
                                                }
                                            }
                                            if (($attr['catPosition'] != 'aboveTitle') && ($idx == 0 || $attr['showSmallCat']) && $attr['catShow'] ) {
                                                $post_loop .= '<div class="ultp-category-img-grid">'.$category.'</div>';
                                            }
                                        $post_loop .= '</div>';
                                    }
                                    $post_loop .= '<div class="ultp-block-content">';
                                        // Category
                                        if (($attr['catPosition'] == 'aboveTitle') && ($idx == 0 || $attr['showSmallCat'] ) && $attr['catShow']) {
                                            $post_loop .= $category;
                                        }
                                        // Title
                                        if ($title && $attr['titleShow'] && $attr['titlePosition'] == 1) {
                                            include ULTP_PATH.'blocks/template/title.php';
                                        }                                        
                                        // Meta
                                        if ($attr['metaPosition'] =='top' ) {
                                            include ULTP_PATH.'blocks/template/meta.php';
                                        }                                        
                                        // Title
                                        if ($title && $attr['titleShow'] && $attr['titlePosition'] == 0) {
                                            include ULTP_PATH.'blocks/template/title.php';
                                        }
                                        // Excerpt
                                        if (($idx == 0 || $attr['showSmallExcerpt']) && $attr['excerptShow']) {
                                            $post_loop .= '<div class="ultp-block-excerpt">'.ultimate_post()->get_excerpt($post_id, $attr['showSeoMeta'], $attr['showFullExcerpt'], $attr['excerptLimit']).'</div>';
                                        }
                                        
                                        // Read More
                                        if ($attr['readMore'] && ($idx == 0 || $attr['showSmallBtn'])) {
                                            $post_loop .= '<div class="ultp-block-readmore"><a aria-label="'.$title.'" href="'.$titlelink.'" '.($attr['openInTab'] ? 'target="_blank"' : '').'>'.($attr['readMoreText'] ? $attr['readMoreText'] : esc_html__( "Read More", "ultimate-post" )).ultimate_post()->svg_icon($attr['readMoreIcon']).'</a></div>';
                                        }
                                        // Bottom
                                        if ($attr['metaPosition'] =='bottom' ) {
                                            include ULTP_PATH.'blocks/template/meta.php';
                                        }
                                    $post_loop .= '</div>';
                                $post_loop .= '</div>';
                                if($post_video && $attr['enablePopup'] && ($attr['layout'] != 'layout1' && $attr['layout'] != 'layout4' || $idx == 0)) {
                                    include ULTP_PATH.'blocks/template/video_popup.php';
                                }
                            $post_loop .= '</'.$attr['contentTag'].'>';
                            
                            if ($idx == 0) {
                                $bigloop = $post_loop;
                                $post_loop = '';
                            }

                            $idx ++;
                        endwhile;
                        if($attr['queryUnique']) {
                            $post_loop .= "<span style='display: none;' class='ultp-current-unique-posts' data-ultp-unique-ids= ".json_encode($unique_ID)." data-current-unique-posts= ".json_encode($current_unique_posts)."> </span>";
                        }
                        $bigloop = '<div class="ultp-big-post-module1">'.$bigloop.'</div>';
                        $post_loop = $bigloop.'<div class="ultp-small-post-module1">'.$post_loop.'</div>';

                    $wraper_after .= '</div>';//ultp-block-items-wrap
                    
                    // Navigation
                    if ($attr['paginationShow'] && ($attr['paginationType'] == 'navigation') && ($attr['navPosition'] != 'topRight')) {
                        include ULTP_PATH.'blocks/template/navigation-after.php';
                    }

                $wraper_after .= '</div>';
            $wraper_after .= '</div>';

            wp_reset_query();
        }else {
            $wraper_before .= ultimate_post()->get_no_result_found_html( $attr['notFoundMessage'] );
        }

        return $noAjax ? $post_loop : $wraper_before.$post_loop.$wraper_after;
    }

}