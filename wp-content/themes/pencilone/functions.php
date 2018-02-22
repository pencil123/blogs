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
          'before_title'=>'<h2>',
          'after_title'=>'</h2>'
    ));
}
add_action('widgets_init','daxiawp_sidebar');

/*@分页功能*/
function native_pagenavi(){
global $wp_query, $wp_rewrite;
$wp_query->query_vars["paged"] > 1 ? $current = $wp_query->query_vars["paged"] : $current = 1;
$pagination = array(
"base" => @add_query_arg("page","%#%"),
"format" => "",
"end_size" => 2,
"total" => $wp_query->max_num_pages,
"current" => $current,
"prev_text" => "上一页",
"next_text" => "下一页"
);
if( $wp_rewrite->using_permalinks() )
$pagination["base"] = user_trailingslashit( trailingslashit( remove_query_arg("s",get_pagenum_link(1) ) ) . "page/%#%/", "paged");
if( !empty($wp_query->query_vars["s"]) )
$pagination["add_args"] = array("s"=>get_query_var("s"));
echo paginate_links($pagination);
}






 ?>