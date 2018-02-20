<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */

get_header(); ?>
<div id="breadcrumb" class="wrapper">
现在位置>首页
</div>
<div class="wrapper">
<div id="content">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( 'posts_per_page=10&paged='.$paged );
while ( have_posts() ): the_post();?>
<div class="item-list">
<h2 class="post-box-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title();?></a></h2>
<div class="post-meta">
<span class="entry-date"><?php echo get_the_date('Y/m/d');?></span>
<span class="entry-author"><?php echo get_the_author(); ?></span>
<span class="update"><?php echo get_the_modified_time();?></span>
</div>
<div class="summary"><?php echo wp_trim_words( get_the_content(), 100 );?>
</div>
</div>
<?php endwhile;?>
</div>
<div class="pagenav"><?php native_pagenavi();?></div>
</div>


<?php get_footer();
