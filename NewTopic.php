<?php

$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$forumId = $_GET['forumId'];
$conn->close(); ?>
<form action="CreateTopic.php">
  <label for="name">Topic name</label>
  <input type="text" id="name" name="name">
  <br>
  <input type="submit" value="create">
</form>
