<?php
require_once('./show/showDAO.php');

class Show implements \JsonSerializable {
  // Properties
  private $show_id;
  private $showName;
  private $rating;
  private $analysis;
  private $user_id;

  // Methods
  function __construct() {
  }
  function getShowId(){
    return $this->show_id;
  }
  function setShowId($show_id){
    $this->show_id = $show_id;
  }

  function getShowName() {
    return $this->showName;
  }
  function setShowName($showName){
    $this->showName = $showName;
  }

  function getRating() {
    return $this->rating;
  }
  function setRating($rating){
    $this->rating = $rating;
  }

  function getAnalysis() {
    return $this->analysis;
  }
  function setAnalysis($analysis){
    $this->analysis = $analysis;
  }

  function setUserId($user_id){
    $this->user_id = $user_id;
  }
  function getUserId($user_id){
    return $this->$user_id;
  }
 
  function getMyShows($user_id){
    $showDAO = new showDAO();
    return $showDAO->getShowsByUserId($user_id);
  }

  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }
  function createShow(){
    $showDAO = new showDAO();
    $showDAO->createShow($this);
  }  
  function deleteShow($user_id,$show_id){
    $showDAO = new showDAO();
    $showDAO->deleteShow($user_id,$show_id);
  }



}
?>