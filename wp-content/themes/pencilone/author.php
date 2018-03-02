<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */

get_header(); ?>
<div id="breadcrumb" class="wrapper">
</div>
<div class="wrapper">
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ( $paged ==1) :?>
<div id="profile">
<h2><?php the_author_meta('user_nicename')?></h2>
<span>昵称：<?php the_author_meta('nickname')?></span>
<span>邮件地址:<?php the_author_meta('user_email')?></span>
<div class="statement"><?php the_author_meta('description')?></div>
</div>
<?php endif;?>


<?php
$author_id = get_the_author_meta('ID');

query_posts( 'posts_per_page=11&paged='.$paged.'&author='.$author_id );
while ( have_posts() ): the_post();?>
<div class="item-list">
<h2 class="post-box-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title();?></a></h2>
<div class="post-meta">
<span class="entry-date"><?php echo get_the_date('Y/m/d');?></span>
<span class="entry-author"><?php echo get_the_author(); ?></span>
<span class="update"><?php echo get_the_modified_time();?></span>
</div>
<div class="summary"><?php echo wp_trim_words( get_the_content(), 150 );?>
</div>
</div>
<?php endwhile;?>


<?php $page_navi = native_pagenavi();
if ( is_null($page_navi) != ture ): ?>
<div class="pagenav"><?php echo $page_navi; ?></div>
<?php endif; ?>
</div>

<?php get_footer();
