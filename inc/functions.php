<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function helppress_get_categories( $args = array() ) {

	$args = wp_parse_args( $args, array(
		'taxonomy' => 'helppress_article_category',
		'orderby'  => 'menu_order',
	) );

	$args = apply_filters( 'helppress_get_categories_args', $args );

	$terms = get_terms( $args );

	return apply_filters( 'helppress_get_categories', $terms );

}

function helppress_get_articles( $args = array() ) {

	$args = wp_parse_args( $args, array(
		'post_type' => 'helppress_article',
		'orderby'   => 'menu_order',
	) );

	$args = apply_filters( 'helppress_get_articles_args', $args );

	$articles = new WP_Query( $args );

	return apply_filters( 'helppress_get_articles', $articles );

}
