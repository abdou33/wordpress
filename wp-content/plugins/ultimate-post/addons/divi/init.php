<?php
defined( 'ABSPATH' ) || exit;

add_filter('ultp_addons_config', 'ultp_divi_config');
function ultp_divi_config( $config ) {
	$configuration = array(
		'name' => __( 'Divi', 'ultimate-post' ),
		'desc' => __( 'Use Gutenberg blocks inside Divi via Saved Template addons.', 'ultimate-post' ),
		'img' => ULTP_URL.'/assets/img/addons/divi.svg',
		'is_pro' => false,
		// 'live' => '',
		'docs' => 'https://docs.wpxpo.com/docs/postx/add-on/divi/', 
		'position' => 20
	);
	$arr['ultp_divi'] = $configuration;
	return $arr + $config;
}


function ultp_divi_builder() {
	$settings = ultimate_post()->get_setting('ultp_divi');
	if ($settings == 'true') {
		if ( class_exists( 'ET_Builder_Module' ) ) {
			require_once ULTP_PATH.'/addons/divi/divi.php';
			
			$action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
			$post_id = isset($_GET['post']) ? sanitize_text_field($_GET['post']) : '';
			if ($action && $post_id) {
				if (get_post_type($post_id) == 'ultp_templates') {
					add_filter( 'et_builder_enable_classic_editor', '__return_false' );
				}
			}
		}
	}
}
add_action( 'init', 'ultp_divi_builder' );