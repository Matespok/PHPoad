<?php

require_once __DIR__ . '/init.php';

$username = trim($_POST['username']);
$db = Database::getConnection();
$stmt = $db->prepare("SELECT id, role, password FROM users WHERE name = :username");
$stmt->execute([
    'username' => $username,
]);
$user = $stmt->fetch();
if ($user != null) {
    if (password_verify($_POST["password"], $user['password'])) {
        echo "successfully logged in -> go to <a href='index.php'>index</a>";
        $_SESSION["user_id"] = $user['id'];
        $_SESSION["role"] = $user['role'];
    } else {
        require_once 'loginQuery.php';
        echo "<p>wrong password</p>";
    }
} else {
    require_once 'loginQuery.php';
    echo "<p>user with this username has not been found</p>";

}
