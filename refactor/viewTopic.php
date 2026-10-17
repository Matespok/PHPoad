<?php
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
    <a href="newPost.php">new post</a>
    <?php
    while ($row = $result->fetch_assoc()) {
      echo "
      <article>
       <p>{$row['username']}</p>
      <p>{$row['text']}</p>
      <button type='button' class='response'>Respond</button>
      <div class='responseAreaHidden' id='responseArea'>
        <label for='response'>your response: </label>
        <br>
        <textarea rows='3' cols='50' name='response' id='response'></textarea>
        <br>
        <input type='submit'>
      </div>

      </article>
      ";
    }
    ?>
  </main>
</body>
<script>
const btn = document.querySelector('.response');
const responseArea = document.querySelector('#responseArea');
btn.addEventListener('click', () => {
  if(responseArea.className == 'responseAreaHidden'){
    responseArea.className = 'responseAreaVisible';
  }
  else{
    responseArea.className = 'responseAreaHidden';
  }
});
</script>
</html>
