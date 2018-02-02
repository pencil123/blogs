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
          'name'=>'头部搜索'
    ));
}
add_action('widgets_init','daxiawp_sidebar');
 ?>