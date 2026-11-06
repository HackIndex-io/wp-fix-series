<?php
/**
 * File for handling shortcodes.
 *
 * @package   Series
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2009 - 2018, Justin Tadlock
 * @link      https://themehybrid.com/plugins/series
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * Modified by HackIndex on 2026-11-06: security fixes. Fork of https://github.com/justintadlock/series
 */

namespace Series;

# Register shortcodes.
add_action( 'init', __NAMESPACE__ . '\register_shortcodes' );

/**
 * Registers the plugin shortcodes.
 *
 * @since  2.0.0
 * @access public
 * @return void
 */
function register_shortcodes() {

	add_shortcode( 'series_list_posts',   __NAMESPACE__ . '\list_posts_shortcode'   );
	add_shortcode( 'series_list_related', __NAMESPACE__ . '\list_related_shortcode' );

	// @deprecated 2.0.0
	add_shortcode( 'the-series', __NAMESPACE__ . '\the_series_shortcode' );
}

/**
 * List posts by series shortcode.
 *
 * @since  2.0.0
 * @access public
 * @param  array  $attr
 * @return string
 */
function list_posts_shortcode( $attr = array() ) {

	$defaults = array(
		'series'         => '',
		'order'          => 'ASC',
		'orderby'        => 'date',
		'posts_per_page' => -1,
	);

	$attr = shortcode_atts( $defaults , $attr, 'series_list_posts' );

	$attr['echo'] = false;

	return list_posts( $attr );
}

/**
 * List posts in the same series as the current post.
 *
 * @since  2.0.0
 * @access public
 * @param  array  $attr
 * @return string
 */
function list_related_shortcode( $attr = array() ) {

	$defaults = array(
		'order'          => 'ASC',
		'orderby'        => 'date',
		'posts_per_page' => -1,
	);

	$attr = shortcode_atts( $defaults , $attr, 'series_list_related' );

	$attr['echo'] = false;

	return list_related_posts( get_the_ID(), $attr );
}

/**
 * Gets the series terms of the current post and displays them.
 *
 * @since  2.0.0
 * @access public
 * @attr   $attr
 * @return string
 */
function the_series_shortcode( $attr ) {

	$attr = shortcode_atts(
		array(
			'before'    => '',
			'after'     => '',
			'separator' => ','
		),
		$attr,
		'the-series'
	);

	// The shortcode parser runs stripcslashes() on attributes, so \x3c can still produce HTML after kses
	return get_the_term_list( get_the_ID(), 'series', wp_kses_post( $attr['before'] ), wp_kses_post( $attr['separator'] ), wp_kses_post( $attr['after'] ) );
}
