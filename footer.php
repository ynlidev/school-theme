<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

<footer id="colophon" class="site-footer">
    <nav class="footer-logo">
        <?php if ( has_custom_logo() ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php the_custom_logo(); ?>
            </a>
        <?php endif; ?>		
    </nav>

    <!-- Footer Credits -->
    <section class="footer-credits">
        <h2>Credits</h2>
		<?php esc_html_e( 'Created by ', 'fwd' ); ?><a href="<?php echo get_home_url(); ?>"><?php esc_html_e( 'Luke & Yining', 'fwd' ); ?></a>
        <p>Photos courtesy of <a href="https://burst.shopify.com/" target="_blank" rel="noopener">Burst</a>.</p>
    </section>

    <!-- Footer Navigation -->
    <nav class="footer-nav">
        <h2>Links</h2>
        <?php
        if ( has_nav_menu( 'footer-right' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'footer-right',
                'menu_id'        => 'menu-footer-menu',
                'container'      => 'div',
                'container_class' => 'menu-footer-menu-container',
                'menu_class'     => 'menu',
            ) );
        }
        ?>
    </nav>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
