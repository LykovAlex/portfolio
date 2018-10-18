<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  } else{
    $id = 1;
  }

  include('blocks/link.php');
  $query = mysqli_query($link, "SELECT * FROM About_kitchen WHERE id = $id");
  if(!$query){
    exit('Произошла ошибка при обращении к Базе Данных, пожалуйста обратитесь к администратору');
  }
  if(mysqli_num_rows($query) < 1){
    exit('В Базе Данных не найдено записей, пожалуйста обратитесь к администратору');
  }
  $result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta name="description" content="<?= $result['meta_description']; ?>">
    <meta name="keywords" content="<?= $result['meta_keywords']; ?>" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $result['title'] ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/animation.css">
    <script src='js/jquery-3.2.1.min.js'></script>
    <script src='js/WOW.min.js'></script>
    <script src='js/script.js'></script>
  </head>
  <body>


    <main class='main'>                                            <!-- CONTENT -->
      <div class="content">
        <section class="posts">
          <article class="headArticle">
            <h3 class="headText">  <?= $result['title']; ?> </h3>
          </article>
          <div class="mainArticle">
            <article class='mainText'>
              <?= $result['text']; ?>
            </article>
          </div>
          <p class="moreInfo">
            <a href="view_posts.php?id=<?= $result['id']; ?>"> Смотреть достопримечательности страны </a>
            <a href="price.php?id=<?= $result['id']; ?>"> О ценах </a> <a href="index.php"> На главную </a>
          </p>
        </section>

      </div>

      <?php include('blocks/sidebar.php');?>
      <?php include('blocks/footer.php'); ?>
