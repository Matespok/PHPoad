<?php

require_once __DIR__ . '/init.php';

$username = $_POST['username'] ?? '';
$password = password_hash($_POST['password'], PASSWORD_BCRYPT) ?? '';
$about_me = $_POST['about-me'] ?? '';

if (empty($username) || empty($password)) {
    die("You must enter username & password");
}

$db = Database::getConnection();
$stmt = $db->prepare("INSERT INTO users(name, password, about_me) VALUES (:username, :password, :about_me)");
$stmt->execute([
    'username' => $username,
    'password' => $password,
    'about_me' => $about_me,
]);
echo "<p>successfully created account. You can now <a href='loginQuery.php'>login.</a></p>";
