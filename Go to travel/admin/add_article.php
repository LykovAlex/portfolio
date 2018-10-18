<html>
<head>
  <meta http-equiv='Refresh' content='0; URL=new_article.php'>
</head>
</html>


<?php
if(isset($_POST['submit'])){


 if($_POST['meta_keywords']){
  $meta_k = $_POST['meta_keywords'];
  $meta_k = trim($meta_k);
}
if(!empty($meta_k)){
  $meta_k = stripslashes($meta_k);
  $meta_k = htmlspecialchars($meta_k);
} else{?>
  <script> alert('Вы не заполнили поле с ключевами словами!') </script>
<?php exit();}



if($_POST['meta_description']){
 $meta_d = $_POST['meta_description'];
 $meta_d = trim($meta_d);
}
if(!empty($meta_d)){
 $meta_d = stripslashes($meta_d);
 $meta_d = htmlspecialchars($meta_d);
} else{?>
 <script> alert('Вы не заполнили поле с ключевым описанием!') </script>
<?php exit();}


 if($_POST['title']){
  $title = $_POST['title'];
  $title = trim($title);
}
if(!empty($title)){
  $title = stripslashes($title);
  $title = htmlspecialchars($title);
} else{?>
  <script> alert('Вы не заполнили поле с названием статьи!') </script>
<?php exit();}


if($_POST['description']){
 $description = $_POST['description'];
 $description = trim($description);
}
if(!empty($description)){
 $description = stripslashes($description);
 $description = htmlspecialchars($description);
} else{?>
 <script> alert('Вы не заполнили поле с описанием статьи!') </script>
<?php exit();}


 if($_POST['text']){
  $text = $_POST['text'];
  $text = trim($text);
}
if(!empty($text)){
  $text = stripslashes($text);
  $text = htmlspecialchars($text);
} else{?>
  <script> alert('Вы не заполнили поле с основным текстом!') </script>
<?php exit();}


if($_POST['author']){
 $author = $_POST['author'];
 $author = trim($author);
}
if(!empty($author)){
 $author = stripslashes($author);
 $author = htmlspecialchars($author);
} else{?>
 <script> alert('Вы не вписали автора статьи!') </script>
<?php exit();}


if($_POST['miniature']){
  $miniature = $_POST['miniature'];
  $miniature = trim($miniature);
}
if(!empty($miniature)){
  $miniature = stripslashes($miniature);
  $miniature = htmlspecialchars($miniature);
} else{?>
  <script> alert('Вы не заполнили путь к картинкам!') </script>
<?php exit();}


if($_POST['mini_miniature']){
  $mini_miniature = $_POST['mini_miniature'];
  $mini_miniature = trim($mini_miniature);
}
if(!empty($mini_miniature)){
  $mini_miniature = stripslashes($mini_miniature);
  $mini_miniature = htmlspecialchars($mini_miniature);
} else{?>
  <script> alert('Вы не заполнили путь к миниатюрам!') </script>
<?php exit();}


if($_POST['select_categories']){
  $select_categories = $_POST['select_categories'];
}

include('blocks/link.php');
$query = mysqli_query($link, "INSERT INTO Posts (meta_k, meta_d, title, description, text, author, img, mini_img, cat) VALUES ('$meta_k', '$meta_d', '$title', '$description', '$text', '$author', '$miniature', '$mini_miniature', '$select_categories')");
if($query){
?> <script> alert('Статья успешно добавлена в Базу Данных!') </script>
<?php } else{
?> <script> alert('Произошла ошибка при добавлении статьи, пожалуйста обратитесь к разработчикам!') </script>
<?php }
} else{?>
  <script> alert('Чтобы увидеть содержание данной страницы заполните все поля и нажмите на красную кнопку!!!') </script>
<?php }?>
