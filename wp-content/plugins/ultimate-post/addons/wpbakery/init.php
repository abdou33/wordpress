<?php
defined( 'ABSPATH' ) || exit;

add_filter('ultp_addons_config', 'ultp_wpbakery_config');
function ultp_wpbakery_config( $config ) {
	$configuration = array(
		'name' => __( 'WPBakery', 'ultimate-post' ),
		'desc' => __( 'Use Gutenberg blocks inside WPBakery via Saved Template addons.', 'ultimate-post' ),
		'img' => ULTP_URL.'/assets/img/addons/wpbakery.svg',
		'is_pro' => false,
		'live' => 'https://www.wpxpo.com/postx/addons/elementor/',
		'docs' => 'https://docs.wpxpo.com/docs/postx/add-on/elementor-addon/', 
		'position' => 20
	);
	$arr['ultp_wpbakery'] = $configuration;
	return $arr + $config;
}


function ultp_wpbakery_builder() {
	$settings = ultimate_post()->get_setting('ultp_wpbakery');
	if ($settings == 'true') {
		if (defined( 'WPB_VC_VERSION' )) {
			require_once ULTP_PATH.'/addons/wpbakery/wpbakery.php';
		}
	}
}

add_action( 'init', 'ultp_wpbakery_builder' );