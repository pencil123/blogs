<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */

get_header(); ?>
<main class="container">
    <div class="article margin-top20">

    <!-- 作者信息 -->
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if ( $paged ==1) :?>
    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="tile is-child box code">
            <p class="title"><?php the_author_meta('user_nicename')?></p>
            <p class="subtitle">邮件地址:<?php the_author_meta('user_email')?></p>
            <div class="message"><?php the_author_meta('description')?></div>
            </div>
        </div>
    </div>
    <?php endif;?>
    <!-- 作者信息结束 -->

    <!-- 作者文章列表 -->
    <?php
    $author_id = get_the_author_meta('ID');
    query_posts( 'paged='.$paged.'&author='.$author_id );
    while ( have_posts() ): the_post();?>
                <div class="box content">
                    <!-- 标题 -->
                    <div class="title is-4">
                        <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title();?></a>
                    </div>
                    <!-- 发布时间，作者，更新时间 -->
                    <div class="subtitle is-6">
                        <span class="entry-date"><?php echo get_the_date('Y/m/d');?></span>
                        <span class="entry-author"><?php echo get_the_author(); ?></span>
                        <span class="update is-hidden"><?php echo get_the_modified_time('Y/m/d');?></span>
                    </div>
                    <!-- 文章前210个字符 -->
                    <div class="message is-light">
                        <?php echo wp_trim_words( get_the_content(), 210 );?>
                    </div>
                </div>
    <?php endwhile;?>

    <!-- 文件列表翻页；如果不够两页，则不输出 -->
    <?php $page_navi = native_pagenavi();
    if ( is_null($page_navi) != ture ): ?>
        <div class="pagination is-rounded" role="navigation" aria-label="pagination">
            <?php echo $page_navi; ?>
        </div>
    <?php endif; ?>
    <!-- 文件列表翻页结束 -->

    </div>
</main>
<?php get_footer();
