<?php

/**
 * Enqueue scripts and styles.
 */
function sterling_scripts() 
{
    
    // Load Fonts from array
    $fonts = sterling_fonts();

     // Primary Font Enqueue
    if( array_key_exists ( get_theme_mod( 'sterling_font_primary', 'Trirong, serif'), $fonts ) ) :
        wp_enqueue_style('google-font-primary', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'sterling_font_primary', 'Trirong, serif' ) ] ), array(), STERLING_VERSION );
    endif;
    // Body Font Enqueue
    if( array_key_exists ( get_theme_mod( 'sterling_font_body', 'Titillium Web, sans-serif'), $fonts ) ) :
        wp_enqueue_style('google-font-body', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'sterling_font_body', 'Titillium Web, sans-serif' ) ] ), array(), STERLING_VERSION );
    endif;
    
    wp_enqueue_style( 'sterling-style', get_stylesheet_uri() );

    wp_enqueue_style( 'bootstrap css', get_template_directory_uri() . '/inc/css/bootstrap.min.css', null, STERLING_VERSION );

    wp_enqueue_style( 'fontawesome css', get_template_directory_uri() . '/inc/css/font-awesome.min.css', null, STERLING_VERSION );

    wp_enqueue_style( 'custom css', get_template_directory_uri() . '/inc/css/custom.css', null, STERLING_VERSION );

    wp_enqueue_script( 'sterling-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'sterling-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'bootstrap js', get_template_directory_uri() . '/inc/js/bootstrap.min.js', array("jquery"), STERLING_VERSION );
    
    wp_enqueue_script( 'sticky js', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array("jquery"), STERLING_VERSION );
    
    wp_enqueue_script( 'bigSlide js', get_template_directory_uri() . '/inc/js/bigSlide.min.js', array("jquery"), STERLING_VERSION );

    wp_enqueue_script( 'custom js', get_template_directory_uri() . '/inc/js/custom.js', array("jquery"), STERLING_VERSION );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'sterling_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sterling_widgets_init() {
    
    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sterling' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sterling' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
            'name'          => esc_html__( 'Footer', 'sterling' ),
            'id'            => 'footer',
            'description'   => esc_html__( 'Add widgets here.', 'sterling' ),
            'before_widget' => '<div class="col-sm-4"><section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section></div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'sterling_widgets_init' );

function sterling_hex2rgba( $color, $opacity = false ) {
 
    $default = 'rgb(0,0,0)';
    //Return default if no color provided
    if ( empty( $color ) )
        return $default; 
    //Sanitize $color if "#" is provided 
    if ( $color[0] == '#' ) {
        $color = substr( $color, 1 );
    }
    //Check if color has 6 or 3 characters and get values
    if ( strlen( $color ) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }
    // Convert hexadec to rgb
    $rgb =  array_map( 'hexdec', $hex );
    // Check if opacity is set(rgba or rgb)
    if( $opacity ){
        if( abs( $opacity ) > 1 )
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }
    //Return rgb(a) color string
    return $output;
        
}

function sterling_custom_css() { ?>

    <style type="text/css">
        
        #top-bar, #header-panel *{
             font-family: <?php echo esc_attr( get_theme_mod( 'sterling_font_primary', 'Trirong, serif') ); ?>;
        }
        p {
            font-family: <?php echo esc_attr( get_theme_mod( 'sterling_font_body', 'Titillium Web, sans-serif') ); ?>;
        }
        
        <?php $skin_color = sterling_hex2rgba( esc_attr( get_theme_mod( 'sterling_skins_color', '#ccc' ) ), false ); ?>
        
        h1,h2,h3,h4,h5,h6,th {
            color: rgb(<?php echo $skin_color; ?>);
        }
        
    </style>
    
    <?php 
    
}
add_action('wp_head', 'sterling_custom_css');

/**
 * Returns all available fonts as an array
 * 
 * @return array of fonts
 */
