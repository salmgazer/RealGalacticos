<?php
include_once('connect.php');
include_once('model/manager.php');
include_once('model/player.php');
include_once('model/news.php');
include_once('model/matches.php');


class Master{

    //instance of connect class
    var $conn;
    //instance of manager
    var $manager;
    //instance of player
    var $player;
    //instance of news
    var $news;
    //instance of match
    var $match;
    //dbc
    var $dbc;


	function __construct(){
		$this->conn = new Connect();
		$this->manager = new Manager();
		if($this->conn->connect_server()){
			if($this->conn->pickdatabase()){
				$this->dbc = $this->conn->dbc;
			}else{
			 include('./includes/database_selection_error.php');
			   exit();
			    }
		}else{
		 include('./includes/database_connection_error.php');
		  exit();
		   }
		$this->manager = new Manager();
		$this->player = new Player();
		$this->news = new News();
		$this->match = new Match();
	}

    /*Start of Manager*/
	function add_manager($name, $role, $about, $date_signed, $picture, $video_intro){
		$the_date = date($date_signed);
		if($this->manager->add_manager($this->dbc, $name, $role, $about, $the_date, $picture, $video_intro)){
			//alert manager has been added.
			echo $name." has been added";
		}else{
			//alert manager was not added
			echo $name." has not been aded";
		}
	}

	function remove_manager($id){
		if($this->manager->delete_manager($this->dbc, $id) == true){
			echo "manager with id ".$id." deleted";
		}else{ echo "delete failed"; }
	}

	function find_manager($id){
		if ($this->manager->find_manager($this->dbc, $id) == true) {
			echo $this->manager->manager_details['name'];
		}else{
		   echo "manager not found";
		}
	}

	function all_managers(){
		if ($this->manager->all_managers($this->dbc) == false) {
			echo "No Managers";
		}else{
			while ($managers = mysqli_fetch_assoc($this->manager->manager_query)) {
				echo $managers['name'].'<br>';
			}
		}
	}
	/*End of Manager*/


	/*Start of Player*/
	function add_player($name, $birth, $division, $position, $about, $date_signed, $picture){
		$signed = date($date_signed);
		$dbirth = date($birth);
		if ($this->player->add_player($this->dbc, $name, $dbirth, $division, $position, $about, $signed, $picture)) {
			//alert player has been added
			echo $name." has been added";
		}else{ echo $name." has not been added"; }
	}

	function remove_player($id){
		if ($this->player->delete_player($this->dbc, $id) == true) {
			echo "Player with id ".$id." deleted";
		}else{ echo "delete failed"; }
	}

	function find_player($id){
		if ($this->player->find_player($this->dbc, $id) == true) {
			echo $this->player->player_details['name'];
		}else{ echo "Player not found"; }
	}

	function all_players(){
		if ($this->player->all_players($this->dbc) == false) {
			echo "No players";
		}else{
			while($players = mysqli_fetch_assoc($this->player->player_query)){
				echo $players['name'].'<br>';
			}
		}
	}

	/*End of Player*/

	/*Start of news*/
	function add_news($thumbnail, $picture1, $picture2, $news_date, $author, $headline, $content){
		$dated = date($news_date);
		if ($this->news->add_news($this->dbc, $thumbnail, $picture1, $picture2, $dated, $author, $headline, $content) == true) {
			echo "News has been added";
		}else{
			echo "News was not added";
		}
	}

	function remove_news($id){
		if ($this->news->delete_news($this->dbc, $id) == true) {
			echo "news has been deleted";
		}else{ echo "new has not been deleted"; }
	}

	function find_news($id){
		if ($this->news->find_news($this->dbc, $id) == true) {
			echo $this->news->news_details['thumbnail'];
		}else{ echo "news not found"; }
	}

	function all_news(){
		if (!$this->news->all_news($this->dbc) == true) {
			echo "No news";
		}else{
			while ($newss = mysqli_fetch_assoc($this->news->news_query)) {
				echo $newss['thumbnail'].'<br>';
			}
		}
	}

	/*End of news*/


	/*Start of Matches*/

	function add_match($category, $venue, $venue_status, $score, $opponent_score, $match_date, $man_of_the_match){
		$dated = date($match_date);
		if ($this->match->add_match($this->dbc, $category, $venue, $venue_status, $score, $opponent_score, $dated, $man_of_the_match) == true) {
			echo "Match has been added";
		}else{ echo "Match has not been added"; }
	}

	function remove_match($id){
		if ($this->match->delete_match($this->dbc, $id) == 0) {
			echo "Match has been deleted";
		}else{ echo "Match has not been deleted"; }
	}

	function find_match(){
		if ($this->match->find_match($this->dbc, $id) ==  true) {
			echo $this->match->match_details['venue'];
		}else{ echo "Match not found"; }
	}

	function all_matches(){
		if (!$this->news->all_matches($this->dbc) == true) {
			echo "No matches yet";
		}else{
			while ($matches = mysqli_fetch_assoc($this->match->match_query)) {
				echo $matches['venue'].'<br>';
			}
		}
	}


	function __destruct(){

	}

}

?>
