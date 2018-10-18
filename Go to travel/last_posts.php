<?php include('blocks/link.php'); ?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta name="description" content="<?= $result['meta_d']; ?>">
    <meta name="keywords" content="<?= $result['meta_k']; ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Блог Путешественника </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/animation.css">
    <script src='js/jquery-3.2.1.min.js'></script>
    <script src='js/WOW.min.js'></script>
    <script src='js/script.js'></script>
  </head>
  <body>
    <?php include('blocks/underhead.php'); ?>

    <main class='main'>                                            <!-- CONTENT -->
      <div class="content">

       <?php $query2 = mysqli_query($link, "SELECT * FROM Posts ORDER BY date DESC");
         $results2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
         foreach($results2 as $result2):
        ?>
        <section class="posts wow fadeInUp" data-wow-offset='200'>
          <article class="headArticle">
            <h3 class="headText"> <a href="view_post.php?id=<?= $result2['id']; ?>"> <?= $result2['title']; ?> </a> </h3>
            <div class="wrapForText">
              <p class="author"> Автор: <?= $result2['author']; ?> от (<?= $result2['date']; ?>) </p>
              <p class="countView"> Колличество просмотров: <?= $result2['views']; ?> </p>
            </div>
          </article>
          <div class="mainArticle">
            <a href="view_post.php?id=<?= $result2['id']; ?>"><img class="img_in_container" src="<?= $result2['img']; ?>" alt="Фотография страны" title="<?= $result2['title']; ?>"></a>
            <article class='mainText'>
              <?= $result2['description']; ?> <a href="view_post.php?id=<?= $result2['id']; ?>" class="readNext"> Читать далее... </a>
            </article>
          </div>
          <p class="moreInfo">
            <a href="view_posts.php?id=<?= $result2['cat']; ?>"> Другие достопримечательности </a>  <a href="kitchen.php?id=<?= $result2['cat']; ?>"> Местная кухня </a>
            <a href="price.php?id=<?= $result2['cat']; ?>"> О ценах </a> <a href="index.php"> На главную </a>
          </p>
        </section>
      <?php endforeach; ?>
      </div>

      <?php include('blocks/sidebar.php'); ?>
      <?php include('blocks/footer.php'); ?>
