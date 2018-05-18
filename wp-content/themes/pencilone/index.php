<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */

get_header(); ?>
<div class="container">
    <div class="columns">
        <!-- 文章列表 -->
        <div class="column is-9">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts( 'paged='.$paged );
            /*文件列表循环
                每页11篇别表*/
            while ( have_posts() ): the_post();?>
                <div class="box content">
                    <!-- 标题 -->
                    <div class="title is-4">
                        <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title();?></a>
                    </div>
                    <!-- 发布时间，作者，更新时间 -->
                    <div class="subtitle is-6">
                        <span class="entry-date"><?php echo get_the_date('Y/m/d');?></span>
                        <span class="entry-author"><?php the_author_posts_link(); ?></span>
                        <span class="update is-hidden"><?php echo get_the_modified_date('Y/m/d');?></span>
                    </div>
                    <!-- 文章前210个字符 -->
                    <div class="message is-light">
                        <?php echo wp_trim_words( get_the_content(), 210 );?>
                    </div>
                </div>
            <?php endwhile;?>
            <!-- 文件列表循环结束 -->

            <!-- 文件列表翻页；如果不够两页，则不输出 -->
            <?php $page_navi = native_pagenavi();
            if ( is_null($page_navi) != ture ): ?>
                <div class="pagination is-rounded" role="navigation" aria-label="pagination">
                    <?php echo $page_navi; ?>
                </div>
            <?php endif; ?>
            <!-- 文件列表翻页结束 -->
        </div>
        <!-- 文件列表结束 -->

        <!-- 小工具栏 -->
        <div class="column is-3">
            <?php dynamic_sidebar('rightsidebar'); ?>
        </div>
        <!-- 小工具栏结束 -->
        
    </div>
</div>
<?php get_footer();
