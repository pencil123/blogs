<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */

get_header(); ?>
<div class="container">
<div class="columns">
<div class="column is-9">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( 'posts_per_page=11&paged='.$paged );
while ( have_posts() ): the_post();?>
<div class="box content">
<div class="title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title();?></a></div>
<div class="subtitle">
<span class="entry-date"><?php echo get_the_date('Y/m/d');?></span>
<span class="entry-author"><?php the_author_posts_link(); ?></span>
<span class="update"><?php echo get_the_modified_time();?></span>
</div>
<div class="message is-light"><?php echo wp_trim_words( get_the_content(), 110 );?>
</div>
</div>
<?php endwhile;?>


<?php $page_navi = native_pagenavi();
if ( is_null($page_navi) != ture ): ?>
<div class="pagination is-rounded" role="navigation" aria-label="pagination"><?php echo $page_navi; ?></div>
<?php endif; ?>
</div>
<div class="column is-3">
<?php dynamic_sidebar('rightsidebar'); ?>
</div>

</div>
</div>
<?php get_footer();
