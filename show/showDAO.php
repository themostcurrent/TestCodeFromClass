<?php
class ShowDAO {
  function getAllShows(){
    require_once('./utilities/connection.php');
    require_once('./show/show.php');

    $sql = "SELECT showId, showName, rating, analysis, userId FROM shows_table.shows";
    $result = $conn->query($sql);

    $shows;
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $show = new show();

            $show->setShowId($row["showId"]);
            $show->setShowName($row["showName"]);
            $show->setRating($row["rating"]);
            $show->setAnalysis($row["analysis"]);
            $show->setUserId($row["userId"]);
            $shows[$index] = $show;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    } 
    $conn->close();

    return $shows;
  }
}//endclass
?>

