<?php
/**
 * Created by PhpStorm.
 * User: Sal
 * Modified: Ali
 * Date: 5/7/2015
 * Time: 9:42 AM
 */

include_once('adb.php');

class slide extends adb{


  /**
   * function to get only picture for main slider
   * @return array|bool
   */
  function get_slide_picture(){
      $str_sql = "SELECT picture_heading, picture_path from slide_pictures where slide_status = 'on'";
      if(!$this->query($str_sql)){
          return false;
      }
      return $this->fetch();
  }
    /*
    function get_slides(){
        $str_sql = "SELECT * from slide where slide_status = 'on'";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }
    */
    function add_slide($firstline, $secondline, $picture){
        $str_sql = "INSERT into slide (firstline, secondline, picture) values ('$firstline', '$secondline', '$picture')";
        return $this->query($str_sql);
    }

   /**
    * function to select slider picture
    */
    function on($id){
      $str_sql = "UPDATE slide SET slide-"
    }

    function update($firstline, $seondline, $picture){

    }
}
