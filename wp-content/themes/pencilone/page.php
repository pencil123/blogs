<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */
get_header(); ?>
<?php
    while ( have_posts() ) : the_post();
        /*
         * Include the post format-specific template for the content. If you want to
         * use this in a child theme, then include a file called content-___.php
         * (where ___ is the post format) and that will be used instead.
         */?>
<main class="container">
    <article class="article margin-top20">
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
<?php
endwhile;
?>
<?php get_footer(); ?>
