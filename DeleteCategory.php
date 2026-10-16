<?php

$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sqltext = "DELETE FROM forum_categories WHERE id=?";


$id = $_GET['id'];

if (isset($_GET['id'])) {

  if ($stmt = $conn->prepare($sqltext)) {
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
      echo "success!";
    } else {
      echo "error deleting a category: " . $stmt->error;
    }
    $stmt->close();
  } else {
    echo "Prepare failed" . $conn->error;
  }
} else {
  echo "no id provided.";
}
echo "<br><a href='index.php'>Go back to index</a>";
