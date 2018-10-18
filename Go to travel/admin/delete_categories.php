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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Блог путешественника </title>
    <link rel="stylesheet" href="style/style.css">
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"> </script>
    <script src="js/javascript.js" type="text/javascript"> </script>
  </head>
  <body>

    <?php include('blocks/header_for_index.php'); ?>

    <div class="main">
                                                                   <!-- Content -->
      <div class="content">
        <fieldset>
          <legend> <h3> Удалить рубрику </h3> </legend>
          <form action="drop_categories.php" method="POST">
            <?php
            include('blocks/link.php');
            $query = mysqli_query($link, "SELECT id,title FROM Categories");
            $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach($posts as $post): ?>
            <p> <label> <input class="radio" type="radio" name="id" value="<?= $post['id'] ?>"> <?= $post['title'] ?> </label> </p>
            <?php endforeach;?>
            <input class="submit" type="submit" name="submit" value="Удалить рубрику">
          </form>
        </fieldset>
      </div>



    <?php include('blocks/sidebar.php'); ?>
    <?php include('blocks/footer.php'); ?>
