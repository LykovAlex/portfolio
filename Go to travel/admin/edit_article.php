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
          <legend> <h3> Редактировать статью </h3> </legend>
          <?php
          include('blocks/link.php');
          if(!isset($_GET['id'])){
            $query = mysqli_query($link, "SELECT id,title FROM Posts");
          	$posts = mysqli_fetch_all($query, 1);
            $i=1;
        	foreach($posts as $post):?>
        	<p> <a href="edit_article.php?id=<?= $post['id'] ?>"> <?=$i.') '.$post['title'] ?> </a> </p>
        	<?php
          $i++;
          endforeach;
        }else {
          $id = $_GET['id'];
          $query2 = mysqli_query($link, "SELECT * FROM Posts WHERE id = '$id' ");
          $posts2 = mysqli_fetch_all($query2, 1);
          foreach($posts2 as $post2):?>

          <form action="update_article.php" method="POST">
            <label>
              <p>Введите ключевые слова:</p>
              <input type="text" name="meta_keywords" value="<?=$post2['meta_k']?>" required='required' autocomplete="on" maxlength="50">
            </label>
            <label>
              <p>Введите ключевое описание:</p>
              <input type="text" name="meta_description" value="<?=$post2['meta_d']?>" required='required' autocomplete="on" maxlength="100">
            </label>
            <p>Введите название статьи:</p>
            <input type="text" name="title" value="<?=$post2['title']?>" required='required' maxlength="40">
          </label>
          <label>
            <p>Введите краткое описание статьи:</p>
            <textarea name="description" rows="8" cols="50" required='required' autocomplete="on"><?=$post2['description']?></textarea>
          </label>
          <label>
            <p>Введите полный текст статьи:</p>
            <textarea name="text" rows="8" cols="80" required='required' autocomplete="on"><?=$post2['text']?></textarea>
          </label>
          <label>
            <p>Автор статьи:</p>
            <input type="text" name="author" value="<?=$post2['author']?>" required='required' autocomplete="on" maxlength="40">
          </label>
          <label>
            <p>Введите путь к картинке:</p>
            <input type="text" name="miniature" value="<?=$post2['img']?>" placeholder="image/название картинки.jpg" required='required' autocomplete="on">
          </label>
          <label>
            <p>Введите путь к картинке в миниатюре:</p>
            <input type="text" name="mini_miniature" value="<?=$post2['mini_img']?>" placeholder="image/mini-название картинки.jpg" required='required' autocomplete="on">
          </label>
          <p> Выберите категорию для статьи: </p>
          <select name="select_categories">
            <?php
            $query3 = mysqli_query($link, "SELECT id,title FROM Categories");
            $posts3 = mysqli_fetch_all($query3, 1);
            foreach($posts3 as $post3):?>
            <option value="<?= $post3['id'] ?>"> <?= $post3['title'] ?> </option>
            <?php endforeach;?>
          </select>
          <br>
          <input type="hidden" name="id" value="<?=$id?>">
          <input class="submit" type="submit" name="submit" value="Обновить статью">
          </form>

        <?php endforeach;
      }
        ?>

        </fieldset>
      </div>



      <?php include('blocks/sidebar.php'); ?>
      <?php include('blocks/footer.php'); ?>
