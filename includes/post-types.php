<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function helppress_register_articles() {

	$labels = array(
		'name'          => esc_html__( 'Articles',     'helppress' ),
		'singular_name' => esc_html__( 'Article',      'helppress' ),
		'menu_name'     => esc_html__( 'HelpPress',    'helppress' ),
		'all_items'     => esc_html__( 'All Articles', 'helppress' ),
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'menu_position' => 25,
		'menu_icon'     => 'data:image/svg+xml;base64,' . base64_encode( file_get_contents( HELPPRESS_PATH . '/assets/img/menu-icon.svg' ) ),
		'supports'      => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'comments',
			'revisions',
			'post-formats',
		),
		'has_archive'   => true,
		'rewrite'       => array(
			'slug'       => helppress_get_option( 'knowledge_base_slug' ),
			'with_front' => false,
		),
	);

	$args = apply_filters( 'helppress_register_articles_args', $args );

	register_post_type( 'hp_article', $args );

}
add_action( 'after_setup_theme', 'helppress_register_articles' );
