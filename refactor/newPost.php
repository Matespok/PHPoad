<?php 
session_start();
$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['user_id'])) {
  die("you must <a href='login.php'>LOG IN</a>");
}
$user_id = $_SESSION['user_id'];
$topic_id = $_GET['topic_id'];
$content = $_POST['content'];

$sqltext = "INSERT INTO posts (user_id, topic_id, text) VALUES (?,?,?)";
if ($stmt = $conn->prepare($sqltext)) {
  $stmt->bind_param('iis', $user_id, $topic_id, $content);

  if ($stmt->execute()) {
    echo "Post created succesfully! ";
    echo "<br><a href='viewTopic.php?id={$topic_id}'>Go back to topic</a>";
  } else {
    echo "Error creating post: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Prepare failed: " . $conn->error;
}

$conn->close();
