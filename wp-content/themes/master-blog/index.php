<?php get_header(); ?>

<?php get_template_part( 'template-parts/template-part', 'head' ); ?>
<?php get_template_part( 'template-parts/homepage', 'widgets' );?>
<!-- start content container -->
<div class="row">

		<div class="col-md-<?php master_blog_main_content_width_columns(); ?>">

		<?php
		
		$posts = query_posts($query_string . '&orderby=date&showposts=11');
		if ( have_posts() ) :  $postCount = 0;

			while ( have_posts() ) : $postCount++; the_post();
        
        if( $postCount == 1 ) { ?>
            <div class="first-article">
              <?php get_template_part( 'content', get_post_format() ); ?>
            </div>
        <?php } else { 
        
            get_template_part( 'content', get_post_format() );
        
          } 


			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'content', 'none' );

		endif;
		?>

	</div>

	<?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>