<?php include('blocks/link.php') ?>
                                          <!-- SIDEBAR -->
  <sidebar class="sidebar">
    <nav>

      <section>
        <h3> Заметки путешественника </h3>
        <?php $query = mysqli_query($link, "SELECT * FROM Categories");
          $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
          foreach($results as $result):
        ?>
        <h4 class="noteHead"> <?= $result['title']; ?> </h4>
        <ul class="noteText">
          <li><a href="about_country.php?id=<?= $result['id'] ?>"> - Немного о стране </a></li>
          <li><a href="kitchen.php?id=<?= $result['id'] ?>"> - Местная кухня </a></li>
          <li><a href="view_posts.php?id=<?= $result['id'] ?>"> - Достопримечательности </a></li>
          <li><a href="price.php?id=<?= $result['id'] ?>"> - О ценах </a></li>
        </ul>
      <?php endforeach; ?>
      </section>

      <section>
        <h3> Сортировать заметки по датам </h3>
        <ul>
          <li> <a href="first_posts.php"> - Смотреть первые записи </a> </li>
          <li> <a href="last_posts.php"> - Смотреть последние записи </a> </li>
        </ul>
      </section>

      <section>
        <h3> Поиск </h3>
        <form action="search.php" method="post">
          <input type="text" name="search" class="inputSearch" placeholder="Поиск..." required='required' maxlength="30">
        </form>
      </section>
    </nav>

                                            <!-- miniature -->
  <h3 class='headMiniature'> Последние статьи </h3>
    <div class="miniature">

    <?php $query2 = mysqli_query($link, "SELECT * FROM Posts ORDER BY date DESC limit 4");
    $results2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
    foreach($results2 as $result2):
    ?>


      <section class="miniPosts">
  <a href="view_post.php?id=<?= $result2['id']; ?>">
        <article class="miniHeadArticle">
          <p class="miniHeadText"> <?= $result2['title']; ?> </p>
          <div class="miniWrapForText">
          <p class="miniAuthor"> Автор: <?= $result2['author']; ?> от (<?= $result2['date']; ?>) </p>
          <p class="miniCountView"> Колличество просмотров: <?= $result2['views']; ?> </p>
          </div>
        </article>
        <div class="miniMainArticle">
          <img src="<?= $result2['mini_img']; ?>" alt="Фотография страны" title="миниатюра">
          <article class='miniMainText'>
          <?= $result2['description']; ?> <span class="miniReadNext"> Читать далее... </span>
          </article>
        </div>
        <p class="miniMoreInfo">
          <span>Другие достопримечательности</span> <span>Местная кухня</span> <span>О ценах</span><span>  На главную</span>
        </p>
</a>
      </section>

      <?php endforeach; ?>

    </div>
  </sidebar>
</main>
