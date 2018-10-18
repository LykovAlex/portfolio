<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  } else{
    $id = 1;
  }
  include('blocks/link.php');

  $query2 = mysqli_query($link, "SELECT views FROM Categories WHERE id = $id");
  $result2 = mysqli_fetch_assoc($query2);
  $new_views = $result2['views']+1;
  $query3 = mysqli_query($link, "UPDATE Categories SET views = '$new_views' WHERE id = $id");

  $query = mysqli_query($link, "SELECT * FROM Categories WHERE id = $id");
  if(!$query){
    exit('Произошла ошибка при обращении к Базе Данных, пожалуйста обратитесь к администратору');
  }
  if(mysqli_num_rows($query) < 1){
    exit('В Базе Данных не найдено записей, пожалуйста обратитесь к администратору');
  }
  $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
  foreach($results as $result):
 ?>
 <!DOCTYPE html>
 <html lang="ru" dir="ltr">
   <head>
     <meta name="description" content="<?= $result['meta_d']; ?>">
     <meta name="keywords" content="<?= $result['meta_k']; ?>">
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE-edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title><?= $result['title']; ?></title>
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
             <div class="wrapForText">
               <p class="author"> Автор: <?= $result['author']; ?> от (<?= $result['date']; ?>) </p>
               <p class="countView"> Колличество просмотров: <?= $result['views']; ?> </p>
             </div>
           </article>
           <div class="mainArticle">
             <article class='mainText'>
               <?= $result['text']; ?>
             </article>
           </div>
           <p class="moreInfo">
             <a href="view_posts.php?id=<?= $result['id']; ?>"> Смотреть достопримечательности страны </a> <a href="kitchen.php?id=<?= $result['id']; ?>"> Местная кухня </a>
             <a href="price.php?id=<?= $result['id']; ?>"> О ценах </a> <a href="index.php"> На главную </a>
           </p>
         </section>

       <?php endforeach; ?>

       </div>

       <?php include('blocks/sidebar.php');?>
       <?php include('blocks/footer.php'); ?>
