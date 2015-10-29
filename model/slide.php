<?php
/**
 * Created by PhpStorm.
 * User: Sal
 * Date: 5/7/2015
 * Time: 9:42 AM
 */

include_once('adb.php');

class slide extends adb{

    function get_slides(){
        $str_sql = "SELECT * from slide where slide_status = 'on' order by slide_position ASC";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

    function add_slide($firstline, $secondline, $picture){
        $str_sql = "INSERT into slide (firstline, secondline, picture) values ('$firstline', '$secondline', '$picture')";
        return $this->query($str_sql);
    }

    function off($id){

    }

    function on($id){

    }

    function change_position($id, $position){

    }

    function update($firstline, $seondline, $picture){

    }
}
