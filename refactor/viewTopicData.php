<?php

$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sqltext = "SELECT posts.text, posts.replied_to, users.name AS username FROM posts INNER JOIN users ON posts.user_id=users.id WHERE topic_id = ?";
$topic_id = $_GET['id'];
if ($stmt = $conn->prepare($sqltext)) {
  $stmt->bind_param('i', $topic_id);
  $stmt->execute();
  $result = $stmt->get_result();
}

$stmt->close();
$conn->close();
