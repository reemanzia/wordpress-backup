<?php
/*
 * Load the parent style.css and rtl.css file
 */
function chique_music_enqueue_styles() {
    // Include parent theme CSS.
    wp_enqueue_style( 'chique-style', get_template_directory_uri() . '/style.css', null, date( 'Ymd-Gis', filemtime( get_template_directory() . '/style.css' ) ) );
   
    // Include child theme CSS.
    wp_enqueue_style( 'chique-music-style', get_stylesheet_directory_uri() . '/style.css', array( 'chique-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/style.css' ) ) );

    // Load the stylesheet
    if ( is_rtl() ) {
        wp_enqueue_style( 'chique-rtl', get_template_directory_uri() . '/rtl.css', array( 'chique-style' ), filemtime( get_stylesheet_directory() . '/rtl.css' ) );
    }

    // Enqueue child block styles after parent block style.
    wp_enqueue_style( 'chique-music-block-style', get_stylesheet_directory_uri() . '/assets/css/child-blocks.css', array( 'chique-block-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/assets/css/child-blocks.css' ) ) );
}
add_action( 'wp_enqueue_scripts', 'chique_music_enqueue_styles' );

/**
 * Add child theme editor styles
 */
function chique_music_editor_style() {
    add_editor_style( array(
            'assets/css/child-editor-style.css',
            chique_fonts_url(),
            get_theme_file_uri( 'assets/css/font-awesome/css/font-awesome.css' ),
        )
    );
}
add_action( 'after_setup_theme', 'chique_music_editor_style', 11 );

/**
 * Enqueue editor styles for Gutenberg
 */
function chique_music_block_editor_styles() {
    // Enqueue child block editor style after parent editor block css.
    wp_enqueue_style( 'chique-music-block-editor-style', get_stylesheet_directory_uri() . '/assets/css/child-editor-blocks.css', array( 'chique-block-editor-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/assets/css/child-editor-blocks.css' ) ) );
}
add_action( 'enqueue_block_editor_assets', 'chique_music_block_editor_styles', 11 );

/*
 * Your code goes below
 */

/**
 * Add an HTML class to MediaElement.js container elements to aid styling.
 *
 * Extends the core _wpmejsSettings object to add a new feature via the
 * MediaElement.js plugin API.
 */
function chique_music_mejs_add_container_class() {
    if ( ! wp_script_is( 'mediaelement', 'done' ) ) {
        return;
    }
    ?>
    <script>
    (function() {
        var settings = window._wpmejsSettings || {};

        settings.features = settings.features || mejs.MepDefaults.features;

        settings.features.push( 'chique_class' );

        MediaElementPlayer.prototype.buildchique_class = function(player, controls, layers, media) {
            if ( ! player.isVideo ) {
                var container = player.container[0] || player.container;

                container.style.height = '';
                container.style.width = '';
                player.options.setDimensions = false;
            }

            if ( jQuery( '#' + player.id ).parents('#sticky-playlist-section').length ) {
                player.container.addClass( 'chique-mejs-container chique-mejs-sticky-playlist-container' );

                jQuery( '#' + player.id ).parent().children('.wp-playlist-tracks').addClass('displaynone');

                var volume_slider = controls[0].children[5];

                if ( jQuery( '#' + player.id ).parent().children('.wp-playlist-tracks').length > 0) {
                    var playlist_button =
                    jQuery('<div class="mejs-button mejs-playlist-button mejs-toggle-playlist">' +
                        '<button type="button" aria-controls="mep_0" title="Toggle Playlist"></button>' +
                    '</div>')

                    // append it to the toolbar
                    .appendTo( jQuery( '#' + player.id ) )

                    // add a click toggle event
                    .on( 'click',function(e) {
                        jQuery( '#' + player.id ).parent().children('.wp-playlist-tracks').slideToggle();
                        jQuery( this ).toggleClass('is-open');
                    });

                    var play_button = controls[0].children[0];

                    // Add next button after volume slider
                    var next_button =
                    jQuery('<div class="mejs-button mejs-next-button mejs-next">' +
                        '<button type="button" aria-controls="' + player.id
                        + '" title="Next Track"></button>' +
                    '</div>')

                    // insert after volume slider
                    .insertAfter(play_button)

                    // add a click toggle event
                    .on( 'click',function() {
                        jQuery( '#' + player.id ).parent().find( '.wp-playlist-next').trigger('click');
                    });

                    // Add prev button after volume slider
                    var previous_button =
                    jQuery('<div class="mejs-button mejs-previous-button mejs-previous">' +
                        '<button type="button" aria-controls="' + player.id
                        + '" title="Previous Track"></button>' +
                    '</div>')

                    // insert after volume slider
                    .insertBefore( play_button )

                    // add a click toggle event
                    .on( 'click',function() {
                        jQuery( '#' + player.id ).parent().find( '.wp-playlist-prev').trigger('click');
                    });
                }
            } else {
                player.container.addClass( 'chique-mejs-container' );
                if ( jQuery( '#' + player.id ).parent().children('.wp-playlist-tracks').length > 0) {
                    var play_button = controls[0].children[0];

                    // Add next button after volume slider
                    var next_button =
                    jQuery('<div class="mejs-button mejs-next-button mejs-next">' +
                        '<button type="button" aria-controls="' + player.id
                        + '" title="Next Track"></button>' +
                    '</div>')

                    // insert after volume slider
                    .insertAfter(play_button)

                    // add a click toggle event
                    .on( 'click',function() {
                        jQuery( '#' + player.id ).parent().find( '.wp-playlist-next').trigger('click');
                    });

                    // Add prev button after volume slider
                    var previous_button =
                    jQuery('<div class="mejs-button mejs-previous-button mejs-previous">' +
                        '<button type="button" aria-controls="' + player.id
                        + '" title="Previous Track"></button>' +
                    '</div>')

                    // insert after volume slider
                    .insertBefore( play_button )

                    // add a click toggle event
                    .on( 'click',function() {
                        jQuery( '#' + player.id ).parent().find( '.wp-playlist-prev').trigger('click');
                    });
                }
            }
        }
    })();
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'chique_music_mejs_add_container_class' );

