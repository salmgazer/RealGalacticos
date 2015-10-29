<?php

include_once('adb.php');

class video extends adb{

    function add_video($title, $video_date, $description, $youtube_url){
        $str_sql = "INSERT into videos (title, video_date, description, youtube_url) values ('$title', '$video_date', '$description', '$youtube_url')";
        return $this->query($str_sql);
    }

    function get_latest_video(){
        $str_sql = "SELECT * from videos ORDER BY video_date limit 1";
        if(!$this->query($str_sql)){
            return false;
        }

        return $this->fetch();
    }

    function all_videos(){
        $str_sql = "SELECT * from videos";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function get_video($id){
        $str_sql = "SELECT * from videos where id = '$id' limit 1";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }
}
