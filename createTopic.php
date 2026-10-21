<?php

require_once __DIR__ . '/init.php';

if ($_SESSION['role'] != 'A') {
    die("You're not authorized to do this action");
}

if (!isset($_POST['name']) || trim($_POST['name']) === '') {
    die("The name was not given.");
}
$forum_id = $_GET['id'];
$name = trim($_POST['name']);
$user_id = $_SESSION['user_id'];

$db = Database::getConnection();

$stmt = $db->prepare("INSERT INTO topics (name, user_id, forum_id) VALUES (:name, :user_id, :forum_id)");
$stmt->execute([
    'name' => $name,
    'user_id' => $user_id,
    'forum_id' => $forum_id,
]);
$topicId = $db->lastInsertId();
echo "<p>topic has been created successfully. <a href='viewTopic.php?id={$topicId}'>Go to topic</a></p>";
