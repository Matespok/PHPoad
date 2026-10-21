<?php

require_once __DIR__ . '/init.php';

$forum_id = $_GET['id'];
$db = Database::getConnection();
$stmt = $db->prepare("SELECT * FROM topics WHERE forum_id = :forum_id");
$stmt->execute([
    'forum_id' => $forum_id,
]);

$resultForum = $stmt->fetchAll();
