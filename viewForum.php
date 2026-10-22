<?php
require_once __DIR__ . '/init.php';
include 'viewForumData.php';
global $resultForum;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
</head>

  <body>
<?php require_once 'nav.php'; ?> 
  <main>
    <?php
      echo "<a href='newTopic.php?id={$_GET['id']}' class='btn'>New topic</a><br>";
echo "
      <div class='category-title'>
        {$_GET['category_name']} 
      </div>
      ";
if (count($resultForum) > 0) {
    foreach ($resultForum as $forum) {
        echo "
      <a href='viewTopic.php?id={$forum['id']}&topic-name={$forum['name']}'>
        <div class='forum'>
          <h4>{$forum['name']}<h4> 
        </div>
      </a>";
    }

} else {
    echo "No topics yet.";
}
?>
  </main>
</body>

</html>
