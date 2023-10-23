<?php
/**
 *  Headless theme functions.
 *
 *  @package headless_theme_functions
 *  Author: Nate Arnold<hello@natearnold.me>
 *  Description: Custom functions, support, custom post types and more.
 */

add_theme_support( 'post-thumbnails' );

/**
 *  Removes menus.
 */
function remove_menus() {
	remove_menu_page( 'index.php' ); // Dashboard.
	remove_menu_page( 'jetpack' ); // Jetpack*.
	remove_menu_page( 'edit-comments.php' ); // Comments.
}

add_action( 'admin_menu', 'remove_menus' );

require_once 'functions/custom-post-types.php';
require_once 'functions/custom-shortcodes.php';
require_once 'functions/custom-taxonomies.php';

/**
 *  Puts the custom menu in a specific order.
 *
 *  @param boolean $menu_ord Only order the menu if this is true.
 */
function headless_custom_menu_order( $menu_ord ) {
	if ( ! $menu_ord ) {
		return true;
	}

	return array(
		'edit.php?post_type=page', // Pages.
		'edit.php', // Posts.
		'edit.php?post_type=custom_posts', // Custom Post Type.
		'separator1', // First separator.

		'upload.php', // Media.
		'themes.php', // Appearance.
		'plugins.php', // Plugins.
		'users.php', // Users.
		'separator2', // Second separator.

		'tools.php', // Tools.
		'options-general.php', // Settings.
		'separator-last', // Last separator.
	);
}
add_filter( 'custom_menu_order', 'headless_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'headless_custom_menu_order', 10, 1 );

/**
 *  Kills WP and provides a message if the feed is not available.
 */
function headless_disable_feed() {
    // phpcs:disable
	wp_die( __( 'No feed available, please visit our <a href="' . get_bloginfo( 'url' ) . '">homepage</a>!' ) );
    // phpcs:enable
}

add_action( 'do_feed', 'headless_disable_feed', 1 );
add_action( 'do_feed_rdf', 'headless_disable_feed', 1 );
add_action( 'do_feed_rss', 'headless_disable_feed', 1 );
add_action( 'do_feed_rss2', 'headless_disable_feed', 1 );
add_action( 'do_feed_atom', 'headless_disable_feed', 1 );
add_action( 'do_feed_rss2_comments', 'headless_disable_feed', 1 );
add_action( 'do_feed_atom_comments', 'headless_disable_feed', 1 );

// Return `null` if an empty value is returned from ACF.
if ( ! function_exists( 'acf_nullify_empty' ) ) {
	/**
	 *  Returns null if empty.
	 *
	 *  @param string $value Some value.
	 *  @param string $_post_id Not used.
	 *  @param string $_field Not used.
	 */
    // phpcs:disable
	function acf_nullify_empty( $value, $_post_id, $_field ) {
    // phpcs:enable
		if ( empty( $value ) ) {
			return null;
		}
		return $value;
	}
}
add_filter( 'acf/format_value', 'acf_nullify_empty', 100, 3 );
