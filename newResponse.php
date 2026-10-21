<?php

session_start();
/*
<form method='post' action='newResponse.php?respond-to={$row['post_id']}'>
  <label for='response-{$row['id']}'>your response: </label>
  <br>
  <textarea rows='3' cols='50' name='response' id='response'></textarea>
  <br>
  <input type='submit'>
</form>
*/


$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['user_id'])) {
    die("you must <a href='login.php'>LOG IN</a>");
}
$replied_to = $_GET['respond-to'];
$user_id = $_SESSION['user_id'];
$content = $_POST["response"];
echo $content;
$topic_id = $_GET['topic_id'];
$sqltext = "INSERT INTO posts (replied_to, user_id, text, topic_id) VALUES (?,?,?,?)";
try {
    if ($stmt = $conn->prepare($sqltext)) {
        $stmt->bind_param('iisi', $replied_to, $user_id, $content, $topic_id);

        if ($stmt->execute()) {
            echo "Responded succesfully! ";
            echo "<br><a href='viewTopic.php?id={$topic_id}'>Go back to topic</a>";
        } else {
            echo "Error creating post: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Prepare failed: " . $conn->error;
    }

    $conn->close();
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
