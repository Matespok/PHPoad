<?php

$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

try {
  $sqltext = "SELECT * FROM topics WHERE forum_id=?";
  $forumid = $_GET['id'];

  if ($stmt = $conn->prepare($sqltext)) {
    $stmt->bind_param('i', $forumid);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
      echo $row['name'];
    }
  }
  $stmt->close();
  $conn->close();
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}


echo "<a href='NewTopic.php?forumId=" . $forumid . "'>+</a>";
