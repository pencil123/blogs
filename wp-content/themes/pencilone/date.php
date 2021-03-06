<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */

get_header(); ?>
<div id="breadcrumb" class="wrapper">
现在位置>首页>日期列表页
</div>
<div class="wrapper">
<div id="content">
<?php
$year = get_query_var('year');
$monthnum = get_query_var('monthnum');
$day = get_query_var('day');

if ($day) 
    { $query_string = "year=".$year."&monthnum=".$monthnum."&day=".$day;}
else
    { $query_string = "year=".$year."&monthnum=".$monthnum;}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( $query_string.'&posts_per_page=11&paged='.$paged );
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

</div>
<div id="sidebar">
<?php dynamic_sidebar('rightsidebar'); ?>
</div>
</div>



<?php get_footer();
