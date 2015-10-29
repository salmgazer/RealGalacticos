<?php

function uploadPicture($directory, $inputname){
	$file_name = $_FILES["".$inputname.""]["name"];
	$file_type = $_FILES["".$inputname.""]["type"];
	$file_size = $_FILES["".$inputname.""]["size"];
	$file_temp = $_FILES["".$inputname.""]["tmp_name"];
	$file_error = $_FILES["".$inputname.""]["error"];

	//check any error
	if ($file_error > 0){
		die("Error uploading file! Code $file_error.");
	} else {
		if ($file_type == "images/jpeg" || $file_type == "images/jpg" || $file_type == "images/png"){				//Conditions for file
		if(!move_uploaded_file($file_temp, "".$directory."/".$file_name)){
			echo "picture was not uploaded, try again.";
			exit();
		}
		echo "Upload complete!";
		} else {
				die("File can only accept jpg/jpeg/png");
		}
	}
	return $file_name;
}

function addPlayer(){
	include_once "./model/player.php";
	$player = new Player();
	//upload picture here
	$picture = uploadPicture("./images/players", "player_picture");

	$name = $_REQUEST['name'];
    $birth = $_REQUEST['birth'];
    $division = $_REQUEST['division'];
    $position = $_REQUEST['position'];
    $about = $_REQUEST['about'];
    $signed = $_REQUEST['signed'];

    include "../../model/player.php";
    $player = new player();
    if(!$player->add_player($name,$birth,$division,$position,$about,$signed,$picture)){
        echo 'problem adding player, try again later';
        return;
    }
    echo ''.$name.' has been added successfully';
}


?>
