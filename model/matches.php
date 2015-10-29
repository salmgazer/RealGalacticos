<?php

include_once('adb.php');

class Match extends adb{

	function add_match($category, $venue, $venue_status, $match_date, $opponent, $initials, $description, $division){
		$str_sql = "INSERT into matches (category, venue, venue_status, match_date, opponent, opponent_initials, description, division)
			values ('$category', '$venue', '$venue_status', '$match_date', '$opponent', '$initials', '$description', '$division')";
		return $this->query($str_sql);
	}

	function delete_match($id){
		$str_sql = "DELETE from matches where id=$id";
        return $this->query($str_sql);
	}

	function find_match($id){
		$str_sql = "SELECT * from matches WHERE id=$id LIMIT 0,1";
		if(!$this->query($str_sql)){
            return false;
        }
		return $this->fetch();
	}

    function upcomingmatches(){
        $str_sql = "select * from matches where match_date >= now() order by match_date ASC limit 0, 3";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function latestmatches($number){
        $str_sql = "select * from matches where match_date <= now()order by match_date DESC limit 0, $number";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function admineditmatches($number){
        $str_sql = "select *  from matches order by match_date desc limit 0, $number";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

	function all_matches(){
		$str_sql = "SELECT * from matches ORDER BY date_added DESC";
		if(!$this->query($str_sql)){
			return false;
		}
		return $this->fetch();
	}

    function tenlatematches(){
        $str_sql = "SELECT * from matches where match_date <= now() order by match_date DESC limit 0, 10";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function tennextmatches(){
        $str_sql = "SELECT * from matches where match_date >= now() order by match_date ASC limit 0, 10";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function updatematch($match_id, $score, $opponent_score, $match_date){
        $str_sql = "update matches set score = $score, opponent_score = $opponent_score, match_date = '$match_date' where id = $match_id";
        return $this->query($str_sql);
    }

    function next_match(){
        $str_sql = "SELECT * from matches where match_date >= now() order by match_date asc limit 1";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

}

/*$match = new Match();
$row = $match->latestmatches(6);
if(!$row){
    echo " No";
}
else{
    while($row){
        echo $row['opponent'];
        $row = $match->fetch();
        echo "<br>";
    }
}*/


?>
