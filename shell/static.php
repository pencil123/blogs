<?php
/**
 * static archives pages
 * @package pencilone
 */

/** WordPress数据库的名称 */
define('DB_NAME', 'blogs');

/** MySQL数据库用户名 */
define('DB_USER', 'blogs');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'blogs');

/** MySQL主机 */
define('DB_HOST', '127.0.0.1');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

$table_prefix  = 'wp_';


/**************functions ***************/
function check_static ()
{
	$posts_sql = "select ID from wp_posts where post_status = 'publish' and post_type='post' order by id asc";
	$posts = query_sql($posts_sql);
	foreach($posts as $post_num) {
		$file_path = dirname(__FILE__).'/../archives/'.$post_num.'.html';
		if ( ! file_exists($file_path)) {
			post_update($post_num);
		}
	}
}

function check_update()
{
	$select_sql = "select wp_posts.ID from wp_posts,my_static where wp_posts.ID = my_static.post_id and wp_posts.post_modified != my_static.post_modified";
	$posts = query_sql($select_sql);
	foreach($posts as $post_num) {
		$file_path = dirname(__FILE__).'/../archives/'.$post_num.'.html';
		unlink($file_path);
		post_update($post_num);
	}
}

function query_sql ($sql_string)
{
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,'blogs');
	if (!$con)
	{die('Could not connect: ' . mysql_error());}

	$results = $con->query($sql_string);

	if (mysqli_errno($con) != 0)
		return false;
	if ($results->num_rows == 0) {return 0;}
	$result = array();
	while($row = $results->fetch_assoc()) {
		array_push($result,$row['ID']);
	}
	return $result;
}

function post_update($post_num)
{
	$content = curl_down($post_num);
	if (write_post($post_num,$content)){
		$insert_sql = "insert into my_static (post_id,post_modified) select ".$post_num.",post_modified from wp_posts where ID=".$post_num;
		if ( ! query_sql($insert_sql)){
			$update_sql = "update my_static,wp_posts set my_static.post_modified = wp_posts.post_modified where my_static.post_id=".$post_num." and wp_posts.ID=".$post_num;
			query_sql($update_sql);
		}
	}

}

function curl_down($post_num)
{
	$ch = curl_init();
	$url = "http://www.cn-blogs.cn/archives/".$post_num.".html";
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_HEADER,false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$content=curl_exec($ch);
	curl_close($ch);
	return $content;
}

function write_post($filenum,$content)
{
	$post_file = dirname(__FILE__)."/../archives/".$filenum.".html";
	$file_handler = fopen($post_file,"w");
	fwrite($file_handler,$content);
	fclose($file_handler);
	return True;
}

check_static();
check_update();
?>