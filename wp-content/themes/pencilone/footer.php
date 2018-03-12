<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<footer id="footer">
<?php
if (is_home()){
$bookmarks = wp_list_bookmarks( array(
                'orderby'        => 'name',
                'order'          => 'ASC',
                'categorize' => False,
                'category_before' => '<div class=" wrapper link">',
                'category_after' => '</div>',
                'category_name' => 'Blogroll',
                'title_li' => '<li>友情链接:</li>',
                'title_before'=>'',
                'title_after'=>'',
                          ));
}
?>

<div class="wrapper footer-info">
Copyright©2015-20178 cn-blogs.cn. All Rights Reserved. 鲁ICP备18001334号-2
</div>
</footer><!-- .site-footer -->

</body>
</html>
