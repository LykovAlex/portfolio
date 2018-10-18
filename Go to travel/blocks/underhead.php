<section class="categories">
  <?php
    include('blocks/link.php');
    $query5 = mysqli_query($link, "SELECT * FROM Categories");
    $results5 = mysqli_fetch_all($query5, MYSQLI_ASSOC);
    foreach($results5 as $result5):
  ?>
  <div class="category wow fadeInUp" data-wow-offset="200"  >
    <a href="about_country.php?id=<?= $result5['id']; ?>"> <img src="<?= $result5['img_for_cat']; ?>" alt="фотография страны" title="<?= $result5['title']; ?>"> </a>
    <a href="view_posts.php?id=<?= $result5['id']; ?>" title="Смотреть достопримечательности"> <h3> <?= $result5['title']; ?> </h3> </a>
    <p> <?= $result5['description_for_cat'] ?> <a href="about_country.php?id=<?= $result5['id']; ?>"> Читать далее </a> </p>
  </div>

<?php endforeach; ?>
</section>
