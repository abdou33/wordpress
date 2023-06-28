<?php
defined( 'ABSPATH' ) || exit;

add_filter('ultp_addons_config', 'ultp_custom_font_config');
function ultp_custom_font_config( $config ) {
	$configuration = array(
		'name' => __( 'Custom Font', 'ultimate-post' ),
		'desc' => __( 'Upload custom fonts and use them to enhance the typographies of every PostX blocks.', 'ultimate-post' ),
		'img' => ULTP_URL.'assets/img/addons/custom_font.svg',
		'is_pro' => false,
		'live' => 'https://www.wpxpo.com/wordpress-custom-fonts/',
		'docs' => 'https://docs.wpxpo.com/docs/postx/add-on/custom-fonts/', 
		'position' => 7
	);
	$arr['ultp_custom_font'] = $configuration;
	return $arr + $config;
}

add_action('init', 'ultp_custom_font_init');
function ultp_custom_font_init() {
	$settings = ultimate_post()->get_setting('ultp_custom_font');
	if ($settings == 'true') {
		require_once ULTP_PATH.'/addons/custom_font/Custom_Font.php';
		new \ULTP\Custom_Font();
	}
}