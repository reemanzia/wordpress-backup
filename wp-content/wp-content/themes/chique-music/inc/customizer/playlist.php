<?php
/**
 * Playlist Options
 *
 * @package Chique Music
 */

/**
 * Add playlist options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function chique_playlist( $wp_customize ) {
	$wp_customize->add_section( 'chique_playlist', array(
			'title' => esc_html__( 'Playlist', 'chique-music' ),
			'panel' => 'chique_theme_options',
		)
	);

	chique_register_option( $wp_customize, array(
			'name'              => 'chique_playlist_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'chique_sanitize_select',
			'choices'           => chique_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'chique-music' ),
			'section'           => 'chique_playlist',
			'type'              => 'select',
		)
	);

	chique_register_option( $wp_customize, array(
			'name'              => 'chique_playlist',
			'default'           => '0',
			'sanitize_callback' => 'chique_sanitize_post',
			'active_callback'   => 'chique_is_playlist_active',
			'label'             => esc_html__( 'Page', 'chique-music' ),
			'section'           => 'chique_playlist',
			'type'              => 'dropdown-pages',
		)
	);

	chique_register_option( $wp_customize, array(
			'name'              => 'chique_playlist_section_sub_title',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'chique_is_playlist_active',
			'label'             => esc_html__( 'Playlist Sub Title', 'chique-music' ),
			'section'           => 'chique_playlist',
			'type'              => 'textarea',
		)
	);

	chique_register_option( $wp_customize, array(
			'name'              => 'chique_playlist_button_text',
			'sanitize_callback' => 'sanitize_text_field',
			'default'			=> 'View Album',
			'active_callback'   => 'chique_is_playlist_active',
			'label'             => esc_html__( 'Button Text', 'chique-music' ),
			'section'           => 'chique_playlist',
			'type'              => 'text',
		)
	);

	chique_register_option( $wp_customize, array(
			'name'              => 'chique_playlist_button_link',
			'sanitize_callback' => 'esc_url_raw',
			'active_callback'   => 'chique_is_playlist_active',
			'label'             => esc_html__( 'Button Link', 'chique-music' ),
			'section'           => 'chique_playlist',
		)
	);

	chique_register_option( $wp_customize, array(
			'name'              => 'chique_playlist_button_link_target',
			'sanitize_callback' => 'chique_sanitize_checkbox',
			'active_callback'   => 'chique_is_playlist_active',
			'label'             => esc_html__( 'Open Link in New Window/Tab', 'chique-music' ),
			'section'           => 'chique_playlist',
			'custom_control'    => 'Chique_Toggle_Control',
		)
	);
}
add_action( 'customize_register', 'chique_playlist' );

/** Active Callback Functions **/
if ( ! function_exists( 'chique_is_playlist_active' ) ) :
	/**
	* Return true if playlist is active
	*
	* @since Chique Pro 1.0
	*/
	function chique_is_playlist_active( $control ) {
		$enable = $control->manager->get_setting( 'chique_playlist_visibility' )->value();

		return chique_check_section( $enable );
	}
endif;
