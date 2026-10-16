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

if (!isset($_POST['name']) || trim($_POST['name']) === '') {
  die("The name was not given.");
}
$forum_id = $_GET['id'];
$name = trim($_POST['name']);
$user_id = $_SESSION['user_id'];

$sqltext = "INSERT INTO topics (name, user_id, forum_id) VALUES (?,?,?)";
if ($stmt = $conn->prepare($sqltext)) {
  $stmt->bind_param('sii', $name, $user_id, $forum_id);

  if ($stmt->execute()) {
    echo "topic: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . " was created successfully";
  } else {
    echo "Error creating topic: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Prepare failed: " . $conn->error;
}

$conn->close();
echo "<br><a href='viewForum.php?id={$forum_id}'>Go back to forum</a>";
