<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sterling
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
            
            <div class="container-fluid" id="footer">
                
                <div class="row">
                    
                    <div class="container">
                        
                        <div class="site-info">
                                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'sterling' ) ); ?>"><?php
                                        /* translators: %s: CMS name, i.e. WordPress. */
                                        printf( esc_html__( 'Proudly powered by %s', 'sterling' ), 'WordPress' );
                                ?></a>
                                <span class="sep"> | </span>
                                <?php
                                        /* translators: 1: Theme name, 2: Theme author. */
                                        printf( esc_html__( 'Theme: %1$s by %2$s.', 'sterling' ), 'Sterling', '<a href="https://www.smartcatdesign.net/">Smartcat</a>' );
                                ?>
                        </div><!-- .site-info -->
                
                    </div>
                
                </div>
                
            </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>