<?php
/**
 * Created by PhpStorm.
 * User: Sal
 * Date: 6/6/2015
 * Time: 3:46 PM
 */

include "adb.php";

class Matchgallery extends adb{

    function addMatchgallery($gallery_name, $match_date, $description, $picture){
        $str_sql = "insert into matchgallery (galleryname, match_date, description, picture) VALUES ('$gallery_name', '$match_date', '$description', '$picture')";
        return $this->query($str_sql);

    }

    function getGalleries(){
        $str_sql = "select * from matchgallery";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function listGallery(){
        $str_sql = "select gallery_id, galleryname from matchgallery order by match_date desc limit 0,10";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function removeMatchgallery($matchgallery_id){
        $str_sql = "delete from matchgallery where matchgallery_id = '$matchgallery_id'";
        return $this->query($str_sql);
    }

    function addPicture($matchgallery_id, $picture, $match_date){
        $str_sql = "insert into matchpicture (matchgallery_id, picture, match_date) VALUES ($matchgallery_id, '$picture', '$match_date')";
        return $this->query($str_sql);
    }

    function editMatchgallery($id, $matchgallery_id, $gallery_name, $match_date){
        $str_sql = "update matchpicture set matchgallery_id = '$matchgallery_id', galleryname = '$gallery_name', match_date = '$match_date' where id = $id";
        return $this->query($str_sql);
    }

    function allMatchgalleryPics($matchgallery_id){
        $str_sql = "select * from matchpicture where matchgallery_id = $matchgallery_id order by id";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }
}
