<?php

$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_POST['forumName']) || trim($_POST['forumName']) === '') {
    die("The name was not given.");
}
$category_id = $_GET['category_id'];
$name = trim($_POST['forumName']);
$sqltext = "INSERT INTO forums (name, description, category_id) VALUES (?,?,?)";
$description = trim($_POST['forumDescription']);
if ($stmt = $conn->prepare($sqltext)) {
    $stmt->bind_param('ssi', $name, $description, $category_id);

    if ($stmt->execute()) {
        echo "Forum: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . " was created successfully";
    } else {
        echo "Error creating forum: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Prepare failed: " . $conn->error;
}

$conn->close();
echo "<br><a href='index.php'>Go back to index</a>";
