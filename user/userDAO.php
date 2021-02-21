<?php
class UserDAO {
  function getUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT firstName, lastName, userName, userId FROM users WHERE userId =" . $user->getUserId();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["first_name"]);
        $user->setLastName($row["last_name"]);
        $user->setUsername($row["username"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function checkLogin($passedInUsername, $passedInPassword){
    require_once('./utilities/connection.php');
    $user_id = 0;
    $sql = "SELECT userId FROM users WHERE userName = '" . $passedInUsername . "' AND password = '" . hash("sha256", trim($passedInPassword)) . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"];
      }
    }
    else {
        echo "0 results";
    }
    $conn->close();
    return $user_id;
  }

  function createUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "INSERT INTO user_table.users
    (
    `userName`,
    `password`,
    `firstName`,
    `lastName`)
    VALUES
    ('" . $user->getUsername() . "',
    '" . $user->getPassword() . "',
    '" . $user->getFirstName() . "',
    '" . $user->getLastName() . "'
    );";

    if ($conn->query($sql) === TRUE) {
      echo "user created";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }

  function deleteUser($passedInUsername){
    require_once('./utilities/connection.php');
    
    $sql = "DELETE FROM user_table.users WHERE userName = '" . $passedInUsername . "';";

    if ($conn->query($sql) === TRUE) {
      echo "user deleted";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>