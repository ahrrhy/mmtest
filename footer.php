<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boats
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info text-center">
            <p>
                <?php echo get_theme_mod('footer_text')?>
                <a href="mailto:<?php echo get_theme_mod('footer_email_link')?>">
                    <?php echo get_theme_mod('footer_email_text')?>
                </a>
            </p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
