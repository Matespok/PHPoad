<?php

require_once __DIR__ . '/init.php';
if (!isset($_SESSION['user_id'])) {
    die("you must <a href='login.php'>LOG IN</a>");
}
$replied_to = $_GET['respond-to'];
$user_id = $_SESSION['user_id'];
$content = $_POST["response"];
$topic_id = $_GET['topic_id'];

$db = Database::getConnection();
$stmt = $db->prepare("INSERT INTO posts (replied_to, user_id, text, topic_id) VALUES (:replied_to, :user_id, :content, :topic_id)");
$stmt->execute([
    'replied_to' => $replied_to,
    'user_id' => $user_id,
    'content' => $content,
    'topic_id' => $topic_id,
]);
echo "Responded succesfully! ";
echo "<br><a href='viewTopic.php?id={$topic_id}'>Go back to topic</a>";
