<?php

$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqltext = "SELECT * FROM topics WHERE forum_id=?";
$forumid = $_GET['id'];
if ($stmt = $conn->prepare($sqltext)) {
    $stmt->bind_param('i', $forumid);
    $stmt->execute();
    $result = $stmt->get_result();
}
$stmt->close();
$conn->close();