function sterling_fonts(){
    
    $font_family_array = array(
        
        'Abel, sans-serif'                                  => 'Abel',
        'Arvo, serif'                                       => 'Arvo:400,400i,700',
        'Bangers, cursive'                                  => 'Bangers',
        'Courgette, cursive'                                => 'Courgette',
        'Domine, serif'                                     => 'Domine',
        'Dosis, sans-serif'                                 => 'Dosis:200,300,400',
        'Droid Sans, sans-serif'                            => 'Droid+Sans:400,700',
        'Economica, sans-serif'                             => 'Economica:400,700',
        'Josefin Sans, sans-serif'                          => 'Josefin+Sans:300,400,600,700',
        'Itim, cursive'                                     => 'Itim',
        'Lato, sans-serif'                                  => 'Lato:100,300,400,700,900,300italic,400italic',
        'Lobster Two, cursive'                              => 'Lobster+Two',
        'Lora, serif'                                       => 'Lora',
        'Lilita One, cursive'                               => 'Lilita+One',
        'Montserrat, sans-serif'                            => 'Montserrat:400,700',
        'Noto Serif, serif'                                 => 'Noto+Serif',
        'Old Standard TT, serif'                            => 'Old+Standard+TT:400,400i,700',
        'Open Sans, sans-serif'                             => 'Open Sans',
        'Open Sans Condensed, sans-serif'                   => 'Open+Sans+Condensed:300,300i,700',
        'Orbitron, sans-serif'                              => 'Orbitron',
        'Oswald, sans-serif'                                => 'Oswald:300,400',
        'Poiret One, cursive'                               => 'Poiret+One',
        'PT Sans Narrow, sans-serif'                        => 'PT+Sans+Narrow',
        'Rajdhani, sans-serif'                              => 'Rajdhani:300,400,500,600',
        'Raleway, sans-serif'                               => 'Raleway:200,300,400,500,700',
        'Roboto, sans-serif'                                => 'Roboto:100,300,400,500',
        'Roboto Condensed, sans-serif'                      => 'Roboto+Condensed:400,300,700',
        'Shadows Into Light, cursive'                       => 'Shadows+Into+Light',
        'Shrikhand, cursive'                                => 'Shrikhand',
        'Source Sans Pro, sans-serif'                       => 'Source+Sans+Pro:200,400,600',
        'Teko, sans-serif'                                  => 'Teko:300,400,600',
        'Titillium Web, sans-serif'                         => 'Titillium+Web:400,200,300,600,700,200italic,300italic,400italic,600italic,700italic',
        'Trirong, serif'                                    => 'Trirong:400,700',
        'Ubuntu, sans-serif'                                => 'Ubuntu',
        'Vollkorn, serif'                                   => 'Vollkorn:400,400i,700',
        'Voltaire, sans-serif'                              => 'Voltaire',
        
    );
    
    return $font_family_array;
}
/**
 * Returns all posts as an array.
 * Pass true to include Pages
 * 
 * @param boolean $include_pages
 * @return array of posts
 */
function sterling_all_posts_array( $include_pages = false ) {
    
    $posts = get_posts( array(
        'post_type'        => $include_pages ? array( 'post', 'page' ) : 'post',
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'            => 'ASC',
    ));
    $posts_array = array(
        'none'  => __( 'None', 'sterling' ),
    );
    
    foreach ( $posts as $post ) :
        
        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;
        
    endforeach;
    
    return $posts_array;
    
}

/**
 * Creates header using images from Custom Header
 * 
 */
function sterling_get_header_panel() { ?>
    
    <div id="header-panel" class="container-fluid" style="background: url(<?php header_image(); ?>) no-repeat center">
        
        <div class="row">
            
            <div id="header-panel-content">
                
                <h1>Wedding Photography</h1>
                
                <div id="header-panel-links">
                    
                    <a>Home</a>
                    <a>All Posts</a>
                    <h4>Wedding Photography</h4>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
<?php }


function sterling_get_custom_footer() { ?>
    <div class="container-fluid" id="custom-footer">
       
        <div class="row">
            
            <div class="container">
            
                <div class="row">

                    <div id="custom-footer-social-icons">

                        <a href="<?php echo esc_attr( get_theme_mod('sterling_twitter_link', '#') ) ?> ?>">
                            <div class="custom-footer-social-icon">

                                <i class="fa fa-twitter fa-2x"></i>

                            </div>
                        </a>
                        
                        <a href="<?php echo esc_attr( get_theme_mod('sterling_facebook_link', '#') ) ?> ?>">
                            <div class="custom-footer-social-icon">

                                <i class="fa fa-facebook fa-2x"></i>

                            </div>
                        </a>
                        
                        <a href="<?php echo esc_attr( get_theme_mod('sterling_instagram_link', '#') ) ?> ?>">    
                            <div class="custom-footer-social-icon">

                                <i class="fa fa-instagram fa-2x"></i>

                            </div>
                        </a>
                        
                        <a href="<?php echo esc_attr( get_theme_mod('sterling_dribbble_link', '#') ) ?> ?>">    
                            <div class="custom-footer-social-icon">

                                <i class="fa fa-dribbble fa-2x"></i>

                            </div>
                        </a>
                        
                    </div>

                </div>

                <span id="custom-footer-divider"></span>
                
                <div class="row">

                    <div id="custom-footer-widgets">

                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : 

                        endif; ?>

                    </div>  

                </div>
            
            </div>    
                
        </div>
        
    </div>
        
<?php }

function sterling_get_scrolltotop() { ?>
    
    <span id="scrolltotop-btn">
        
        <i class="fa fa-chevron-up"></i>
        
    </span>
    
<?php }