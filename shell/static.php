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


$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,'blogs');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
else echo "连接成功";

$posts_sql = "select ID from wp_posts where post_status = 'publish'";

$results = $con->query($posts_sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
        echo "id: " . $row["ID"];
    }
} else {
    echo "0 results";
}




?>