<?php
defined( 'ABSPATH' ) || exit;

add_filter('ultp_addons_config', 'ultp_beaver_builder_config');
function ultp_beaver_builder_config( $config ) {
	$configuration = array(
		'name' => __( 'Beaver Builder', 'ultimate-post' ),
		'desc' => __( 'Use Gutenberg blocks inside Beaver Builder via Saved Template addons.', 'ultimate-post' ),
		'img' => ULTP_URL.'/assets/img/addons/beaver.svg',
		'is_pro' => false,
		'docs' => 'https://docs.wpxpo.com/docs/postx/add-on/beaver-builder-addon', 
		'position' => 20
	);
	$arr['ultp_beaver_builder'] = $configuration;
	return $arr + $config;
}


function ultp_postx_beaver_builder() {
	$settings = ultimate_post()->get_setting('ultp_beaver_builder');
	if ($settings == 'true') {
		if ( class_exists( 'FLBuilder' ) ) {
			require_once ULTP_PATH.'/addons/beaver_builder/beaverbuilder.php';
		}
	}
}
add_action( 'init', 'ultp_postx_beaver_builder' );