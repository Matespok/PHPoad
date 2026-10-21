<?php

require_once __DIR__ . '/init.php';

$db = Database::getConnection();
$stmt = $db->query("SELECT id, name FROM forum_categories");
$resultCategory = $stmt->fetchAll();

$stmt = $db->query("SELECT * FROM forums");
$resultForum = $stmt->fetchAll();
