<?php

include_once('adb.php');

class Manager extends adb{

	function add_manager($name, $role, $about, $date_signed, $picture, $video_intro){
		$str_sql = "INSERT into manager(name, role, about, date_signed, picture, video_intro)
values ('$name', '$role', '$about', '$date_signed', '$picture', '$video_intro')";
		return $this->query($str_sql);
	}

	function delete_manager($manager_id){
        $str_sql = "DELETE from manager WHERE id=$manager_id";
        return $this->query($str_sql);
	}

	function find_manager($manager_id){
		$str_sql = "SELECT * from manager WHERE id=$manager_id LIMIT 0,1";
		if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
	}

	function all_managers(){
		$str_sql = "SELECT * from manager";
        if(!$this->query($str_sql)){
            return false;
        }
		return $this->fetch();
	}

	function edit_role($id, $role){
        $str_sql = "UPDATE manager set role = '$role' WHERE id = '$id";
        return $this->query($str_sql);
	}

	function edit_about($id, $about){
		$str_Sql = "UPDATE manager set about = '$about' WHERE id = '$id'";
		return $this->query($str_Sql);
	}

	function change_picture($id, $picture){
		$str_sql =  "UPDATE manager set picture = '$picture' WHERE id = '$id'";
		return $this->query($str_sql);
	}

	function change_video($id, $video_intro){
		$str_sql = "UPDATE manager set video_intro = '$video_intro' WHERE id = '$id'";
		return $this->query($str_sql);
	}


}
?>
