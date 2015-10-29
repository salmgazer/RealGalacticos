<?php

include_once('adb.php');

class Admin extends adb{

	function addAdmin($name, $username, $admin_password){
		$str_sql = "insert into admin (username, name, admin_password) values
		 ('$username', '$name', '$admin_password')";
		return $this->query($str_sql);
	}

	function confirmAdmin($username, $admin_password){
		$str_sql = "select * from admin where username = '$username' AND admin_password = '$admin_password' limit 0,1";
		if (!$this->query($str_sql)) {
			return false;
		}
		return $this->fetch();
	}

	function updateAdmin($username, $admin_password, $new_username, $new_admin_password){
		$str_sql = "update admin set username = '$new_username', admin_password = '$new_admin_password'
		WHERE username = '$username' AND admin_password = '$admin_password'";
		return $this->query($str_sql);
	}
}

?>
