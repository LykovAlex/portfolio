<?php
include('link.php');

function getAllArticles($start, $limit){
  include('link.php');
  $query = mysqli_query($link, "SELECT * FROM Posts LIMIT ".$start.", ".$limit); // Когда мы устанавливаем лимит при запросе мы можем указать два числа через запятую, где первое будет означать с какого числа начать, а второе сколько взять
//  echo'<pre>';
//  var_dump($query);
  return resultSetToArray($query);
}

function resultSetToArray($query){
  include('link.php');
  $array = [];
  while($row = mysqli_fetch_assoc($query)) $array[] = $row;
  return $array;
}

function countArticles(){
  include('link.php');
  $query = mysqli_query($link, "SELECT COUNT(`id`) FROM Posts ");
  $result = mysqli_fetch_row($query);
  return $result[0];
}

function getStart($page, $limit){
  return $limit * ($page - 1);
}

function pagination($page, $limit){
  // Общее колличество строк в БД
  $count_articles = countArticles();
  // Общее колличество стр.
  $count_pages = ceil($count_articles / $limit);
  if($page > $count_pages) $page = $count_pages;
  $prev = $page - 1;
  $next = $page + 1;
  if($prev < 1 ) $prev = 1;
  if($next > $count_pages) $next = $count_pages;
  $pagination = "";
  if($count_pages > 1){
    if($page == 1){
      $pagination .= "<span> Первая </span>";
      $pagination .="<span> Предыдущая </span>";
    } else{
      $pagination .="<a href='last_posts.php?page=1'> Первая </a>";
      if($prev == 1) $pagination .="<a href='last_posts.php?page=1'> Первая </a>";
      else $pagination .="<a href='last_posts.php?page=".$prev."'> Предыдущая </a>";
    }
    for($i = 1; $i <= $count_pages; $i++){
      if($i == 1) $pagination .="<a href=last_posts.php?page=1>".$i."</a>";
      elseif ($i == $page) $pagination .="<span>".$i."</span>";
      else $pagination .="<a href='last_posts.php?page=".$i."'>".$i."</a>";
    }
    if($page == $count_pages){
      $pagination .= "<span> Следующая </span>";
      $pagination .= "<span> Последняя </span>";
    }
    else{
      $pagination .="<a href='last_posts.php?page=".$next."'> Следующая </a>";
        $pagination .="<a href='last_posts.php?page=".$count_pages."'> Последняя </a>";
    }
  }
  return $pagination;
}
 ?>
