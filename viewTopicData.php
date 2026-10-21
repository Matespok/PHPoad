<?php

require_once __DIR__ . '/init.php';
$db = Database::getConnection();
$stmt = $db->prepare("SELECT posts.id AS post_id, posts.text, posts.replied_to, users.name AS username 
                    FROM posts 
                    INNER JOIN users ON posts.user_id=users.id WHERE topic_id = :topic_id");
$topic_id = $_GET['id'];
$stmt->execute([
    'topic_id' => $topic_id,
]);
$result = $stmt->fetchAll();
