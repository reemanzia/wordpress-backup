<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chique
 */

?>

			</div><!-- .wrapper -->
		</div><!-- #content -->

		<?php get_template_part( 'template-parts/footer/footer', 'instagram' ); ?>

		<footer id="colophon" class="site-footer">
			<?php get_template_part( 'template-parts/footer/footer', 'widget' ); ?>

			<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
		</footer><!-- #colophon -->

		<?php get_template_part( 'template-parts/sticky-playlist/content', 'playlist' ); ?>
		
	</div> <!-- below-site-header -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
