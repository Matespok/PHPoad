<?php

require_once __DIR__ . '/init.php';

// <form method="post" action="register.php">
//       <label for="username">Username:</label>
//       <input type="text" id="username" name="username">
//       <br>
//       <label for="password">Password:</label>
//       <input type="password" id="password" name="password">
//       <br>
//       <label for="about-me">About you (not mandatory):</label>
//       <textarea name="about-me" id="about-me" rows="4" cols="30"></textarea>
//       <input type="submit" value="Register">
//     </form>
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$about_me = $_POST['about-me'];

$db = Database::getConnection();
$stmt = $db->prepare("INSERT INTO users(name, password, about_me) VALUES (:username, :password, :about_me)");
$stmt->execute([
    'username' => $username,
    'password' => $password,
    'about_me' => $about_me,
]);
echo "<p>successfully created account. You can now <a href='loginQuery.php'>login.</a></p>";
