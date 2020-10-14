<?php 

	include("../system/init.php");
	
	 $_SESSION['csrf_key'] = csrf();
	 echo json_encode(array("csrf" => $_SESSION['csrf_key'])); 