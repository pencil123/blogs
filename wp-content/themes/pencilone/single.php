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
<div class="box columns">
<div class="column is-two-fifth">
分类： 计算机
</div>
<div class="column is-two-fifth is-offset-5">
<?php 
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '下一篇：%title',
                'prev_text' => '上一篇：%title',
                'screen_reader_text' => 'Post navigation',
            ) );

        // End the loop.
        endwhile;
        ?>
</div>
</div>



<div class="title is-3 has-text-centered"><?php the_title();?></div>
<div class="subtitle is-5 has-text-centered">
<span class="entry-author"><?php the_author_posts_link(); ?></span>
<span class="entry-date"><?php echo get_the_date('Y/m/d');?></span>
<span class="update"><?php echo get_the_modified_time();?></span>
</div>
            <div class="content article-body">
            <div class="content"><?php the_content();?></div></div>
</article>


</main><!-- .content-area -->

<?php get_footer(); ?>
