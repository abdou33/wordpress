<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Comments{
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes() {

        return array(
            'blockId' => '',
            'layout' => 'layout1',
            /*============================
                Post Comment Settings
            ============================*/
            //  Comments Form Heading
            'replyHeading' => true,
            'leaveRepText' => 'Leave a Reply',
            'HeadingColor' => '#333',
            'HeadingTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>24, 'unit' =>'px'],'height' => (object)['lg' => 26, 'unit' =>'px']],
            'subHeadingColor' => '#888',
            'headingSpace' => (object)['lg' =>'5', 'unit' =>'px'],
            
            /*============================
                Comments Form Input
            ============================*/
            "inputPlaceHolder" => "Express your thoughts, idea or write a feedback by clicking here & start an awesome comment",
            'inputPlaceValueColor' => '#555',
            'inputValueColor' => '#555',
            'inputValueBg' => '#eeee',
            'inputValueTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            'inputValuePad' => (object)['lg' =>'15', 'unit' =>'px'],
            'inputBorder' => (object)['openBorder'=>1, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#e2e2e2','type' => 'solid'],
            'inputHovBorder' => (object)['openBorder'=>1, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#777','type' => 'solid'],
            'inputRadius' => (object)['lg' =>'0', 'unit' =>'px'],
            'inputHovRadius' => (object)['lg' =>'', 'unit' =>'px'],
            'inputSpacing' => (object)['lg' =>'10', 'unit' =>'px'],

            /*============================
                Comments Form label style
            ============================*/
            'inputLabel' => true,
            "cmntInputText" => "Comment's",
            "nameInputText" => "Name",
            "emailInputText" => "Email",
            "webInputText" => "Website Url",
            'inputLabelColor' => '#5a5a5a',
            'inputLabelTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>16, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            'cookiesEnable' => true,
            'cookiesText' => "Save my name, email, and website in this browser for the next time I comment.",
            'cookiesColor' => "#777",

            /*============================
                Submit Button Style
            ============================*/
            'subBtnText' => 'Post Comment',
            'subBtnTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            'submitButton' => 'normal',
            'subBtnColor' => '#fff',
            'subBtnBg' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#333'],
            'subBtnBorder' => (object)['openBorder'=> 1, 'width' =>(object)['top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0],'color' => '#333','type' => 'solid'],
            'subBtnRadius' => (object)['lg' =>'0', 'unit' =>'px'],
            'subBtnHovColor' => '',
            'subBtnHovBg' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#151515'],
            'subBtnHovBorder' => (object)['openBorder'=> 1, 'width' =>(object)['top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0],'color' => '#151515','type' => 'solid'],
            'subBtnHovRadius' => (object)['lg' =>'0', 'unit' =>'px'],
            'subBtnPad' => (object)['lg' =>'10', 'unit' =>'px'],
            'subBtnSpace' => (object)['lg' =>'20', 'unit' =>'px'],
            'subBtnAlign' => 'left',

            /*============================
                Comment Reply Style
            ============================*/
            // Title and total Comment Count
            'authColor' => '#333',
            'authHovColor' => '#000',
            'authorTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>18, 'unit' =>'px'],'height' => (object)['lg' =>25, 'unit' =>'px']],
            'commentSpace' => (object)['lg' =>(object)['top' => '15','bottom' => '0','left' => '30', 'right' => '0', 'unit' =>'px']],
            'replyText' => 'Comments Text',
            'commentCount' => true,
            'commentCountColor' => '#055553',
            'commentCountTypo' => (object)['openTypography' => 1,'size' => (object)['lg' => 30, 'unit' =>'px'],'height' => (object)['lg' =>28, 'unit' =>'px'],'weight'=>'600'],
            'commentCountSpace' => (object)['lg' =>'30', 'unit' =>'px'],
            'authMetaSpace' => (object)['lg' =>'7', 'unit' =>'px'],
            
            /*============================
                Comment Reply Button
            ============================*/
            'replyButton' => 'normal',
            'replyBtnTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            'replyBtnColor' => '#333',
            'replyBtnBg' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
            'replyBtnHovColor' => '#333',
            'replyBtnBgHov' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
            'replyBtnBorder' => (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
            'replyBtnRadius' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
            'replyBtnPad' => (object)['lg' =>(object)['top' => '5','bottom' => '5','left' => '5', 'right' => '5', 'unit' =>'px']],
            'replyBtnSpace' => (object)['lg' =>'7', 'unit' =>'px'],

            /*============================
                Comment Author Meta
            ============================*/
            'authMeta' => true,
            'authMetaColor' => '#9f9f9f',
            'authMetaHovColor' => '#000',
            'authMetaTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>12, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],

            /*============================
                Comment Author Image Style
            ============================*/
            'authImg' => true,
            'authImgRadius' => (object)['lg' =>'50', 'unit' =>'px'],

            /*============================
                Comment Reply Message Text Style
            ============================*/
            'replyColor' => '#6c6c6c',
            'replyHovColor' => '#000',
            'replyTypo' => (object)['openTypography' => 1,'size' => (object)['lg' =>15, 'unit' =>'px'],'height' => (object)['lg' =>20, 'unit' =>'px']],
            
            /*============================
                reply separator Style
            ============================*/
            'replySeparator' => true,
            'replySepColor' => '#c1c1c1',
            'replySepSpace'=> (object)['lg' =>'15', 'unit' =>'px'],
            
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
        register_block_type( 'ultimate-post/post-comments',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'=> 'ultp-blocks-editor-css',
                'render_callback' => array($this, 'content')
            )
        );    
    }    
    
    public function content($attr, $noAjax) {
        $attr = wp_parse_args($attr, $this->get_attributes());
        $block_name = 'post-comments';
        $wrapper_before = $wrapper_after = $wrapper_content = '';

        if(is_single()){
            $commenter = wp_get_current_commenter();
            $req = get_option( 'require_name_email' );
            $aria_req = ( $req ? " aria-required='true'" : '' );

            $auth_label = $attr['inputLabel'] ? '<label for="author">' . __( ''.$attr["nameInputText"].'' ) . '' .( $req ? '<span class="required">*</span>' : '' )  . '</label>' : '';
            $email_label = $attr['inputLabel'] ? '<label for="email">' . __( ''.$attr["emailInputText"].'' ) . '' . ( $req ? '<span class="required">*</span>' : '' ).'</label>'  : '';
            $url_label = $attr['inputLabel'] ? '<label for="url">' . __( ''.$attr["webInputText"].'', 'domainreference' ) . '</label>' : '';
            $comment_label = $attr['inputLabel'] ? '<label for="comment">' . __( ''.$attr["cmntInputText"].'' ) . '</label>' : '';
            $cookies_label = $attr['cookiesEnable'] ? '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"/><label for="wp-comment-cookies-consent">'.$attr["cookiesText"].'</label></p>' : '';

            $comments_args = array(
                'comment_field' => '<div class="comment-form-comment ultp-comment-input ultp-field-control">' .$comment_label.'<textarea class="hi" id="comment" name="comment" placeholder="'.$attr["inputPlaceHolder"].'" cols="45" rows="8" aria-required="true"></textarea></div>',
                'fields' => apply_filters( 'comment_form_default_fields', array(
                        'author' =>'<div class="ultp-field-control ultp-comment-name">'.$auth_label.'<input id="author" placeholder="Your Name (No Keywords)" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
                        'email'=> '<div class="ultp-field-control ultp-comment-email">'.$email_label.'<input id="email" placeholder="your-real-email@example.com" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ).'" size="30"' . $aria_req . ' /></div>',
                        'url' => '<div class="ultp-field-control ultp-comment-website">'.$url_label.'<input id="url" name="url" placeholder="http://your-site-name.com" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
                        'cookies'=> $cookies_label
                    )
                ),
                'class_submit'        => 'ultp-comment-btn',
                'comment_notes_after' => '',
                'submit_button'       => '<input name="%1$s" type="submit" id="%2$s" className="%3$s ultp-comment-btn" value="'.$attr['subBtnText'].'" />',
                'class_form'          => 'ultp-comment-form',
                'title_reply'         => ($attr['replyHeading'] ? '<div class="crunchify-text ultp-comments-title">'.$attr['leaveRepText'].'</div>' : ''),
                'class_container'     => 'ultp-comment-form-container'
            );

            $arg = array(
                'walker'            => null,
                'max_depth'         => '',
                'style'             => 'ul',
                'callback'          => null,
                'end-callback'      => null,
                'type'              => 'comment',
                'page'              => '',
                'per_page'          => '',
                'avatar_size'       => 32,
                'reverse_top_level' => true,
                'reverse_children'  => '',
                'format'            => current_theme_supports( 'html5', 'comment-list' ) ? 'html5' : 'xhtml',
                'short_ping'        => false,
                'echo'              => true,
            );

            $comments = get_comments(array( 'post_id' => get_the_ID() ));

            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper  ultp-block-comments ultp-comments-'.$attr['layout'].'">';
                    if ($attr["commentCount"] && count($comments) > 0) {
                        $wrapper_content .= '<div class="ultp-comment-reply-heading">';    
                            $wrapper_content .= count($comments).' '.$attr['replyText'];
                        $wrapper_content .= '</div>';
                    }
                    $wrapper_content.= '<div class="ultp-builder-comment-reply">';
                        ob_start();
                        wp_list_comments($arg, $comments);
                        $wrapper_content .=  ob_get_clean();                
                    $wrapper_content .= '</div>';
                    $wrapper_content .= '<div class="ultp-builder-comments">';
                        ob_start();
                        comment_form( $comments_args );
                        $wrapper_content .= ob_get_clean();
                    $wrapper_content .= '</div>';
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        }

        return $wrapper_before.$wrapper_content.$wrapper_after;
    }
}