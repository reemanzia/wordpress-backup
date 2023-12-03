<?php
/**
 * Playlist Options
 *
 * @package Chique Music
 */

/**
 * Add sticky_playlist options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function chique_sticky_playlist( $wp_customize ) {
	$wp_customize->add_section( 'chique_sticky_playlist', array(
			'title' => esc_html__( 'Sticky Playlist', 'chique-music' ),
			'panel' => 'chique_theme_options',
		)
	);

	chique_register_option( $wp_customize, array(
			'name'              => 'chique_sticky_playlist_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'chique_sanitize_select',
			'choices'           => chique_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'chique-music' ),
			'section'           => 'chique_sticky_playlist',
			'type'              => 'select',
		)
	);

	chique_register_option( $wp_customize, array(
			'name'              => 'chique_sticky_playlist',
			'default'           => '0',
			'sanitize_callback' => 'chique_sanitize_post',
			'active_callback'   => 'chique_is_sticky_playlist_active',
			'label'             => esc_html__( 'Page', 'chique-music' ),
			'section'           => 'chique_sticky_playlist',
			'type'              => 'dropdown-pages',
		)
	);
}
add_action( 'customize_register', 'chique_sticky_playlist' );

/** Active Callback Functions **/
if ( ! function_exists( 'chique_is_sticky_playlist_active' ) ) :
	/**
	* Return true if sticky_playlist is active
	*
	* @since Chique Pro 1.0
	*/
	function chique_is_sticky_playlist_active( $control ) {
		$enable = $control->manager->get_setting( 'chique_sticky_playlist_visibility' )->value();

		return chique_check_section( $enable );
	}
endif;
