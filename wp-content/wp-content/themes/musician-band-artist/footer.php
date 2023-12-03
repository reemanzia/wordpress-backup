<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Musician Band Artist
 */
?>

    <footer role="contentinfo">
        <?php if (get_theme_mod('music_recording_studio_footer_hide_show', true)){ ?>
            <aside id="footer" class="copyright-wrapper" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'musician-band-artist' ); ?>">
                <div class="container">
                    <?php
                        $count = 0;
                        
                        if ( is_active_sidebar( 'footer-1' ) ) {
                            $count++;
                        }
                        if ( is_active_sidebar( 'footer-2' ) ) {
                            $count++;
                        }
                        if ( is_active_sidebar( 'footer-3' ) ) {
                            $count++;
                        }
                        if ( is_active_sidebar( 'footer-4' ) ) {
                            $count++;
                        }
                        // $count == 0 none
                        if ( $count == 1 ) {
                            $colmd = 'col-md-12 col-sm-12';
                        } elseif ( $count == 2 ) {
                            $colmd = 'col-md-6 col-sm-6';
                        } elseif ( $count == 3 ) {
                            $colmd = 'col-md-4 col-sm-4';
                        } else {
                            $colmd = 'col-md-3 col-sm-3';
                        }
                    ?>
                    <div class="row">
                        <div class="<?php if ( !is_active_sidebar( 'footer-1' ) ){ echo "footer_hide"; }else{ echo "$colmd"; } ?> col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                        <div class="<?php if ( is_active_sidebar( 'footer-2' ) ){ echo "$colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                        <div class="<?php if ( is_active_sidebar( 'footer-3' ) ){ echo "$colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                        <div class="<?php if ( !is_active_sidebar( 'footer-4' ) ){ echo "footer_hide"; }else{ echo "$colmd"; } ?> col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>
                    </div>
                </div>
            </aside>
        <?php }?>
        <?php if (get_theme_mod('music_recording_studio_copyright_hide_show', true)) {?>
            <div id="footer-2" class="pt-3 pb-3 text-center">
                <div class="copyright container">
                    <p class="mb-0"><?php music_recording_studio_credit(); ?><?php echo esc_html(get_theme_mod('music_recording_studio_footer_text',__('By VWThemes','musician-band-artist'))); ?></p>
                    <?php if(get_theme_mod('music_recording_studio_footer_icon',false) != false) {?>
                        <?php dynamic_sidebar('footer-icon'); ?>
                    <?php }?>
                    <?php if( get_theme_mod( 'music_recording_studio_hide_show_scroll',true) == 1 || get_theme_mod( 'music_recording_studio_resp_scroll_top_hide_show',true) == 1) { ?>
                        <?php $music_recording_studio_theme_lay = get_theme_mod( 'music_recording_studio_scroll_top_alignment','Right');
                        if($music_recording_studio_theme_lay == 'Left'){ ?>
                            <a href="#" class="scrollup left"><i class="<?php echo esc_attr(get_theme_mod('music_recording_studio_scroll_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'musician-band-artist' ); ?></span></a>
                        <?php }else if($music_recording_studio_theme_lay == 'Center'){ ?>
                            <a href="#" class="scrollup center"><i class="<?php echo esc_attr(get_theme_mod('music_recording_studio_scroll_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'musician-band-artist' ); ?></span></a>
                        <?php }else{ ?>
                            <a href="#" class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('music_recording_studio_scroll_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'musician-band-artist' ); ?></span></a>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="clear"></div>
            </div>
        <?php }?>
    </footer>
        <?php wp_footer(); ?>
    </body>
</html>