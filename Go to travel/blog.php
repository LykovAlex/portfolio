<?php include('blocks/link.php'); ?>
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
    <?php
    if(!isset($_GET['page'])){
      include('blocks/header.php');
    }
    include('blocks/underhead.php'); ?>

    <main class='main'>                                            <!-- CONTENT -->
      <div class="content">

       <?php
       $query2 = mysqli_query($link, "SELECT * FROM Posts");

        $maxPosts = 3;
        $numPosts = mysqli_num_rows($query2);
        $numPages = intval(($numPosts - 1)/$maxPosts) + 1;

        if(isset($_GET["page"])){
          $page = $_GET["page"];
          if($page < 1){
            $page = 1;
          }
          else if($page > $numPages){
            $page = $numPages;
          }
        } else{
          $page = 1;
        }

          $data = mysqli_fetch_array($query2);
          do{
            if(($data['id'] > ($page * $maxPosts - $maxPosts)) &&($data['id'] <= $page * $maxPosts)){
              printf("
              <section class='posts wow fadeInUp' data-wow-offset='200'>
                <article class='headArticle'>
                  <h3 class='headText'> <a href='view_post.php?id=%s'> %s </a> </h3>
                  <div class='wrapForText'>
                    <p class='author'> Автор: %s от (%s) </p>
                    <p class='countView'> Колличество просмотров: %s </p>
                  </div>
                </article>
                <div class='mainArticle'>
                  <a href='view_post.php?id=%s'><img class='img_in_container' src='%s' alt='Фотография страны' title='%s'></a>
                  <article class='mainText'>
                    %s <a href='view_post.php?id=%s' class='readNext'> Читать далее... </a>
                  </article>
                </div>
                <p class='moreInfo'>
                  <a href='view_posts.php?id=%s'> Другие достопримечательности </a> <a href='kitchen.php?id=%s'> Местная кухня </a>
                  <a href='price.php?id=%s'> О ценах </a> <a href='index.php'> На главную </a>
                </p>
              </section>
                ",$data['id'], $data['title'],$data['author'], $data['date'], $data['views'], $data['id'], $data['img'], $data['title'], $data['description'], $data['id'], $data['cat'], $data['cat'], $data['cat']);
            }

          }
          while($data = mysqli_fetch_array($query2));
          ?>
          <div class='pagination'>
            <?php
          for($i = 1; $i <= $numPages; $i++){
            echo "<a href=/Go%20to%20travel/blog.php?page=$i>$i</a>";
          }
        ?>
          </div>

      </div>

      <?php include('blocks/sidebar.php'); ?>
      <?php include('blocks/footer.php'); ?>
