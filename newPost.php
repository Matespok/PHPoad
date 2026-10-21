<?php

require_once __DIR__ . '/init.php';
if (!isset($_SESSION['user_id'])) {
    die("you must <a href='login.php'>LOG IN</a>");
}
$user_id = $_SESSION['user_id'];
$topic_id = $_GET['topic_id'];
$content = trim($_POST['content']);

$db = Database::getConnection();
$stmt = $db->prepare("INSERT INTO posts (user_id, topic_id, text) VALUES (:user_id, :topic_id, :content)");
$stmt->execute([
    'user_id' => $user_id,
    'topic_id' => $topic_id,
    'content' => $content,
]);

echo "Post created succesfully! ";
echo "<br><a href='viewTopic.php?id={$topic_id}'>Go back to topic</a>";
