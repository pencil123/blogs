<?php
/**
 * The template for displaying the header
 * @package pencilone
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
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
    <link id="favicon" href="/favicon.ico" rel="icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

<meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


</head>

<body <?php body_class(); ?>>
<header class="navbar">
<div class="container">
    <div class="navbar-brand">
        <img src="/logo.png" width="73" height="88">
        <div>
        <h1 class="title2 is-3 navbar-item">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </h1>
        <p class="has-text-right">
            <a href="/"><?php bloginfo( 'description' ); ?></a>
        </p>
        </div>
    </div>
    <div class="navbar-menu is-active">
    <div class="navbar-end">
    <div class="tabs is-right">
    <a class="navbar-item" href="/pages/index.html">索引</a>
    <a class="navbar-item" href="/about">About</a>
    </div>
    </div>
    </div>
</div>
</header>

<?php 
if (! is_single()) :?>
<hgroup class="container my-margin">
    <div class="columns">
        <div class="column is-9">
             <nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumbs">
            <ul>
                <li>现在位置</li>
                <li><a href="/"><span class="icon is-small"><i class="fas fa-home"></i>首页</span></a></li>
            </ul>
            </nav>
        </div>
  <div class="column is-3">
<?php dynamic_sidebar('hander_sidebar_search'); ?>
  </div>
</div>
</hgroup>
<?php endif;?>