<?php
session_start();
include 'viewTopicData.php';
global $result;
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
    <main>
      <?php 
      if(isset($_SESSION['user_id'])){
      echo "
      <section>
        <button onclick='toggleVisibility(0)'>Make post</button>
        <div class='Hidden' id='Area-0'>
          <form method='post' action='newPost.php?topic_id=" . htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8') . "'>
            <label for='content'>Content of your post</label>
            <br>
            <textarea rows='4' cols='60' id='content' name='content'></textarea>
            <br>
            <input type='submit' value='Submit'>
          </form>
        </div>
      </section>
      ";
      }
      else {
        echo "<p>To make a post or respond, you must <a href='login.php'>login</a></p>";
      }
      ?>

      <?php
      while ($row = $result->fetch_assoc()) {
        echo "<article >";
        
        // Response preview handling using data attributes
        if(isset($row['replied_to'])){
          echo "<p>{$row['username']} replied to: </p>
                <article>
                  <div class='respondedToPost' data-reply-to='{$row['replied_to']}' id='postPreview-{$row['post_id']}'></div>
                </article>";
        }

      echo "
      <div id='post-{$row['post_id']}'>
        <p>{$row['username']}</p>
        <p>{$row['text']}</p>
      </div>
       ";

        if(isset($_SESSION['user_id'])){
          $safeTopicId = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
          echo "
          <button type='button' class='response-btn' onclick='toggleVisibility({$row['post_id']})'>Respond</button>
          <div class='Hidden' id='Area-{$row['post_id']}'>
            <form method='post' action='newResponse.php?respond-to={$row['post_id']}&topic_id={$safeTopicId}'>
              <label for='response-{$row['post_id']}'>your response: </label>
              <br>
              <textarea rows='3' cols='50' name='response' id='response-{$row['post_id']}'></textarea>
              <br>
              <input type='submit'>
            </form>
          </div>";
        }

        echo "</article>";
      }
      ?>
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
