<?php
    // 資料庫鏈接
    // db_1 --> shopping_online

    $host = 'localhost'; //執行DB Server 的主機
    $user = 'root'; //登入DB用的DB 帳號
    $pass = ''; //登入DB用的DB 密碼
    $dbName = 'shopping_online'; //使用的資料庫名稱
    /* $db 即為未來執行SQL指令所使用的物件 */
    $db_1 = mysqli_connect($host, $user, $pass, $dbName) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
    
    mysqli_query($db_1,"SET NAMES utf8"); //設定編碼為 unicode utf8
?>