<?php
    //資料庫主機設定
    $db_host = "localhost";
    $db_table = "animation";
    $db_username = "root";
    $db_password = "86094195";
    //設定資料庫連線
    $db_link = @mysqli_connect($db_host,$db_username,$db_password)
    or die("Fail to connect with Mysql");
    //連接資料庫
    mysqli_select_db($db_link, $db_table) or die("Fail to connect with database");
    //設定字元
    mysqli_set_charset($db_link,"utf8");


?>


