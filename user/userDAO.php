<?php
class UserDAO {
  function getUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT firstName, lastName, userName, userId FROM users WHERE userId =" . $user->getUserId();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["firstName"]);
        $user->setLastName($row["lastName"]);
        $user->setUsername($row["userName"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function checkLogin($passedinusername, $passedinpassword){
    require_once('./utilities/connection.php');
    $user_id = 0;
    $sql = "SELECT userId FROM users WHERE userName = '" . $passedinusername . "' AND password = '" . hash("sha256", trim($passedinpassword)) . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $user_id = $row["userId"];
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

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO user_table.users (`userName`,
    `password`,
    `firstName`,
    `lastName`) VALUES (?, ?, ?, ?)");

    $un = $user->getUsername();
    $pw = $user->getPassword();
    $fn = $user->getFirstName();
    $ln = $user->getLastName();

    $stmt->bind_param("ssss", $un, $pw, $fn, $ln);
    $stmt->execute();

    $stmt->close();
    $conn->close();
  }


  function deleteUser($un){
    require_once('./utilities/connection.php');
    
    $sql = "DELETE FROM user_table.users WHERE userName = '" . $un . "';";

    if ($conn->query($sql) === TRUE) {
      echo "user deleted";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }



// for username
function getUserN($user){
  require_once('./utilities/connection.php');
  
  $sql = "SELECT firstName, lastName, userName FROM user_table.users WHERE userName =" .  $user->getUserName();
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $user->setFirstName($row["firstName"]);
      $user->setLastName($row["lastName"]);
      $user->setUsername($row["userName"]);
  }
  } else {
      echo "0 results";
  }
  $conn->close();
}

// for firstname
function getUserFirstN($user){
  require_once('./utilities/connection.php');
  
  $sql = "SELECT firstName, lastName, userName FROM user_table.users WHERE firstName =" .  $user->getFirstName();
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $user->setFirstName($row["firstName"]);
      $user->setLastName($row["lastName"]);
      $user->setUsername($row["userName"]);
  }
  } else {
      echo "0 results";
  }
  $conn->close();
}

// for lastname
function getUserLastN($user){
  require_once('./utilities/connection.php');
  
  $sql = "SELECT firstName, lastName, userName FROM user_table.users WHERE lastName =" .  $user->getLastName();
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $user->setFirstName($row["firstName"]);
      $user->setLastName($row["lastName"]);
      $user->setUsername($row["userName"]);
  }
  } else {
      echo "0 results";
  }
  $conn->close();
}

}//endclass

?>

