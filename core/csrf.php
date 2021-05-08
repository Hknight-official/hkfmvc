<?php 

	include("../system/init.php");
	
	 $_SESSION['csrf_key'] = csrf()."|".client_ip(); // lưu ip để chắc chắn rằng csrf chỉ hoạt động cho đúng client đã lấy
	 echo json_encode(array("csrf" => $_SESSION['csrf_key'])); 