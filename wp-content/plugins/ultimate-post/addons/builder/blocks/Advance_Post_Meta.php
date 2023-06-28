<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Advance_Post_Meta {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {

        return array(
            'blockId' => '',
            /*============================
                Advanced Post Meta Settings
            ============================*/
            //  META ITEM ENABLE 
            "authorShow" => true,
            "dateShow" => true,
            "cmtCountShow" => true,
            "viewCountShow" => false,
            "readTimeShow" => false,
            "catShow" => false,
            "tagShow" => false,
            'metaSpacing' => (object)['lg' =>'15', 'unit' =>'px'],
            'metaAlign' => 'left',
            'metaSeparator' => 'dot',
            'separatorColor' => '#000',
            'metaItemSort' => ["author", "date", "cmtCount", "viewCount", "readTime", "cat", "tag"],

            /*============================
                Post Author Style
            ============================*/
            'authColor' => '#6b6b6b',
            'authHovColor' => '#ddd',
            'authTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            // Avatar
            'authImgShow' => false,
            'authImgSize' => (object)['lg' =>'18', 'unit' =>'px'],
            'authImgRadius' => (object)['lg' =>'50', 'unit' =>'px'],
            'authImgSpace' => (object)['lg' =>'5', 'unit' =>'px'],
            // Author Label
            'authLabelShow' => true,
            'authLabel' => 'Author',
            'authLabelColor' => '#a4a4a4',
            'authLabelTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            'authLabelSpace' => (object)['lg' =>'5', 'unit' =>'px'],
            // Auth Icon
            'authIconShow' => false,
            'authIconStyle' => 'author1',
            'authIconColor' => '#a4a4a4',
            'authIconSize' => (object)['lg' =>'16', 'unit' =>'px'],
            'authIconSpace' => (object)['lg' =>'10', 'unit' =>'px'],
            "authAlign" => false,

            /*============================
                Post Publish Time Style
            ============================*/
            'dateFormat' => 'updated',
            'metaDateFormat' => 'M j, Y',
            'dateColor' => '#a4a4a4',
            'dateTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            // Prefix
            'enablePrefix' => true,
            'datePubText' => 'Publish Update',
            'dateText' => 'Latest Update',
            'datePrefixColor' => '#a4a4a4',
            // Icon
            'DateIconShow' => false,
            'dateIconStyle' => 'date1',
            'dateIconColor' => '#a4a4a4',
            'dateIconSize' => (object)['lg' =>'16', 'unit' =>'px'],
            'dateIconSpace' => (object)['lg' =>'10', 'unit' =>'px'],
            "dateAlign" => false,

            /*============================
                Comment Style
            ============================*/
            'commentColor' => '#a4a4a4',
            'commentHovColor' => '#ddd',
            'commentTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            // Prefix
            'cmtLabelShow' => true,
            'cmtLabel' => 'Comment',
            'cmtLabelColor' => '#a4a4a4',
            "commentLabelAlign" => "after",
            //  Icon
            'cmtIconShow' => false,
            'cmntIconStyle' => 'commentCount1',
            'cmntIconColor' => '#a4a4a4',
            'commentIconSize' => (object)['lg' =>'16', 'unit' =>'px'],
            'cmntIconSpace' => (object)['lg' =>'10', 'unit' =>'px'],
            "cmntAlign" => false,
            /*============================
                View Style
            ============================*/
            'viewColor' => '#a4a4a4',
            'viewHovColor' => '#ddd',
            'viewTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            // Prefix Style
            'viewLabelShow' => true,
            'viewLabel' => 'View',
            'viewLabelColor' => '#a4a4a4',
            "viewLabelAlign" => "after",
            //  Icon
            'viewIconShow' => false,
            'viewIconStyle' => 'viewCount1',
            'viewIconColor' => '#a4a4a4',
            'viewIconSize' => (object)['lg' =>'16', 'unit' =>'px'],
            'viewIconSpace' => (object)['lg' =>'10', 'unit' =>'px'],
            "viewAlign" => false,

            /*============================
                Reading Time Style
            ============================*/
            'readColor' => '#a4a4a4',
            'readHovColor' => '#ddd',
            'readTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            // Prefix
            'readTimePrefix' => true,
            'readTimeText' => 'Minute Read',
            "readPrefixAlign" => "after",
            //  Icon
            'readTimeIcon' => false,
            'readIconStyle' => 'readingTime2',
            'readIconColor' => '#a4a4a4',
            'readIconSize' => (object)['lg' =>'16', 'unit' =>'px'],
            'readIconSpace' => (object)['lg' =>'10', 'unit' =>'px'],
            "readAlign" => false,
            
            /*============================
                Categories Style
            ============================*/
            'catColor' => '#545454',
            'catHovColor' => '#ddd',
            'catTypo' => (object)['openTypography' => 1, 'decoration' => 'none', 'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            'catSpace' => (object)['lg' =>'7', 'unit' =>'px'],
            'catLabelShow' => true,
            'catLabel' => 'Category',
            'catLabelColor' => '#a4a4a4',
            'catLabelSpace' => (object)['lg' =>'15', 'unit' =>'px'],
            'catIconShow' => false,
            'catIconStyle' => 'cat2',
            'catIconSize' => (object)['lg' =>'16', 'unit' =>'px'],
            'catIconColor' => '#a4a4a4',
            'catIconSpace' => (object)['lg' =>'10', 'unit' =>'px'],
            "catAlign" => false,

            /*============================
                Tag Style
            ============================*/
            'tagColor' => '#545454',
            'tagHovColor' => '#ddd',
            'tagTypo' => (object)['openTypography' => 1, 'decoration' => 'none', 'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            'tagSpace' => (object)['lg' =>'7', 'unit' =>'px'],
            'tagLabelShow' => true,
            'tagLabel' => 'Tag - ',
            'tagLabelColor' => '#a4a4a4',
            'tagLabelSpace' => (object)['lg' =>'15', 'unit' =>'px'],
            'tagIconShow' => false,
            'tagIconStyle' => 'tag2',
            'tagIconColor' => '#a4a4a4',
            'tagIconSize' => (object)['lg' =>'16', 'unit' =>'px'],
            'tagIconSpace' => (object)['lg' =>'10', 'unit' =>'px'],
            "tagAlign" => false,

            /*============================
                Advance Setting
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
        register_block_type( 'ultimate-post/advance-post-meta',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style' => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }


    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());

        $block_name = 'post_meta';
        $wrapper_before = $wrapper_after = $wrapper_content = $authContent = $updateLabel = $dateLabel = "";

        $post_id = get_the_ID();
        $contentAlign = ($attr["catAlign"] || $attr["tagAlign"] || $attr["cmntAlign"] || $attr["viewAlign"] || $attr["readAlign"] || $attr["authAlign"] || $attr["dateAlign"]) ? 'ultp-contentMeta-align' : 'ultp-contentMeta';

        // Author Content
        if ($attr["authorShow"] ) {
            $author_id = get_post_field('post_author' , $post_id);
            $authContent .= '<span class="ultp-post-auth ultp-meta-separator">';
                $authContent .= '<span class="ultp-auth-heading">';
                    if ($attr["authIconShow"]) {
                        $authContent .= ultimate_post()->svg_icon(''.$attr["authIconStyle"].'');
                    } 
                    if ($attr["authImgShow"]) {
                        $authContent .= get_avatar( $author_id, 32 );
                    }
                    if ($attr["authLabelShow"] ) {
                        $authContent .= '<span class="ultp-auth-label">'.$attr["authLabel"].'</span>';
                    } 
                $authContent .= ' </span>';
                $authContent .= '<a  href="'.get_author_posts_url( $author_id ).'" class="ultp-auth-name">';
                    $authContent .= get_the_author_meta('display_name', $author_id);
                $authContent .= '</a>';
            $authContent .= '</span>';
        }  

        // Date Content
        if($attr["enablePrefix"]){
            $dateLabel .= '<span class="ultp-date-prefix">'.$attr["dateText"].'</span>';
        }
        if($attr["enablePrefix"]){
            $updateLabel .= '<span class="ultp-date-prefix">'.$attr["datePubText"].'</span>';
        }
        $dateContent = "";
        if ($attr["dateShow"] ) {
            $dateContent .= '<span class="ultp-date-meta ultp-meta-separator">';
                if ($attr["DateIconShow"] ) {
                    $dateContent .='<span class="ultp-date-icon">'.ultimate_post()->svg_icon(''.$attr["dateIconStyle"].'').'</span>';
                }
                if ($attr["dateFormat"] == "updated" ) {
                    $dateContent .='<span class="ultp-post-update">'.$dateLabel.'<span class="ultp-post-date__val">'.get_the_modified_date(ultimate_post()->get_format($attr["metaDateFormat"]), $post_id).'</span></span>';
                }
                if ($attr["dateFormat"] == "publish") {
                    $dateContent .= '<span class="ultp-post-date">'.$updateLabel.' <span class="ultp-post-date__val">'.get_the_date(ultimate_post()->get_format($attr["metaDateFormat"]), $post_id).'</span></span>';
                }
            $dateContent .= '</span>';
        }

        // Main Content
        $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
            $wrapper_before .= '<div class="ultp-block-wrapper">';
                $wrapper_content .= '<div class="ultp-advance-post-meta '.$contentAlign.' ultp-post-meta-'.$attr["metaSeparator"].'">'; 
                    $wrapper_content .= '<div>'; 
                        foreach($attr["metaItemSort"] as $val) {
                            if ($val == "author" && $attr["authorShow"] && $attr["authAlign"] == false) {
                                $wrapper_content .= $authContent;
                            }
                            if ($val == "date" && $attr["dateShow"] && $attr["dateAlign"] == false) {
                                $wrapper_content .= $dateContent;
                            }
                            if ($val == "cmtCount" && $attr["cmtCountShow"] && $attr["cmntAlign"] == false) {
                                $wrapper_content .= $this->renderPostCount("comment", get_post_field('comment_count' , ''), $attr["cmtLabelShow"], $attr["cmtLabel"], $attr["cmtIconShow"],ultimate_post()->svg_icon(''.$attr["cmntIconStyle"].''), $post_id);
                            }
                            if ($val == "viewCount" && $attr["viewCountShow"] && $attr["viewAlign"] == false) {
                                $wrapper_content .= $this->renderPostCount("view", get_post_meta( $post_id, '__post_views_count', true ), $attr["viewLabelShow"], $attr["viewLabel"], $attr["viewIconShow"], ultimate_post()->svg_icon(''.$attr["viewIconStyle"].''), $post_id);
                            }
                            if ($val == "readTime" && $attr["readTimeShow"] && $attr["readAlign"] == false) {
                                $wrapper_content .= $this->renderPostCount("readTime", 12, $attr["readTimePrefix"] , $attr["readTimeText"], $attr["readTimeIcon"], ultimate_post()->svg_icon(''.$attr["readIconStyle"].''), $post_id );
                            }
                            if ($val == "cat" && $attr["catShow"] && $attr["catAlign"] == false) {
                                $wrapper_content .= $this->renderPostCount("cat", get_the_category(), $attr["catLabelShow"], $attr["catLabel"], $attr["catIconShow"], ultimate_post()->svg_icon(''.$attr["catIconStyle"].''), $post_id);
                            }
                            if ($val == "tag" && $attr["tagShow"] && $attr["tagAlign"] == false) {
                                $wrapper_content .= $this->renderPostCount("tag",get_the_tags(), $attr["tagLabelShow"], $attr["tagLabel"], $attr["tagIconShow"], ultimate_post()->svg_icon(''.$attr["tagIconStyle"].''), $post_id);
                            }
                        }
                    $wrapper_content .= '</div>';
                    $wrapper_content .= '<div>'; 
                        foreach($attr["metaItemSort"] as $content) {
                            if ($content == "author" && $attr["authorShow"] && $attr["authAlign"]) {
                                $wrapper_content .= $authContent;
                            }
                            if ($content == "date" && $attr["dateShow"] && $attr["dateAlign"]) {
                                $wrapper_content .= $dateContent;
                            }
                            if ($content == "cmtCount" && $attr["cmtCountShow"] && $attr["cmntAlign"]) {
                                $wrapper_content .= $this->renderPostCount("comment", get_post_field('comment_count' , ''), $attr["cmtLabelShow"], $attr["cmtLabel"], $attr["cmtIconShow"], ultimate_post()->svg_icon(''.$attr["cmntIconStyle"].''), $post_id);
                            }
                            if ($content == "viewCount" && $attr["viewCountShow"] && $attr["viewAlign"]) {
                                $wrapper_content .= $this->renderPostCount("view", get_post_meta( get_the_ID(), '__post_views_count', true ), $attr["viewLabelShow"], $attr["viewLabel"], $attr["viewIconShow"], ultimate_post()->svg_icon(''.$attr["viewIconStyle"].''), $post_id);
                            }
                            if ($content == "readTime" && $attr["readTimeShow"] && $attr["readAlign"]) {
                                $wrapper_content .= $this->renderPostCount("readTime", 12, $attr["readTimePrefix"], $attr["readTimeText"], $attr["readTimeIcon"], ultimate_post()->svg_icon(''.$attr["readIconStyle"].''), $post_id);
                            }
                            if ($content == "cat" && $attr["catShow"] && $attr["catAlign"]) {
                                $wrapper_content .= $this->renderPostCount("cat", get_the_category(), $attr["catLabelShow"], $attr["catLabel"], $attr["catIconShow"], ultimate_post()->svg_icon(''.$attr["catIconStyle"].''), $post_id);
                            }
                            if ($content == "tag" && $attr["tagShow"] && $attr["tagAlign"]) {
                                $wrapper_content .= $this->renderPostCount("tag",get_the_tags(), $attr["tagLabelShow"], $attr["tagLabel"], $attr["tagIconShow"], ultimate_post()->svg_icon(''.$attr["tagIconStyle"].''), $post_id);
                            }
                        }
                    $wrapper_content .= '</div>'; 
                $wrapper_content .= '</div>'; 
            $wrapper_after .= '</div>';
        $wrapper_after .= '</div>';

        return $wrapper_before.$wrapper_content.$wrapper_after;
    }

    public function renderPostCount($title, $data, $labelEnable, $labelText, $iconEnable, $icon, $post_id = null) {
        $content = "";
        $content .= '<span class="ultp-'.$title.'-wrap ultp-meta-separator">';
            if (($title == "tag" || $title == "cat") && $iconEnable) {
                $content .='<span>'.$icon.'</span>';
            }
            if (($title == "tag" || $title == "cat") &&  ( $labelEnable) ) {
                $content .= '<span class="ultp-'.$title.'-label">'.$labelText.'</span>';
            }
            if ($title == "tag" || $title == "cat" ) {
                $content .= '<span class="ultp-post-'.$title.'">';
                if (is_array($data) && count($data) > 0) {
                    if (is_array($data)) {
                        foreach($data as $dt) {
                            $content .=  '<a href="'.get_category_link($dt->term_taxonomy_id).'">'.$dt->name.'</a>'; 
                        }
                    }
                } else { 
                    $content .= "<a>No Taxonomy Found.</a>";
                }
                $content .=  '</span>';
            } elseif (($title != "tag" && $title != "cat" && $title != "readTime" )) {
                $content .= '<span class="ultp-'.$title.'-count">';
                    if ($iconEnable ) { $content .= $icon; }
                    $content .= $data ? $data : 0; 
                $content .= '</span>';
            } 
            if(( $title != "tag" && $title != "cat" && $title != "readTime" )  && $labelEnable ) {
                $content .= '<span class="ultp-'.$title.'-label">'.$labelText.'</span>';
            } 
            if ($title == "readTime" ) {
                if ($iconEnable ) { $content .= $icon; }

                $content .= '<div>'.ceil(mb_strlen(strip_tags(get_the_content( null,  false, $post_id )))/1200).'</div>';
                $content .=  $labelEnable ? '<span class="ultp-read-label">'.$labelText.'</span>' : '' ;
                $content .= '</span>';
            }
        $content .= '</span>';
        return $content;
    }
}