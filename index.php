<link rel="stylesheet" href="style.css">
<?php
session_start();
if (isset($_SESSION['user_id'])) {
  echo "you're logged in!";
  echo "<a href='logout.php'>logout</a>";
} else {
  echo "you're not logged in. <a href='login.php'>login</a>";
}
$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "<h1>Forum categories<br/></h1>";
?>
<a href="newCategory.php">+<br /></a>

<?php
$sqltextCategory = "select id, name from forum_categories";

$resultCategory = $conn->query($sqltextCategory);

$sqltextForum = "SELECT * FROM forums";
$resultForum = $conn->query($sqltextForum);


if ($resultCategory->num_rows > 0) {
  while ($rowCategory = $resultCategory->fetch_assoc()) {
    echo "<h2>" . $rowCategory["name"] . "<a href='deletecategory.php?id=" . $rowCategory["id"] . "'> - </a><br></h2>";
    echo "<a href='NewForum.php?category_id=" . $rowCategory["id"] . "'>+</a>";
    if ($resultForum->num_rows > 0) {
      $resultForum->data_seek(0);
      while ($rowForum = $resultForum->fetch_assoc()) {
        if ($rowCategory["id"] == $rowForum["category_id"]) {
          echo "<div><a href='ViewForum.php?id=" . $rowForum["id"] . "'><h4> " . $rowForum["name"] . "</a><a href='?id=" . $rowForum["id"] . "'> - </a>
          <br></h4><p> " . $rowForum["description"] . "</p></div>";
        }
      }
    }
  }
}

$conn->close();
