<?php
/**
 * User: Sal
 * Modified: Ali
 * Date: 5/7/2015
 * Time: 9:42 AM
 */

include_once('adb.php');
class News extends adb{
  /**
   * Function to add new news item
   */
    function add_news($picture_path, $info){
    	$str_sql = "INSERT INTO team_news (picture_path, news_info) VALUES ('$picture', '$path')";
    	return $this->query($str_sql);
    }

    /**
     * function to delete a news item
     */
    function delete_news($id){
    	$str_sql = "DELETE from team_news WHERE id=$id";
        return $this->query($str_sql);
    }

    function find_news($id){
    	$str_sql = " SELECT * from news WHERE id=$id LIMIT 0,1";
    	if(!$this->query($str_sql)){
            return false;
        }
    	return $this->fetch();
    }

    function all_news(){
    	$str_sql = "SELECT * from news ORDER BY date_added DESC";
    	if(!$this->query($str_sql)){
            return false;
        }
    	return $this->fetch();
    }

    function latest_news(){
        $str_sql = "SELECT * from news order by news_date desc limit 2";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

}
?>
