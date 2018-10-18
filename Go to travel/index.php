<?php include('blocks/link.php');
 $query2 = mysqli_query($link, 'SELECT * FROM main');
 if(!$query2){
   exit('Произошла ошибка при обращении к Базе Данных, пожалуйста обратитесь к администратору');
 }
 if(mysqli_num_rows($query2) < 1){
   exit('В Базе Данных не найдено записей, пожалуйста обратитесь к администратору');
 }
 $result2 = mysqli_fetch_assoc($query2);
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta name="description" content="<?= $result2['meta_description']; ?>">
    <meta name="keywords" content="<?= $result2['meta_keywords']; ?>" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Блок путешественника</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/animation.css">
    <script src='js/jquery-3.2.1.min.js'></script>
    <script src='js/WOW.min.js'></script>
    <script src='js/script.js'></script>
  </head>
  <body>

    <?php include('blocks/header.php');?>

    <main class='main'>                                            <!-- CONTENT -->
      <div class="content">

        <?php
          $query = mysqli_query($link, "SELECT * FROM Categories");
          if(!$query){
            exit('Произошла ошибка при обращении к Базе Данных, пожалуйста обратитесь к администратору');
          }
          if(mysqli_num_rows($query) < 1){
            exit('В Базе Данных не найдено записей, пожалуйста обратитесь к администратору');
          }
          $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
          foreach($results as $result):
        ?>

        <section class="posts wow fadeInUp" data-wow-offset='200'>
          <article class="headArticle">
            <h3 class="headText"> <a href="about_country.php?id=<?= $result['id']; ?>"> <?= $result['title']; ?> </a> </h3>
            <div class="wrapForText">
              <p class="author"> Автор: <?= $result['author']; ?> от (<?= $result['date']; ?>) </p>
              <p class="countView"> Колличество просмотров: <?= $result['views']; ?> </p>
            </div>
          </article>
          <div class="mainArticle">
            <a href="about_country.php?id=<?= $result['id']; ?>"><img class="img_in_container" src="<?= $result['img']; ?>" alt="Фотография страны" title="<?= $result['title']; ?>"></a>
            <article class='mainText'>
              <?= $result['description']; ?> <a href="about_country.php?id=<?= $result['id']; ?>" class="readNext"> Читать далее... </a>
            </article>
          </div>
          <p class="moreInfo">
            <a href="view_posts.php?id=<?= $result['id']; ?>"> Смотреть достопримечательности страны</a> <a href="kitchen.php?id=<?= $result['id']; ?>"> Местная кухня </a>
            <a href="price.php?id=<?= $result['id']; ?>"> О ценах </a> <a href="index.php"> На главную </a>
          </p>
        </section>

      <?php endforeach; ?>

      </div>

      <?php include('blocks/sidebar.php');?>
      <?php include('blocks/footer.php'); ?>
