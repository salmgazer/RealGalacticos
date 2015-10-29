<?php session_start();
/**
 * Created by PhpStorm.
 * User: Sal
 * Date: 5/12/2015
 * Time: 10:46 AM
 */
if(!isset($_REQUEST['cmd'])){
    echo '{"result":0, "message": "unknown command"}';
    exit();
}

$cmd = $_REQUEST['cmd'];
switch($cmd) {
    case 1:
        addPlayer();
        break;
    case 2:
        addSlide();
        break;
    case 3:
        add_new_match();
        break;
    case 4:
        matchList();
        break;
    case 5:
        trainingList();
        break;
    case 6:
        addNewMatchGallery();
        break;
    case 7:
        addNewTrainingGallery();
        break;
    case 8:
        admineditmatches();
        break;
    case 9:
        updatematch();
        break;
    case 10:
        get_players_byDivision();
        break;
    case 11:
        updatePlayer();
        break;
    case 12:
        loginAdmin();
        break;
    case 13:
        adminLogout();
        break;
    case 14:
        confirmAdmin();
        break;
    default:
        echo '{"result":0, "message": "unknown command"}';
        break;
}


function loginAdmin(){
    include "../../model/admin.php";

    $username = $_REQUEST['username'];
    $admin_password = $_REQUEST['admin_password'];

    $admin = new Admin();
    $row = $admin->confirmAdmin($username, $admin_password);
    if(!$row){
        echo '{"result": 0, "message": "Wrong details, try again"}';
        return;
    }
    echo '{"result": 1, "message": "You have successfully logged in"}';
    $_SESSION['username'] = $row['username'];
    $_SESSION['admin_password'] = $row['admin_password'];
    return;
}

function adminLogout(){
    if(session_destroy()){
        echo '{"result": 1, "message": "You have logged out successfully"}';
        return;
    }
    echo '"result": 0, "message": "Logout was unsuccessful, try again"}';
    return;
}

function updateAdmin($username, $admin_password, $new_username, $new_admin_password){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }

    include "../../model/admin.php";
    $username = $_REQUEST['username'];
    $admin_password = $_REQUEST['admin_password'];
    $new_username = $_REQUEST['new_username'];
    $new_admin_password = $_REQUEST['new_admin_password'];

    $admin = new Admin();
    if (!$admin->updateAdmin($username, $admin_password, $new_username, $new_admin_password)) {
        echo '{"result": 0, "message": "Admin details not updated, try again"}';
        return;
    }
    echo '{"result": 1, "message": "Admin details successfully updated"}';
    return;
}

function confirmAdmin(){
    $username = $_SESSION['username'];
    $admin_password = $_SESSION['admin_password'];

    include "../../model/admin.php";

    $admin = new Admin();
    $row = $admin->confirmAdmin($username, $admin_password);
    if(!$row){
        echo '{"result": 0, "message": "You need to sign in."}';
        return;
    }
    echo '{"result": 1, "message": "You have successfully logged in"}';
    return;
}

function matchList(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }

    include "../../model/matchgallery.php";

    $matchgallery = new Matchgallery();
    $row = $matchgallery->listGallery();
    if(!$row){
        echo '{"result": 0, "message": "No match galleries were found"}';
        return;
    }
    echo '{"result": 1, "matchlist":[';
    while($row){
        echo json_encode($row);
        $row = $matchgallery->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}

function trainingList(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }
    include "../../model/traininggallery.php";

    $traininggallery =  new Traininggallery();
    $row = $traininggallery->listGallery();
    if(!$row){
        echo '{"result": 0, "message": "No training galleries were found"}';
        return;
    }
    echo '{"result": 1, "traininglist": [';
    while($row){
        echo json_encode($row);
        $row = $traininggallery->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}


function admineditmatches(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }
   /* $match_id = $_REQUEST['id'];
    $score = $_REQUEST['score'];
    $opponent_score = $_REQUEST['opponent_score'];
*/
    include "../../model/matches.php";
    $match = new Match();
    $row = $match->admineditmatches(20);
    if(!$row){
        echo '{"result": 0, "message": "No matches to be edited, add old matches"}';
        return;
    }
    echo '{"result": 1, "tenlatematches": [';
    while($row){
        echo json_encode($row);
        $row = $match->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}

