<?php
/**
 * Lấy dữ liệu client
 */
function client($value = "", $type_conn = 0){
    global $_SESSION, $conn;
    if (empty($value)){
        if (!empty($_SESSION['login'])){
            $query = $conn[$type_conn]->query("SELECT * FROM `users` WHERE `username` = '".$_SESSION['login']."'");
            if (!($query->num_rows > 0)){
                return false;
            }
            return $query->fetch_array();
        } else {
            return false;
        }
    } else {
        $query = $conn[$type_conn]->query("SELECT * FROM `users` WHERE `username` = '".$value."'");
        return $query->fetch_array();
    }
    
}
/**
 * Lấy ipv4 client
 */
function client_ip()
{
		$ipaddress = getenv('REMOTE_ADDR');
		return $ipaddress;
}