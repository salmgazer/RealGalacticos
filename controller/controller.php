<?php
/**
 * Created by PhpStorm.
 * User: Sal
 * Date: 5/7/2015
 * Time: 8:23 AM
 */

if(!isset($_REQUEST['cmd'])){
    echo '{"result": 0, "message": "unknown command"}';
    exit();
}
//store command here
$cmd = $_REQUEST['cmd'];

switch($cmd){
    case 1:
        next_match();
        break;
    case 2:
        add_manager();
        break;
    case 3:
        get_players_byDivision();
        break;
    case 4:
        get_slide_picture();
        break;
    case 5:
        get_latest_news();
        break;
    case 6:
        get_latest_video();
        break;
    case 7:
        sendMessage();
        break;
    case 8:
        getMatchGallery();
        break;
    case 9:
        getTrainingGallery();
        break;
    case 10:
        MatchGallery();
        break;
    case 11:
        TrainingGallery();
        break;
    case 12:
        upcomingmatches();
        break;
    case 13:
        latestmatches();
        break;
    case 14:
        $num = $_REQUEST['items'];
        get_latest_news($num);
        break;
    default:
        echo '{"result": 0, "message": "unknown command"}';
        break;
}

/**
 * function to pass latest news items to js
 */
 function get_latest_news($num) {
   include_once('../model/news.php');
   $news = new news();
   $data = $news->get_latest_news($num);
   if(!$row) {
     echo '{"result": 0, "message": "No news available"}';
     return;
   }

   echo '{"result": 1, "news": [';
     while($row) {
       echo json_encode($row);
       $row = $news->fetch();
       if ($row) {
         echo ',';
       }
     }
  echo ']}';
  return;
 }

function next_match(){
    include('../model/matches.php');
    $match = new Match();
    $row = $match->next_match();
    if(!$row){
        echo '{"result": 0, "message": "No upcoming matches"}';
        return;
    }
    echo '{"result": 1, "thematch": [';
    echo json_encode($row);
    echo "]}";
    return;

}

function get_players_byDivision(){
    include('../model/player.php');
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

function add_manager(){
    include('../model/manager.php');
    $manager = new Manager();
    $name = $_REQUEST['name'];
    $role = $_REQUEST['role'];
    $about = $_REQUEST['about'];
    $date_signed = $_REQUEST['the_date'];
    $picture = $_REQUEST['picture'];
    $video_intro = $_REQUEST['video_intro'];
    $the_date = date($date_signed);
    if($manager->add_manager($name, $role, $about, $the_date, $picture, $video_intro)){
        //alert manager has been added.
        echo '{"result": 1, "message": "'.$name.' has been added."}';
        return;
    }
    echo '{"result": 0, "message": "'.$name.' has not been added."}';
    return;
}

function get_slide_picture(){
    include('../model/slide.php');
    $slide = new slide();
    $row = $slide->get_slide_picture();
    if(!$row){
        echo '{"result":0, "message": "No slides"}';
        return;
    }

    echo '{"result": 1, "slide": ['.json_encode($row).']}';
    /*while($row){
        echo json_encode($row);
        $row = $slide->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";*/

}

function get_latest_news(){
    include('../model/news.php');
    $news = new news();
    $row = $news->latest_news();
    if(!$news){
        echo '{"result": 0, "message": "No news"}';
        return;
    }

    echo '{"result": 1, "news": [';
    while($row){
        echo json_encode($row);
        $row = $news->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}

function get_latest_video(){
    include('../model/videos.php');
    $video = new video();
    $row = $video->get_latest_video();
    if(!$row){
        echo '{"result": 0, "message": "No videos"}';
        return;
    }

    echo '{"result": 1, "video": [';
    echo json_encode($row);
    echo "]}";
    return;
}

function sendMessage(){
    $name = $_REQUEST['name'];
    $receipeint = "realgalacticossportingclub@gmail.com";
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    $email = $_REQUEST['email'];
    $myheader = 'Message from '.$name.'. ('.$email.')';

    if(!mail($receipeint, $subject, $message, $myheader)){
        echo '{"result":0, "message": "Message not sent, try again"}';
        return;
    }

    echo '{"result":1, "message": "Message sent"}';
    return;
}

function getMatchGallery(){
    include_once "../model/matchgallery.php";
    $matchgallery_id = $_REQUEST['mgid'];
    $gallery = new Matchgallery();
    $row = $gallery->allMatchgalleryPics($matchgallery_id);
    if(!$row){
        echo '{"result": 0, "message": "No pictures yet"}';
        return;
    }
    echo '{"result": 1, "pictures": [';
    while($row){
        echo json_encode($row);
        $row = $gallery->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}

function getTrainingGallery(){
    include_once "../model/traininggallery.php";
    $traininggallery_id = $_REQUEST['tgid'];
    $gallery = new Traininggallery();
    $row = $gallery->allTraininggalleryPics($traininggallery_id);
    if(!$row){
        echo '{"result": 0, "message": "No pictures yet"}';
        return;
    }
    echo '{"result": 1, "pictures": [';
    while($row){
        echo json_encode($row);
        $row = $gallery->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}

function MatchGallery(){
    include_once "../model/matchgallery.php";
    $gallery = new Matchgallery();
    $row = $gallery->getGalleries();
    if(!$row){
        echo '{"result": 0, "message": "No Match gallery yet"}';
        return;
    }
    echo '{"result": 1, "galleries": [';
    while($row){
        echo json_encode($row);
        $row = $gallery->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}

function TrainingGallery(){
    include_once "../model/traininggallery.php";
    $galleries = new Traininggallery();
    $row = $galleries->getGalleries();
    if(!$row){
        echo '{"result": 0, "message": "No Training gallery yet"}';
        return;
    }
    echo '{"result": 1, "galleries": [';
    while($row){
        echo json_encode($row);
        $row = $galleries->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}

function upcomingmatches(){
    include_once "../model/matches.php";
    $matches = new Match();

    $row = $matches->upcomingmatches();
    if(!$row){
        echo '{"result": 0, "message": "No upcoming Matches"}';
        return;
    }
    echo '{"result": 1, "upcomingmatches": [';
    while($row){
        echo json_encode($row);
        $row = $matches->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}

function latestmatches(){
    include_once "../model/matches.php";
    $matches = new Match();
    $num_matches = $_REQUEST['num_matches'];
    $row = $matches->latestmatches($num_matches);
    if(!$row){
        echo '{"result": 0, "message": "No latest Matches"}';
        return;
    }
    echo '{"result": 1, "latestmatches": [';
    while($row){
        echo json_encode($row);
        $row = $matches->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
    return;
}
