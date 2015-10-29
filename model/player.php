<?php

include_once('adb.php');

class Player extends adb{

	function add_player($name, $birth, $division, $position, $about, $signed, $picture){
		$str_sql = "INSERT into player (name, date_of_birth, current_division, current_position, about,
			date_signed, picture) values ('$name', '$birth', '$division', '$position', '$about', '$signed', '$picture')";
		return $this->query($str_sql);
	}

	function delete_player($player_id){
		$str_sql = "DELETE from player WHERE id=$player_id";
        return $this->query($str_sql);
	}

	function find_player($player_id){
		$str_sql = "SELECT * from player WHERE id=$player_id LIMIT 0,1";
		if(!$this->query($str_sql)){
            return false;
        }
		return $this->fetch();
	}

	function all_players(){
		$str_sql = "SELECT * from player ORDER BY current_division DESC";
		if(!$this->query($str_sql)){
            return false;
        }
		return $this->fetch();
	}

    function all_players_byDivision($division){
        $str_sql = "SELECT * from player where current_division = '$division' order by id";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function updatePlayer($num_matches, $goals, $player_id){
        $str_sql = "update player set goals = $goals, num_matches = $num_matches where id = $player_id";
        return $this->query($str_sql);
    }

}

/*$player = new Player();
$row = $player->all_players_byDivision(15);
echo "UNDER 15<br>";
while($row){
    echo $row['picture']."<br>";
    $row = $player->fetch();
}*/
?>
