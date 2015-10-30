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
    function add_news($headline, $picture_path, $info) {
    	$str_sql = "INSERT INTO team_news (headline, picture_path, news_info) VALUES ('$headline', '$picture', '$path')";
    	return $this->query($str_sql);
    }

    /**
     * function to find a news item
     */
    function get_news_item($id) {
    	$str_sql = "SELECT * from team_news WHERE id=$id LIMIT 0";
    	if(!$this->query($str_sql)){
            return false;
        }
    	return $this->fetch();
    }

    /**
     * function to get all news item
     */
    function get_all_news() {
    	$str_sql = "SELECT * from team_news ORDER BY date_time DESC";
    	if(!$this->query($str_sql)){
            return false;
        }
    	return $this->fetch();
    }

    /**
     * function to update news item
     */
     function update_news_item($id, $headline, $path, $info) {
       $str_sql = "UPDATE team_news SET headline = '$headline', picture_path = '$path', news_info = '$info' WHERE id = '$id'";
       return $this->query($str_sql);
     }

    /**
     * function to get x latest news iitem
     */
    function get_latest_news($number) {
        $str_sql = "SELECT * from team_news order by date_time desc limit $number";
        if(!$this->query($str_sql)){
            return false;
        }
        return $this->fetch();
    }

}
?>
