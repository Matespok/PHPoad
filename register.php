<link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">

<form action="register.php" method="post">
  <label for="username">username:</label>
  <input type="text" id="username" name="username">
  <label for="password">password:</label>
  <input type="password" name="password" id="password">
  <label for="about_me">about you(not mandatory):</label>
  <textarea id="about_me" name="about_me" rows="4" maxlength="255"></textarea>
  <input type="submit" value="Create account">
</form>

<?php

$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sqltext = "INSERT INTO users(name, created_at, about_me, password)
VALUES(?,NOW(),?,?)";
$username = $_POST['username'];
$passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
$aboutme = $_POST['about_me'];

try {
  if ($stmt = $conn->prepare($sqltext)) {
    $stmt->bind_param('sss', $username, $aboutme, $passwordHash);
    $stmt->execute();
  }
} catch (\Throwable $th) {
  echo "something went wrong";
  throw ($th);
}



$stmt->close();
$conn->close();


?>