function updatematch(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }

    $match_id = $_REQUEST['match_id'];
    $score = $_REQUEST['score'];
    $opponent_score = $_REQUEST['opponent_score'];
    $match_date = $_REQUEST['match_date'];

    include "../../model/matches.php";
    $match = new Match();
    if(!$match->updatematch($match_id, $score, $opponent_score, $match_date)){
        echo '{"result":0, "message": "Match not edited, try again"}';
        return;
    }
    echo '{"result":1, "message": "Match has been edited successfully"}';
    return;
}

function addPlayer(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }
    $name = $_REQUEST['name'];
    $birth = $_REQUEST['birth'];
    $division = $_REQUEST['division'];
    $position = $_REQUEST['position'];
    $picture = $_REQUEST['picture'];
    $about = $_REQUEST['about'];
    $signed = $_REQUEST['signed'];

    include "../../model/player.php";
    $player = new player();
    if(!$player->add_player($name,$birth,$division,$position,$about,$signed,$picture)){
        echo '{"result": 0, "message": "problem adding player, try again later"}';
        return;
    }
    echo '{"result": 0, "message": "'.$name.' has been added successfully"}';
    return;
}

function get_players_byDivision(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }

    include('../../model/player.php');
    $player = new Player();
    $division = $_REQUEST['division'];
    $row = $player->all_players_byDivision($division);
    if (!$row) {
        echo '{"result": 0, "message": "No players in division ' . $division . '"}';
        return;
    }
    echo '{"result": 1, "players": [';
    while ($row) {
        echo json_encode($row);
        $row = $player->fetch();
        if ($row) {
            echo ",";
        }

    }
    echo "]}";
    return;
}

function updatePlayer(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }

    include('../../model/player.php');
    $player = new Player();
    $goals = $_REQUEST['goals'];
    $num_matches = $_REQUEST['num_matches'];
    $id = $_REQUEST['player_id'];

    if(!$player->updatePlayer($num_matches, $goals, $id)){
        echo '{"result": 0, "message": "Player info has been NOT been updated, try again"}';
        return;
    }
    echo '{"result": 0, "message": "Player info has be been updated successfully"}';
    return;
}

function addSlide(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }

    $firstline = $_REQUEST['firstline'];
    $secondline = $_REQUEST['secondline'];
    $picture = $_REQUEST['picture'];

    include "../../model/slide.php";
    $slide = new slide();
    if(!$slide->add_slide($firstline, $secondline, $picture)){
        echo '{"result": 0, "message": "Problem adding slide"}';
        return;
    }
    echo '{"result":1, "message": "slide has been added"}';
    return;
}

function add_new_match(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }

    $category = $_REQUEST['category'];
    $match_date = $_REQUEST['match_date'];
    $opponent = $_REQUEST['opponent'];
    $initials = $_REQUEST['initials'];
    $venue = $_REQUEST['venue'];
    $venue_status = $_REQUEST['venue_status'];
    $description = $_REQUEST['description'];
    $division = $_REQUEST['division'];

    include "../../model/matches.php";
    $match  =  new Match();
    if(!$match->add_match($category, $venue, $venue_status, $match_date, $opponent, $initials, $description, $division)){
        echo '{"result": 0, "message": "Unable to add match against '.$opponent.', try again"}';
        return;
    }
    echo '{"result": 1, "message": "Match against '.$opponent.' has been added successfully"}';
    return;

}

function addNewMatchGallery(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }

    $galleryname = $_REQUEST['galleryname'];
    $match_date = date($_REQUEST['match_date']);
    $description = $_REQUEST['description'];
    $picture = $_REQUEST['picture'];

    include "../../model/matchgallery.php";
    $matchgallery = new Matchgallery();
    if(!$matchgallery->addMatchgallery($galleryname, $match_date, $description, $picture)){
        echo '{"result": 0, "message": "Could not add new match gallery, try again"}';
        return;
    }
    echo '{"result": 0, "message": "'.$galleryname.' has been added"}';
    return;
}

function addNewTrainingGallery(){
    if(!isset($_SESSION['username']) || !isset($_SESSION['admin_password'])){
        header("index.html");
    }

    $galleryname = $_REQUEST['galleryname'];
    $training_date = date($_REQUEST['training_date']);
    $description = $_REQUEST['description'];
    $picture = $_REQUEST['picture'];

    include "../../model/traininggallery.php";
    $traininggallery = new Traininggallery();
    if(!$traininggallery->addTraininggallery($galleryname, $training_date, $description, $picture)){
        echo '{"result": 0, "message": "Could not add new match gallery, try again"}';
        return;
    }
    echo '{"result": 0, "message": "'.$galleryname.' has been added"}';
    return;
}
