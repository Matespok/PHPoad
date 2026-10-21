<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHPoad Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <main>
    <form method="post" action="login.php">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br>
      <input type="submit" value="login">
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

$sqltext = "SELECT id, role, password FROM users WHERE name=?";
$username = $_POST['username'];
try {
    if ($stmt = $conn->prepare($sqltext)) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $row = $stmt->get_result();
        $userData = $row->fetch_assoc();
        if (password_verify($_POST["password"], $userData['password'])) {
            echo "successfully logged in -> go to <a href='index.php'>index</a>";
            $_SESSION["user_id"] = $userData['id'];
            $_SESSION["role"] = $userData['role'];
        } else {
            echo "wrong username or password";
        }
    }
    $stmt->close();
} catch (\Throwable $th) {
    echo "something went wrong";
    throw ($th);
}


$conn->close(); ?>
  </main>
</body>

</html>