/**
 * Register Google fonts for Chique Music.
 *
 * Create your own chique_fonts_url() function to override in a child theme.
 *
 * @since Chique Music 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function chique_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans: on or off', 'chique' );

    /* Translators: If there are characters in your language that are not
    * supported by Titillium Web, translate this to 'off'. Do not translate
    * into your own language.
    */
    $titillium_web = _x( 'on', 'Titillium Web: on or off', 'chique' );

    /* Translators: If there are characters in your language that are not
    * supported by Roboto Condensed, translate this to 'off'. Do not translate
    * into your own language.
    */
    $roboto_condensed = _x( 'on', 'Roboto Condensed: on or off', 'chique' );
    if ( 'off' !== $open_sans || 'off' !== $titillium_web || 'off' !== $roboto_condensed) {
        $font_families = array();

        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300,400,600,700';
        }

        if ( 'off' !== $titillium_web ) {
            $font_families[] = 'Titillium Web:300,400,600,700';
        }

        if ( 'off' !== $roboto_condensed ) {
            $font_families[] = 'Roboto Condensed:300,400,600,700';
        }
        
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
    // Load google font locally.
    require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
        
    return esc_url_raw( wptt_get_webfont_url( $fonts_url ) );
}

/**
 * Enqueue scripts and styles.
 */
function chique_music_scripts() {
    // Remove Media CSS, we have ouw own CSS for this.
    wp_deregister_style('wp-mediaelement');
}
add_action( 'wp_enqueue_scripts', 'chique_music_scripts' );

/**
 * Display Sections on header and footer with respect to the section option set in chique_sections_sort
 */
function chique_sections( $selector = 'header' ) {
    get_template_part( 'template-parts/header/header', 'media' );
    get_template_part( 'template-parts/slider/display', 'slider' );
    get_template_part( 'template-parts/playlist/content','playlist' );
    get_template_part( 'template-parts/hero-content/content','hero' );
    get_template_part( 'template-parts/portfolio/display', 'portfolio' );
    get_template_part( 'template-parts/team/display', 'team' );
    get_template_part( 'template-parts/services/display', 'services' );
    get_template_part( 'template-parts/testimonials/display', 'testimonial' );
    get_template_part( 'template-parts/featured-content/display', 'featured' );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function chique_music_body_classes( $classes ) {
    // Added color scheme to body class.
    $classes['color-scheme'] = 'color-scheme-music';

    $enable_sticky_playlist = get_theme_mod( 'chique_sticky_playlist_visibility', 'disabled' );

    if ( chique_check_section( $enable_sticky_playlist ) ) {
        $classes[] = 'sticky-playlist-enabled';
        $classes[] = 'sticky-playlist-top';
    }

    return $classes;
}
add_filter( 'body_class', 'chique_music_body_classes', 11 );

/**
 * Change default background color
 */
function chique_music_background_default_color( $args ) {
    $args['default-color'] = '#000000';

    return $args;
}
add_filter( 'chique_custom_background_args', 'chique_music_background_default_color' );

/**
 * Change default header text color
 */
function chique_music_header_default_color( $args ) {
    $args['default-image'] =  get_theme_file_uri( 'assets/images/header-image.jpg' );
    $args['default-text-color'] = '#ffffff';

    return $args;
}
add_filter( 'chique_custom_header_args', 'chique_music_header_default_color' );

/**
 * Load Customizer Options for Playlist
 */
require trailingslashit( get_stylesheet_directory() ) . 'inc/customizer/playlist.php';

/**
 * Load Customizer Options for Sticky Playlist
 */
require trailingslashit( get_stylesheet_directory() ) . 'inc/customizer/sticky-playlist.php';

/**
 * Load Customizer Options for Team
 */
require trailingslashit( get_stylesheet_directory() ) . 'inc/customizer/team.php';
