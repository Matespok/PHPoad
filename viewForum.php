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
  <main>
    <?php
echo "<a href='newTopic.php?id={$_GET['id']}'>New topic</a><br>";
if (count($resultForum) > 0) {
    foreach ($resultForum as $forum) {
        echo "
      <a href='viewTopic.php?id={$forum['id']}'>
        <article>
          {$forum['name']}
        </article>
      </a>";
    }

} else {
    echo "No topics yet.";
}
?>
  </main>
</body>

</html>
