<?php
/**
 * The template for displaying the header
 * @package pencilone
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <div id="sidebar" class="sidebar">
        <header id="masthead" class="site-header" role="banner">
            <div class="site-branding">
                <?php
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif;
                ?>
            </div><!-- .site-branding -->
        </header><!-- .site-header -->
    </div><!-- .sidebar -->

    <div id="content" class="site-content">
