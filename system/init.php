<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$conn = new mysqli("ip", "user", "password", "database");
$conn->set_charset("utf8");

foreach (glob(__DIR__."/function/*.php") as $filename)
{
    include($filename);
}

foreach (glob(__DIR__."/class/*.php") as $filename)
{
    include($filename);
}

include(__DIR__."/../vendor/autoload.php");

if (isset($_GET)){
    foreach ($_GET as $key_get => $value_get){
        $get_[mb_strtolower($key_get)] = $conn->escape_string($value_get);
    }
}

if (isset($_POST)){
    foreach ($_POST as $key_post => $value_post){
        $post_[mb_strtolower($key_post)] = $conn->escape_string($value_post);
    }
}

if (isset($Json_Post_Status)){
    $postJson_get_file = file_get_contents('php://input');
    if ($postJson_get_file){
        $postJson_ = json_decode($json, true);
    } else {
        exit("Application-Json not exits!");
    }
    
}