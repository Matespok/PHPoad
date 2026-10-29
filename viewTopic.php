<?php
require_once __DIR__ . '/init.php';
include 'viewTopicData.php';
global $resultPosts;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHPoad topic</title>
  <link rel="stylesheet" href="style.css" />
</head>

  <body>
<?php require_once 'nav.php'; ?> 
    <main>
      <?php
      if (isset($_SESSION['user_id'])) {
          echo "
 <button class='btn' onclick='toggleVisibility(0)'>Make post</button>
        <div class='Hidden' id='Area-0'>
          <form class='create-post' method='post' action='newPost.php?topic_id=" . htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8') . "'>
            <label for='content'>Content of your post</label>
            <br>
            <textarea rows='4' cols='108' id='content' name='content'></textarea>
            <br>
            <input class='btn' type='submit' value='Submit'>
          </form>
        </div>

      <div class='category-title'>
      {$_GET['topic-name']}
      </div>
             ";
      } else {
          echo "<p>To make a post or respond, you must <a href='login.php'>login</a></p>
      <div class='category-title'>
      Topic: {$_GET['topic-name']}
      </div>";

      }
echo "<div class='topic'>";
foreach ($resultPosts as $post) {
    echo "<article>";

    if (isset($post['replied_to'])) {
        echo "<p>replying to: </p>
                <article>
                  <div class='respondedToPost' data-reply-to='{$post['replied_to']}' id='postPreview-{$post['post_id']}'></div>
                </article>";
    }

    echo "
      <div id='post-{$post['post_id']}' class='post'>
        <div class='post-profile'>
          <p>{$post['username']}</p>
        </div>
        <div class='post-text'>
          <p>{$post['text']}</p>
        </div>
      </div>
       ";

    if (isset($_SESSION['user_id'])) {
        $safeTopicId = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
        echo "
          <button type='button' class='response-btn' onclick='toggleVisibility({$post['post_id']})'>Respond</button>
          <div class='Hidden' id='Area-{$post['post_id']}'>
            <form method='post' action='newResponse.php?respond-to={$post['post_id']}&topic_id={$safeTopicId}'>
              <label for='response-{$post['post_id']}'>your response: </label>
              <br>
              <textarea rows='3' cols='50' name='response' id='response-{$post['post_id']}'></textarea>
              <br>
              <input type='submit'>
            </form>
          </div>";
    }

    echo "</article>";
}
?>

      </div>
    </main>

    <script>
      function toggleVisibility(id){
        const Area = document.getElementById('Area-' + id);
        if(Area.className == 'Hidden'){
          Area.className = 'Visible';
        } else {
          Area.className = 'Hidden';
        }
      }

      document.addEventListener("DOMContentLoaded", function() {
        const previewContainers = document.querySelectorAll('.respondedToPost');
        previewContainers.forEach(div => {
          const toPreviewId = div.getAttribute('data-reply-to');
          const targetPost = document.getElementById('post-' + toPreviewId);
          
          if (targetPost) {
            const clone = targetPost.cloneNode(true);
            div.appendChild(clone);
          }
        });
      });
    </script>
</body>
</html>
