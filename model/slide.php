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

  /**
   * function to add a new picture into the slide-pictures table
   */
    function add_new_picture($heading, $path, $status) {
        $str_sql = "INSERT into slide_pictures (picture_heading, picture_path, slide_status) values ('$heading', '$path', '$status')";
        return $this->query($str_sql);
    }

   /**
    * function to set sliders picture
    */
    function set_slide_picture($id){
      $str_sql = "UPDATE slide_pictures SET slide_status = 'on' WHERE picture_id = $id";
      return  $this->query($str_sql);
    }

    function update_picture($id, $heading, $path){
      $str_sql = "UPDATE slide_pictures SET picture_heading = '$heading' AND picture_path = '$path' WHERE picture_id = $id";
      return  $this->query($str_sql);
    }
}
