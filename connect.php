<?php
    $server="35.246.107.238";//主机
    $db_username="root";//你的数据库用户名
    $db_password="comp208";//你的数据库密码

    $con = mysql_connect($server,$db_username,$db_password);//链接数据库
    if(!$con){
        die("can't connect to database".mysql_error());//如果链接失败输出错误
    }

    mysql_select_db('test',$con);//选择数据库（我的是test




    $server="35.246.107.238";//主机
    $db_username="root";//你的数据库用户名
    $db_password="comp208";//你的数据库密码
echo "hello,world";
    $con = mysql_connect($server,$db_username,$db_password);//链接数据库
    echo "yes";
    if(!$con){
      echo "no";
        die("can't connect to database".mysql_error());//如果链接失败输出错误
    }

    mysql_select_db('ut',$con);//选择数据库
?>
