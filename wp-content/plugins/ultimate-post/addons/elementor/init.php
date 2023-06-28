<?php
defined( 'ABSPATH' ) || exit;

add_filter('ultp_addons_config', 'ultp_elementor_config');
function ultp_elementor_config( $config ) {
	$configuration = array(
		'name' => __( 'Elementor Elements', 'ultimate-post' ),
		'desc' => __( 'Use Gutenberg blocks inside Elementor via Saved Template addons.', 'ultimate-post' ),
		'img' => ULTP_URL.'/assets/img/addons/elementor-icon.svg',
		'is_pro' => false,
		'live' => 'https://www.wpxpo.com/postx/addons/elementor/',
		'docs' => 'https://docs.wpxpo.com/docs/postx/add-on/elementor-addon/', 
		'position' => 20
	);
	$arr['ultp_elementor'] = $configuration;
	return $arr + $config;
}

add_action('plugins_loaded', 'ultp_elementor_init');
function ultp_elementor_init() {
	$settings = ultimate_post()->get_setting('ultp_elementor');
	if ($settings == 'true') {
		if (did_action( 'elementor/loaded' )) {
			require_once ULTP_PATH.'/addons/elementor/Elementor.php';
			Elementor_ULTP_Extension::instance();
		}
	}
}