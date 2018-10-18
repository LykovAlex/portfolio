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
          <legend> <h3> Редактировать рубкиру </h3> </legend>
          <?php
          include('blocks/link.php');
          if(!isset($_GET['id'])){
          $query = mysqli_query($link, "SELECT id,title FROM Categories");
        	$posts = mysqli_fetch_all($query, 1);
          $i=1;
        	foreach($posts as $post):?>
        	<p> <a href="edit_categories.php?id=<?= $post['id'] ?>"> <?=$i.') '.$post['title'] ?> </a> </p>
        	<?php
          $i++;
          endforeach;
        }else {
          $id = $_GET['id'];
          $query2 = mysqli_query($link, "SELECT * FROM Categories WHERE id = '$id' ");
          $posts2 = mysqli_fetch_all($query2, 1);
          foreach($posts2 as $post2):?>
          <form action="update_categories.php" method="POST">
            <label>
              <p>Введите ключевые слова:</p>
              <input type="text" name="meta_k" value="<?= $post2['meta_k'] ?>" required=required autocomplete="on" maxlength="50">
            </label>
            <label>
              <p>Введите ключевое описание:</p>
              <input type="text" name="meta_d" value="<?= $post2['meta_d'] ?>" required=required autocomplete="on" maxlength="100">
            </label>
            <label>
              <p>Введите название рубрики:</p>
              <input type="text" name="title" value="<?= $post2['title'] ?>" required=required maxlength="40">
            </label>
            <label>
              <p>Введите краткое описание рубрики:</p>
              <input type="text" name="description" value="<?= $post2['description'] ?>" required=required maxlength="225">
            </label>
            <label>
              <p>Введите краткое описание рубрики для миниатюры:</p>
              <input type="text" name="description_for_cat" value="<?= $post2['description_for_cat'] ?>" required=required>
            </label>
            <label>
              <p>Введите полный текст рубрики:</p>
              <textarea name="text" rows="8" cols="80" required=required autocomplete="on"><?= $post2['text'] ?></textarea>
            </label>
            <label>
              <p>Автор рубрики:</p>
              <input type="text" name="author" value="<?= $post2['author'] ?>" required=required autocomplete="on" maxlength="40">
            </label>
            <label>
              <p>Введите путь к картинке:</p>
              <input type="text" name="img" value="<?= $post2['img'] ?>" placeholder="image/название картинки.jpg" required=required autocomplete="on">
            </label>
            <label>
              <p>Введите путь к картинке в миниатюре:</p>
              <input type="text" name="img_for_cat" value="<?= $post2['img_for_cat'] ?>" placeholder="image/mini-название картинки.jpg" required=required autocomplete="on">
            </label>
            <input type="hidden" name="cat_id" value="<?=$post2['id']?>">


          <?php endforeach;?>
          <?php
          $query3 = mysqli_query($link, "SELECT * FROM About_kitchen WHERE id = '$id'");
          $posts3 = mysqli_fetch_all($query3,1);
          foreach($posts3 as $post3):
          ?>
              <br>
            <label>
              <p>Введите ключевое слово для местной кухни:</p>
              <input type="text" name="kitchen_k" value='<?= $post3['meta_keywords']?>' required='required' maxlength="60">
            </label>
            <label>
              <p>Введите ключевое описание для местной кухни:</p>
              <input type="text" name="kitchen_d" value='<?= $post3['meta_description']?>' required='required'>
            </label>
            <label>
              <p>Введите название местной кухни в женском роде:</p>
              <input type="text" name="kitchen_title" value='<?= $post3['title']?>' required='required' maxlength="40" placeholder="Пример: Китайская">
            </label>
            <label>
              <p>Введите полный текст для описания местной кухни:</p>
              <textarea name="kitchen_text" rows="8" cols="80" required='required' autocomplete="on"><?= $post3['text']?></textarea>
            </label>
            <input type="hidden" name="kitchen_id" value="<?= $post3['id']?>">
          <?php endforeach;?>
          <?php
            $query4 = mysqli_query($link, "SELECT * FROM About_price WHERE id = '$id'");
            $posts4 = mysqli_fetch_all($query4,1);
            foreach($posts4 as $post4):
           ?>
              <br>
            <label>
              <p>Введите ключевое слово для местных цен:</p>
              <input type="text" name="price_k" value='<?= $post4['meta_keywords']?>' required='required' maxlength="60">
            </label>
            <label>
              <p>Введите ключевое описание для местных цен:</p>
              <input type="text" name="price_d" value='<?= $post4['meta_description']?>' required='required'>
            </label>
            <label>
              <p>Введите название рубрики о ценах:</p>
              <input type="text" name="price_title" value='<?= $post4['title']?>' required='required' maxlength="40" placeholder="Пример: Цены в Китае">
            </label>
            <label>
              <p>Введите полный текст для описания местных цен:</p>
              <textarea name="price_text" rows="8" cols="80" required='required' autocomplete="on"><?= $post4['text']?></textarea>
            </label>
            <input type="hidden" name="price_id" value="<?= $post4['id']?>">
              <?php endforeach; ?>
              <br>
              <input class="submit" type="submit" name="submit" value="Обновить рубрику">
          </form>

        <?php

      }
        ?>

        </fieldset>
      </div>



      <?php include('blocks/sidebar.php'); ?>
      <?php include('blocks/footer.php'); ?>
