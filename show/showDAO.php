<?php
class ShowDAO {
  function getAllShows(){
    require_once('./utilities/connection.php');
    require_once('./show/show.php');

    $sql = "SELECT * FROM shows_table.shows";
    $result = $conn->query($sql);

    $shows;
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $show = new show();

            $user->setShowId($row["showId"]);
            $user->setShowName($row["showName"]);
            $user->setRating($row["rating"]);
            $user->setAnalysis($row["analysis"]);
            $user->setUserId($row["userId"]);
            $shows[$index] = $show;
            $index = $index + 1;
        }
    } 
    $conn->close();

    return $shows;
  }
}//endclass
?>

