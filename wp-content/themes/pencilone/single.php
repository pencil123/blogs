<?php
/**
 * The main template file
 * @Auther pencilone
 * @version 1.0
 */
get_header(); ?>

<main class="wrapper">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */?>
            <div class="post-box-title"><?php the_title();?></div>
<div class="post-meta">
<span class="entry-date"><?php echo get_the_date('Y/m/d');?></span>
<span class="entry-author"><?php echo get_the_author(); ?></span>
<span class="update"><?php echo get_the_modified_time();?></span>
</div>
            <div class="entry-content"><?php the_content();?></div>
<?php 
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '%title',
                'prev_text' => '%title',
                'screen_reader_text' => 'Post navigation',
            ) );

        // End the loop.
        endwhile;
        ?>

</main><!-- .content-area -->

<?php get_footer(); ?>
