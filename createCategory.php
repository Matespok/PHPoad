<?php
session_start();
if($_SESSION['role'] != 'A'){
  die("You're not authorized to do this.");
}

$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!isset($_POST['categoryName']) || trim($_POST['categoryName']) === '') {
  die("The name was not given.");
}

$name = trim($_POST['categoryName']);
$sqltext = "INSERT INTO forum_categories (name) VALUES (?)";

if ($stmt = $conn->prepare($sqltext)) {
  $stmt->bind_param('s', $name);

  if ($stmt->execute()) {
    echo "Forum category: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . " was created successfully";
  } else {
    echo "Error creating category: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Prepare failed: " . $conn->error;
}

$conn->close();
echo "<br><a href='index.php'>Go back to index</a>";
