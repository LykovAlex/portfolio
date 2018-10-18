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
          <legend> <h3> Добавить новую рубкиру </h3> </legend>
          <form action="add_categories.php" method="POST">
            <label>
              <p>Введите ключевые слова:</p>
              <input type="text" name="meta_keywords" required='required' autocomplete="on" maxlength="50">
            </label>
            <label>
              <p>Введите ключевое описание:</p>
              <input type="text" name="meta_description" required='required' autocomplete="on" maxlength="100">
            </label>
            <p>Введите название рубрики:</p>
            <input type="text" name="title" required='required' maxlength="40">
          </label>
          <label>
            <p>Введите краткое описание рубрики:</p>
            <textarea name="description" rows="8" cols="50" required='required' autocomplete="on"></textarea>
          </label>
          <label>
            <p>Введите краткое описание рубрики для миниатюры:</p>
            <input type="text" name="mini_description" required='required' maxlength="225">
          </label>
          <label>
            <p>Введите полный текст рубрики:</p>
            <textarea name="text" rows="8" cols="80" required='required' autocomplete="on"></textarea>
          </label>
          <label>
            <p>Автор рубрики:</p>
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
              <br>

          <label>
            <p>Введите ключевое слово для местной кухни:</p>
            <input type="text" name="kitchen_k" required='required' maxlength="60">
          </label>
          <label>
            <p>Введите ключевое описание для местной кухни:</p>
            <input type="text" name="kitchen_d" required='required'>
          </label>
          <label>
            <p>Введите название местной кухни в женском роде:</p>
            <input type="text" name="kitchen_title" required='required' maxlength="40" placeholder="Пример: Китайская">
          </label>
          <label>
            <p>Введите полный текст для описания местной кухни:</p>
            <textarea name="kitchen_text" rows="8" cols="80" required='required' autocomplete="on"></textarea>
          </label>
            <br>

          <label>
            <p>Введите ключевое слово для местных цен:</p>
            <input type="text" name="price_k" required='required' maxlength="60">
          </label>
          <label>
            <p>Введите ключевое описание для местных цен:</p>
            <input type="text" name="price_d" required='required'>
          </label>
          <label>
            <p>Введите название рубрики о ценах:</p>
            <input type="text" name="price_title" required='required' maxlength="40" placeholder="Пример: Цены в Китае">
          </label>
          <label>
            <p>Введите полный текст для описания местных цен:</p>
            <textarea name="price_text" rows="8" cols="80" required='required' autocomplete="on"></textarea>
          </label>
          <br>
          <input class="submit" type="submit" name="submit" value="Добавить рубрику в Базу Данных">
          </form>

        </fieldset>
      </div>



      <?php include('blocks/sidebar.php'); ?>
      <?php include('blocks/footer.php'); ?>
