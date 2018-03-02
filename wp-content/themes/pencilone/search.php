<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */

get_header(); ?>
<div id="breadcrumb" class="wrapper">
现在位置>首页>搜索页
</div>
<div class="wrapper">
<div id="content">
<?php
$search = get_query_var('s');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( 'posts_per_page=11&paged='.$paged."&s=".$search );

if ( have_posts() ) : 
while ( have_posts() ): the_post();?>
<div class="item-list">
<h2 class="post-box-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title();?></a></h2>
<div class="post-meta">
<span class="entry-date"><?php echo get_the_date('Y/m/d');?></span>
<span class="entry-author"><?php echo get_the_author_posts_link(); ?></span>
<span class="update"><?php echo get_the_modified_time();?></span>
</div>
<div class="summary"><?php echo wp_trim_words( get_the_content(), 110 );?>
</div>
</div>
<?php endwhile;?>

<?php $page_navi = native_pagenavi();
if ( is_null($page_navi) != ture ): ?>
<div class="pagenav"><?php echo $page_navi; ?></div>
<?php endif; ?>

<?php else : ?>
<div class="post-box-title">未找到</div>
<div class="entry-content">
抱歉，没有符合您搜索条件的结果。请换其它关键词再试。
</div>
<?php  endif;?>

</div>
<div id="sidebar">
<?php dynamic_sidebar('rightsidebar'); ?>
</div>
</div>




<?php get_footer();
