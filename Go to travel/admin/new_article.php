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
          <legend> <h3> Добавить новую статью </h3> </legend>
          <form action="add_article.php" method="POST">
            <label>
              <p>Введите ключевые слова:</p>
              <input type="text" name="meta_keywords" required='required' autocomplete="on" maxlength="50">
            </label>
            <label>
              <p>Введите ключевое описание:</p>
              <input type="text" name="meta_description" required='required' autocomplete="on" maxlength="100">
            </label>
            <p>Введите название статьи:</p>
            <input type="text" name="title" required='required' maxlength="40">
          </label>
          <label>
            <p>Введите краткое описание статьи:</p>
            <textarea name="description" rows="8" cols="50" required='required' autocomplete="on"></textarea>
          </label>
          <label>
            <p>Введите полный текст статьи:</p>
            <textarea name="text" rows="8" cols="80" required='required' autocomplete="on"></textarea>
          </label>
          <label>
            <p>Автор статьи:</p>
            <input type="text" name="author" required='required' autocomplete="on" maxlength="40">
          </label>
          <label>
            <p>Введите путь к картинке:</p>
            <input type="text" name="miniature" placeholder="image/название картинки.jpg" required='required' autocomplete="on">
          </label>
          <label>
            <p>Введите путь к картинке в миниатюре:</p>
            <input type="text" name="mini_miniature" placeholder="image/mini-название картинки.jpg" required='required' autocomplete="on">
          </label>
          <p> Выберите категорию для статьи: </p>
          <select name="select_categories">
            <?php include('blocks/link.php');
            $query = mysqli_query($link, "SELECT id,title FROM Categories");
            $posts = mysqli_fetch_all($query, 1);
            foreach($posts as $post):?>
            <option value="<?= $post['id'] ?>"> <?= $post['title'] ?> </option>
            <?php endforeach;?>
          </select>
          <br>
          <input class="submit" type="submit" name="submit" value="Добавить статью в Базу Данных">
          </form>

        </fieldset>
      </div>



      <?php include('blocks/sidebar.php'); ?>
      <?php include('blocks/footer.php'); ?>
