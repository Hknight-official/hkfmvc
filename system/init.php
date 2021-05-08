<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// #! Có thể sử dụng được nhiều database trong một dự án
$conn = [
    new mysqli("ip", "user", "password", "database")
];


foreach ($conn as $key_conn_core => $value_conn_core){
    $conn[$key_conn_core]->set_charset("utf8");
}

// #! Khai báo các function trong folder
foreach (glob(__DIR__."/function/*.php") as $filename)
{
    include($filename);
}

// #! Khai báo các class trong folder
foreach (glob(__DIR__."/class/*.php") as $filename)
{
    include($filename);
}

// #! Khai báo toàn bộ composer module
include(__DIR__."/../vendor/autoload.php");

// Bảo mật session
if (client() != false){
    if (client_ip() != client()['ip']){
        session_destroy(); // Hủy session ngay lập tức trên thiết bị đánh cắp session
    }
}

// Lọc dữ liệu $request_ method get
if (isset($_GET)){
    if (!(count($_POST) > 0)){
        $request_ = method_core_data($_GET);
    }
}
// Lọc dữ liệu $request_ method post
if (isset($_POST)){
    if (!(count($_GET) > 0)){
        $request_ = method_core_data ($_POST);
    }
}

// Lọc dữ liệu $request_ method Json Post
// lưu ý cần gọi Json_Post() trước tiên để sử dụng
if (isset($Json_Post_Status)){
    $postJson_get_file = file_get_contents('php://input');
    if ($postJson_get_file){
        $request_ = json_decode($json, true);
    } else {
        exit("Application-Json not exits!");
    }
    
}
