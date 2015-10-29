<?php
/**
 * Created by PhpStorm.
 * User: Sal
 * Date: 6/6/2015
 * Time: 3:46 PM
 */

include "adb.php";

class Traininggallery extends adb{

    function addTraininggallery($gallery_name, $training_date, $description, $picture){
        $str_sql = "insert into traininggallery (galleryname, training_date, description, picture) VALUES ('$gallery_name', '$training_date', '$description', '$picture')";
        return $this->query($str_sql);

    }

    function getGalleries(){
        $str_sql = "select * from traininggallery";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function listGallery(){
        $str_sql = "select gallery_id, galleryname from traininggallery order by training_date desc limit 0,10";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function removeTraininggallery($traininggallery_id){
        $str_sql = "delete from traininggallery where traininggallery_id = '$traininggallery_id'";
        return $this->query($str_sql);
    }

    function addPicture($traininggallery_id, $picture, $match_date){
        $str_sql = "insert into trainingpicture (traininggallery_id, picture, match_date) VALUES ($traininggallery_id, '$picture', '$match_date')";
        return $this->query($str_sql);
    }

    function editTraininggallery($id, $traininggallery_id, $gallery_name, $training_date){
        $str_sql = "update trainingpicture set traininggallery_id = '$traininggallery_id', galleryname = '$gallery_name', training_date = '$training_date' where id = $id";
        return $this->query($str_sql);
    }

    function allTraininggalleryPics($traininggallery_id){
        $str_sql = "select * from trainingpicture where traininggallery_id = $traininggallery_id order by id";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }
}
