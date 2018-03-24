<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */
get_header(); ?>

<main class="container">
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();
        /*
         * Include the post format-specific template for the content. If you want to
         * use this in a child theme, then include a file called content-___.php
         * (where ___ is the post format) and that will be used instead.
         */?>
    <article class="article margin-top20">

        <!-- 文章分类和上一篇\下一篇 -->
        <div class="box columns">
            <!-- 文章分类 -->
            <div class="column is-two-fifth">
                <div class="categproe-name">分类：</div>
                <?php the_category() ?>
            </div>
            <!-- 文章分类结束 -->

            <!-- 上一篇和下一篇 -->
            <div class="column is-two-fifth is-offset-5">
                <?php 
                the_post_navigation( array(
                    'next_text' => '下一篇：%title',
                    'prev_text' => '上一篇：%title',
                    'screen_reader_text' => 'Post navigation',
                ) );
                    endwhile;
                    ?>
            </div>
            <!-- 上一篇和下一篇结束 -->
        </div>

        <!-- 文章信息 -->
        <!-- 文章标题 -->
        <div class="title is-3 has-text-centered">
            <?php the_title();?>
        </div>
        <!-- 文章标题结束 -->

        <!-- 文章作者、发布时间、更新时间 -->
        <div class="subtitle is-5 has-text-centered">
            <span class="entry-author"><?php the_author_posts_link(); ?></span>
            <span class="entry-date"><?php echo get_the_date('Y/m/d');?></span>
            <span class="update"><?php echo get_the_modified_time();?></span>
        </div>
        <!-- 文章作者、发布时间、更新时间结束 -->

        <!-- 文章内容 -->
        <div class="content article-body">
            <div class="content">
                <?php the_content();?>
            </div>
        </div>
        <!-- 文章内容结束 -->
    </article>


</main><!-- .content-area -->

<?php get_footer(); ?>
