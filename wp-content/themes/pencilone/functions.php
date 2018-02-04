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
 ?>