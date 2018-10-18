<html>
<head>
  <meta http-equiv='Refresh' content='0; URL=new_categories.php'>
</head>
</html>


<?php
error_reporting(E_ALL);
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
  <script> alert('Вы не заполнили поле с названием рубрики!') </script>
<?php exit();}


if($_POST['description']){
 $description = $_POST['description'];
 $description = trim($description);
}
if(!empty($description)){
 $description = stripslashes($description);
 $description = htmlspecialchars($description);
} else{?>
 <script> alert('Вы не заполнили поле с описанием рубрики!') </script>
<?php exit();}

if($_POST['mini_description']){
 $mini_description = $_POST['mini_description'];
 $mini_description = trim($mini_description);
}
if(!empty($mini_description)){
 $mini_description = stripslashes($mini_description);
 $mini_description = htmlspecialchars($mini_description);
} else{?>
 <script> alert('Вы не заполнили поле с описанием рубрики для миниатюры!') </script>
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
 <script> alert('Вы не вписали автора рубрики!') </script>
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






if($_POST['kitchen_k']){
  $kitchen_k = $_POST['kitchen_k'];
  $kitchen_k = trim($kitchen_k);
}
if(!empty($kitchen_k)){
  $kitchen_k = stripslashes($kitchen_k);
  $kitchen_k = htmlspecialchars($kitchen_k);
} else{?>
  <script> alert('Вы не заполнили ключевые слова для кухни!') </script>
<?php exit();}


if($_POST['kitchen_d']){
  $kitchen_d = $_POST['kitchen_d'];
  $kitchen_d = trim($kitchen_d);
}
if(!empty($kitchen_d)){
  $kitchen_d = stripslashes($kitchen_d);
  $kitchen_d = htmlspecialchars($kitchen_d);
} else{?>
  <script> alert('Вы не заполнили ключевое описание для кухни!') </script>
<?php exit();}


if($_POST['kitchen_title']){
  $kitchen_title = $_POST['kitchen_title'];
  $kitchen_title = trim($kitchen_title);
}
if(!empty($kitchen_title)){
  $kitchen_title = stripslashes($kitchen_title);
  $kitchen_title = htmlspecialchars($kitchen_title);
} else{?>
  <script> alert('Вы не заполнили название для кухни!') </script>
<?php exit();}

if($_POST['kitchen_text']){
  $kitchen_text = $_POST['kitchen_text'];
  $kitchen_text = trim($kitchen_text);
}
if(!empty($kitchen_text)){
  $kitchen_text= stripslashes($kitchen_text);
  $kitchen_text = htmlspecialchars($kitchen_text);
} else{?>
  <script> alert('Вы не заполнили текст для кухни!') </script>
<?php exit();}



if($_POST['price_k']){
  $price_k = $_POST['price_k'];
  $price_k = trim($price_k);
}
if(!empty($price_k)){
  $price_k= stripslashes($price_k);
  $price_k = htmlspecialchars($price_k);
} else{?>
  <script> alert('Вы не заполнили ключевые слова для цен!') </script>
<?php exit();}

if($_POST['price_d']){
  $price_d = $_POST['price_d'];
  $price_d = trim($price_d);
}
if(!empty($price_d)){
  $price_d= stripslashes($price_d);
  $price_d = htmlspecialchars($price_d);
} else{?>
  <script> alert('Вы не заполнили ключевое описание для цен!') </script>
<?php exit();}

if($_POST['price_title']){
  $price_title = $_POST['price_title'];
  $price_title = trim($price_title);
}
if(!empty($price_title)){
  $price_title = stripslashes($price_title);
  $price_title = htmlspecialchars($price_title);
} else{?>
  <script> alert('Вы не заполнили название рубрики для цен!') </script>
<?php exit();}

if($_POST['price_text']){
  $price_text = $_POST['price_text'];
  $price_text = trim($price_text);
}
if(!empty($price_text)){
  $price_text = stripslashes($price_text);
  $price_text = htmlspecialchars($price_text);
} else{?>
  <script> alert('Вы не заполнили текст для цен!') </script>
<?php exit();}


include('blocks/link.php');
$query = mysqli_query($link, "INSERT INTO Categories (meta_k, meta_d, title, description, description_for_cat, text, author, img, img_for_cat) VALUES ('$meta_k', '$meta_d', '$title', '$description', '$mini_description', '$text', '$author', '$miniature', '$mini_miniature')");
if($query){
?> <script> alert('Рубрика успешно добавлена в Базу Данных!') </script>
<?php } else{
?> <script> alert('Произошла ошибка при добавлении рубрики, пожалуйста обратитесь к разработчикам!') </script>
<?php } ?>


<?php
$query2 = mysqli_query($link, "INSERT INTO About_kitchen (meta_keywords, meta_description, title, text) VALUES ('$kitchen_k', '$kitchen_d', '$kitchen_title', '$kitchen_text')");
if($query2){
?> <script> alert('Рубрика про кухню успешно добавлена в Базу Данных!') </script>
<?php } else{
?> <script> alert('Произошла ошибка при добавлении рубрики про кухню, пожалуйста обратитесь к разработчикам!') </script>
<?php } ?>
<?php

$query3 = mysqli_query($link, "INSERT INTO About_price (meta_keywords, meta_description, title, text) VALUES ('$price_k', '$price_d', '$price_title', '$price_text')");
if($query3){
?> <script> alert('Рубрика про цены успешно добавлена в Базу Данных!') </script>
<?php } else{
?> <script> alert('Произошла ошибка при добавлении рубрики про цены, пожалуйста обратитесь к разработчикам!') </script>
<?php }

} else{?>
  <script> alert('Чтобы увидеть содержание данной страницы заполните все поля и нажмите на красную кнопку!!!') </script>
<?php }?>
