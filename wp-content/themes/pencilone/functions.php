<?php
/**
 * The template for displaying the header
 * @package pencilone
 * @version 1.0
 */
?>

<?php
function daxiawp_sidebar(){
    register_sidebar(array(
          'id'=>'hander_sidebar_search',
          'name'=>'头部搜索',
          'description'=>'hander search',
          'class'=>'',
          'before_widget'=>'<div>',
          'after_widget'=>'</div>',
    ));
    register_sidebar(array(
      'id' => 'rightsidebar',
      'name' => 'right_sidebar',
      'description' => 'hello',
      'before_widget' => '<div class="sidebox">',
      'after_widget' => '</div>',
      ));
}
add_action('widgets_init','daxiawp_sidebar');





/*@分页功能*/
function native_pagenavi(){
global $wp_query, $wp_rewrite;
$wp_query->query_vars["paged"] > 1 ? $current = $wp_query->query_vars["paged"] : $current = 1;

$total_pages = $wp_query->max_num_pages;
if ($total_pages == 1) 
  return null;
$pagination = array(
"base" => @add_query_arg("page","%#%"),
"format" => "",
"end_size" => 2,
"total" => $total_pages,
"current" => $current,
"prev_text" => "上一页",
"next_text" => "下一页"
);
if( $wp_rewrite->using_permalinks() )
$pagination["base"] = user_trailingslashit( trailingslashit( remove_query_arg("s",get_pagenum_link(1) ) ) . "page/%#%/", "paged");
if( !empty($wp_query->query_vars["s"]) )
$pagination["add_args"] = array("s"=>get_query_var("s"));
  return paginate_links($pagination);
}


function my_get_the_author_posts_link() {
  global $authordata;
  if ( ! is_object( $authordata ) ) {
    return;
  }

  $link = sprintf( '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
    esc_url( get_author_posts_url( $authordata->ID, $authordata->nickname ) ),
    /* translators: %s: author's display name */
    esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ),
    get_the_author()
  );

  return apply_filters( 'the_author_posts_link', $link );
}


 ?>