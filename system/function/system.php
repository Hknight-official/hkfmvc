<?php
    // bảo vệ input
	function escape_input($input){
		global $conn;
		return $conn->real_escape_string(strip_tags(addslashes($input)));
	}
	// tạo csrf key
	function csrf(){
		return bin2hex(openssl_random_pseudo_bytes(32));
    }
    // Bật chức năng Json_Post
	function Json_Post(){
        global $Json_Post_Status;
		$Json_Post_Status = true;
	}