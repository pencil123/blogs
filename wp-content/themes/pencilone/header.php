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
    <title><?php 
    wp_title( '|', true, 'right' );
    bloginfo('name');
    //add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";?>
    </title>
<?php if (is_single() || is_page() ) : $post_id = get_the_ID(); ?>
    <meta name="keywords"  content="<?php echo get_post_meta($post_id,'keywords',true);?>" />
    <meta name="description"  content="<?php echo get_post_meta($post_id,'description',true);?>" />
<?php endif;?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

<meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


</head>

<body <?php body_class(); ?>>
<header class="navbar">
    <div class="container">
    <hgroup class="navbar-item">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    <div class="site-description">
    <?php bloginfo( 'description' ); ?>
    </div>
    </hgroup>

    <h3 class="navbarMenu">
    <div class="navbar-end">
    <div class="navbar-item">
    <a href="/pages/index.html">索引</a>
    </div>
    <div class="navbar-item">
    <a href="/about">About</a>
    </div>
    </div>
    </h3>

<div class="alignright search">
<?php dynamic_sidebar('hander_sidebar_search'); ?>
</div>

    </div>
</header>