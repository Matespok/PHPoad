<?php
$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<?php
$sqltextCategory = "select id, name from forum_categories";

$resultCategory = $conn->query($sqltextCategory);

$sqltextForum = "SELECT * FROM forums";
$resultForum = $conn->query($sqltextForum);



$conn->close();
