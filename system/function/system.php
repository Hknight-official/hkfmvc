<?php
	/**
	 * Tạo mã csrf
	 */
	function csrf(){
		return bin2hex(openssl_random_pseudo_bytes(32));
    }
    /**
	 * Kích hoạt request Json Post
	 */
	function Json_Post(){
        global $Json_Post_Status;
		$Json_Post_Status = true;
	}
	/**
	 * Kiểm tra phần tử mảng có rỗng hay không
	 */
	function check_data_method($method, $array_key = [])
	{
		foreach ($array_key as $key) {
			if (empty($method[$key])) {
				return false;
			}
		}
		return true;
	}
	/**
	 * Kiểm tra phần tử mảng có tồn tại hay không
	 */
	function exit_data_method($method, $array_key = [])
	{
		foreach ($array_key as $key) {
			if (!isset($method[$key])) {
				return false;
			}
		}
		return true;
	}
	/**
	 * hệ thống bảo vệ đầu ra anti sql injection và xss
	 */
	function method_core_data($data, $type_conn = 0)
	{
		global $conn;
		if (is_array($data)) {
			$return = [];
			foreach ($data as $key => $value) {
				$return[$key] = method_core_data($value);
			}
			return $return;
		} else {
			return strip_tags($conn[$type_conn]->escape_string($data));
		}
	}
