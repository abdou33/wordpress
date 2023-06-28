<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Author_Box{
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function register() {
        register_block_type( 'ultimate-post/author-box',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );
    }
    public function get_attributes() {
        return array(
            'blockId' => '',
            'layout' => 'layout1',

            /*============================
                Author Box Settings
            ============================*/
            'imgShow' => true,
            'writtenByShow' => true,
            'authorBioShow' => true,
            'metaShow' => true,
            'allPostLinkShow' => true,
            'authorBoxAlign' => 'center',


            /*============================
                Container Style
            ============================*/
            'boxContentBg' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#f5f5f5'],
            'boxContentBorder' => (object)['openBorder'=>0 ],
            'boxContentRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'boxContentPad' => (object)['lg' =>'20', 'unit' =>'px'],
            
            /*============================
                Author Image Settings
            ============================*/
            'imgSize' => '100',
            'imgSpace' => (object)['lg' =>'20', 'unit' =>'px'],
            'imgUp' => (object)['lg' =>'60', 'unit' =>'px'],
            'imgBorder' => (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#000','type' => 'solid'],
            'imgRadius' => (object)['lg' =>'100', 'unit' =>'px'],
            

            /*============================
                Written by Settings
            ============================*/
            'writtenByText' => 'Written by',
            'writtenByColor' => '#656565',
            'writtenByTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => '20', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px']],

            /*============================
                Author Name Settings
            ============================*/
            'authorNameTag' => 'h4',
            'authorNameColor' => '#333',
            'authorNameHoverColor' => '',
            'authorNameTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => '20', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px']],


            /*============================
                Author Bio Settings
            ============================*/
            'authorBioColor' => '#777',
            'authorBioTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => '14', 'unit' => 'px'], 'height' => (object)['lg' => '22', 'unit' => 'px']],
            'authorBioMargin' => (object)['lg' =>(object)['top' => '20','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],

            /*============================
                Meta Setting/Style Settings
            ============================*/
            'metaPosition' => 'bottom',
            'metaColor' => '#656565',
            'metaTypo' => (object)['openTypography' => 0,'size' => (object)['lg' => '', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>''],
            'metaMargin' => (object)['lg' =>(object)['top'=> '12', 'unit' =>'px']],
            'metaPadding' => (object)['lg' =>(object)['unit' =>'px']],
            'metaBg' => '',
            'metaBorder' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => '0', 'bottom' => '0', 'left' => '0'],'color' => '#009fd4','type' => 'solid'],


            /*============================
                View all Post Button Settings
            ============================*/
            'viewAllPostText' => 'View All Posts',
            'viewAllPostTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => '14', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>''],
            'viewAllPostColor' => '',
            'viewAllPostBg' => '',
            'viewAllPostRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'viewAllPostHoverColor' => '',
            'viewAllPostBgHoverColor' => '',
            'viewAllPostHoverRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'viewAllPostPadding' => (object)['lg' =>(object)['unit' =>'px']],
            'viewAllPostMargin' => (object)['lg' =>(object)['top' => '15','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
            
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

    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());

        $block_name = 'author_box';
        $author_bio = $wrapper_before = $wrapper_after = $content = '';

        $page_post_id = get_the_ID(); // ultimate_post()->get_ID();
        
        if($page_post_id){
            $_post = get_post( $page_post_id );
            $post_author = get_userdata( $_post->post_author );

            // Author Image
            $author_image = '<div class="ultp-post-author-image-section">';
            $author_image .= get_avatar($post_author->ID, $attr['imgSize']);
            $author_image .= '</div>';
            
            // Author Meta
            $author_meta = '<div class="ultp-post-author-meta">';
            $author_meta .= '<span class="ultp-total-post">' . count_user_posts($_post->post_author, $post_type = 'post') . ' Posts</span>';
            $author_meta .= '<span class="ultp-total-comment">' . get_comments_number($page_post_id) . ' Comments</span>';
            $author_meta .= '</div>';

            // Author Description
            if ($post_author->description) {
                $author_bio .= '<div class="ultp-post-author-bio">';
                $author_bio .= '<span class="ultp-post-author-bio-meta">' . $post_author->description . '</span>';
                $author_bio .= '</div>';
            }

            // Author Url
            if (get_author_posts_url($_post->post_author)) {
                $all_post_link = '<div class="ultp-author-post-link">';
                $all_post_link .= '<a class="ultp-author-post-link-text" href="'.get_author_posts_url( $_post->post_author ).'">'.$attr['viewAllPostText'].'</a>';
                $all_post_link .= '</div>';
            }
            
            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper">';
                    $content .= '<div class="ultp-author-box ultp-author-box-'.$attr["layout"].'-content">';
                        $content .= ($attr['imgShow'] && $attr['layout'] !== 'layout4' ? $author_image : '');
                            $content .= '<div class="ultp-post-author-details">';
                                $content .= '<div class="ultp-post-author-title">';
                                    $content .= $attr["writtenByShow"] ? '<span class="ultp-post-author-written-by">'.$attr["writtenByText"].'</span>' : '';
                                    $content .= '<'.$attr['authorNameTag'].' class="ultp-post-author-name"><a href="'.get_author_posts_url( $_post->post_author ).'">'.$post_author->display_name.'</a></'.$attr['authorNameTag'].'>';
                                $content .= '</div>';
                                

                                $content .= ($attr["metaShow"] && $attr["metaPosition"] == 'top' ? $author_meta : '');
                                
                                
                                $content .= ($attr["authorBioShow"] && $author_bio  ? $author_bio : '');
                                $content .= ($attr["metaShow"] && $attr["metaPosition"] == 'bottom' ? $author_meta : '');
                                $content .= ($attr["allPostLinkShow"] ? $all_post_link : '');
                            $content .= '</div>';
                            $content .= ($attr['imgShow'] && $attr['layout'] === 'layout4' ? $author_image : '');
                        $content .= '</div>';
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        }

        return $wrapper_before.$content.$wrapper_after;
    }
}