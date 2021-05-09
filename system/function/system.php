<?php
	/**
	 * Tạo mã csrf
	 */
	function csrf(){
		return bin2hex(openssl_random_pseudo_bytes(32));
    }
	/**
	 * Xóa bỏ csrf hiện tại, chú ý: nên hủy ngay csrf sau ở cuối lệnh core
	 */
	function un_csrf(){
		global $_SESSION;
		unset($_SESSION['csrf_key']);
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
	 * @return boolean
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
	 * @return boolean
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
	 * @return array
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
