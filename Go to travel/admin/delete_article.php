<?php session_start();
if($_SESSION['name'] != 'travel'){
  "<html>
  <head>
    <meta http-equiv='Refresh' content='0; URL=admin.php'>
  </head>
  </html>";
} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Блог путешественника </title>
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>

    <?php include('blocks/header_for_index.php'); ?>

    <div class="main">

                                                                     <!-- Content -->
      <div class="content">
        <fieldset>
          <legend> <h3> Удалить статью </h3> </legend>
          <form action="drop_article.php" method="POST">
            <?php
            include('blocks/link.php');
            $query = mysqli_query($link, "SELECT id,title FROM Posts");
            $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach($posts as $post): ?>
            <p> <label> <input class="radio" type="radio" name="id" value="<?= $post['id'] ?>"> <?= $post['title'] ?> </label> </p>
            <?php endforeach;?>
            <input class="submit" type="submit" name="submit" value="Удалить статью">
          </form>
        </fieldset>
      </div>

      <?php include('blocks/sidebar.php'); ?>
      <?php include('blocks/footer.php'); ?>
