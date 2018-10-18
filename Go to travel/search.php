<?php
if(isset($_POST['search'])){
  $search = trim($_POST['search']);
} else {
  exit('Чтобы увидеть содержимое данной страницы воспользуйтесь формой поиска');
}
if(empty($search)){
  exit('Введите искомую информацию в форму поиска');
}
if(strlen($search) < 5){
  exit('Искомое слово должно состоять минимум из трёх букв на русском языке');
}
$search = htmlspecialchars($search);
$search = stripslashes($search);

include('blocks/link.php');?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
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

        <h3 class="text_for_search"> Результаты поиска: </h3>
           <?php $query = mysqli_query($link, "SELECT * FROM Posts WHERE MATCH(text) AGAINST('$search')");
           if(!$query){
             exit('Произошла ошибка при обращении к Базе Данных, пожалуйста обратитесь к администратору');
           }
           if(mysqli_num_rows($query) < 1){
             echo '<p class="text_for_search"> Информация по вашему запросу не найдена... </p>';
           } else {
           $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
           foreach($results as $result): ?>
        <section class="posts">
          <article class="headArticle">
            <h3 class="headText"> <a href="view_post.php?id=<?= $result['id']; ?>"> <?= $result['title']; ?> </a> </h3>
            <div class="wrapForText">
              <p class="author"> Автор: <?= $result['author']; ?> от (<?= $result['date']; ?>) </p>
              <p class="countView"> Колличество просмотров: <?= $result['views']; ?> </p>
            </div>
          </article>
          <div class="mainArticle">
            <a href="view_post.php?id=<?= $result['id']; ?>"><img class="img_in_container" src="<?= $result['img']; ?>" alt="Фотография страны" title="<?= $result['title']; ?>"></a>
            <article class='mainText'>
              <?= $result['description']; ?> <a href="view_post.php?id=<?= $result['id']; ?>" class="readNext"> Читать далее... </a>
            </article>
          </div>
          <p class="moreInfo">
            <a href="view_posts.php?id=<?= $result['id']; ?>"> Другие достопримечательности </a> <a href="kitchen.php?id=<?= $result['cat']; ?>"> Местная кухня </a>
            <a href="price.php?id=<?= $result['cat']; ?>"> О ценах </a> <a href="index.php"> На главную </a>
          </p>
        </section>
      <?php endforeach;
      } ?>
      </div>

      <?php include('blocks/sidebar.php'); ?>
      <?php include('blocks/footer.php'); ?>
