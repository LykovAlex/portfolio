<html>
<head>
  <meta http-equiv='Refresh' content='0; URL=edit_categories.php'>
</head>
</html>


<?php
error_reporting(E_ALL);
if(isset($_POST['submit'])){

$cat_id = $_POST['cat_id'];

 if($_POST['meta_k']){
  $meta_k = $_POST['meta_k'];
  $meta_k = trim($meta_k);
}
if(!empty($meta_k)){
  $meta_k = stripslashes($meta_k);
  $meta_k = htmlspecialchars($meta_k);
} else{?>
  <script> alert('Вы не заполнили поле с ключевами словами!') </script>
<?php exit();}


if($_POST['meta_d']){
 $meta_d = $_POST['meta_d'];
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

if($_POST['description_for_cat']){
 $description_for_cat = $_POST['description_for_cat'];
 $description_for_cat = trim($description_for_cat);
}
if(!empty($description_for_cat)){
 $description_for_cat = stripslashes($description_for_cat);
 $description_for_cat = htmlspecialchars($description_for_cat);
} else{?>
 <script> alert('Вы не заполнили поле с описанием рубрики для миниатюры!!!!!!!!') </script>
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


if($_POST['img']){
  $img = $_POST['img'];
  $img = trim($img);
}
if(!empty($img)){
  $img = stripslashes($img);
  $img = htmlspecialchars($img);
} else{?>
  <script> alert('Вы не заполнили путь к картинкам!') </script>
<?php exit();}


if($_POST['img_for_cat']){
  $img_for_cat = $_POST['img_for_cat'];
  $img_for_cat = trim($img_for_cat);
}
if(!empty($img_for_cat)){
  $img_for_cat = stripslashes($img_for_cat);
  $img_for_cat = htmlspecialchars($img_for_cat);
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

$kitchen_id = $_POST['kitchen_id'];




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

$price_id = $_POST['price_id'];




include('blocks/link.php');
$query = mysqli_query($link, "UPDATE Categories SET meta_k='$meta_k', meta_d='$meta_d', title='$title', description='$description', description_for_cat='$description_for_cat',  text='$text', author='$author', img='$img', img_for_cat='$img_for_cat' WHERE id = '$cat_id' ");
$query2 = mysqli_query($link, "UPDATE About_kitchen SET meta_keywords='$kitchen_k', meta_description='$meta_d', title='$kitchen_title', text='$kitchen_text' WHERE id = '$kitchen_id' ");
$query3 = mysqli_query($link, "UPDATE About_price SET meta_keywords='$price_k', meta_description='$meta_d', title='$price_title', text='$price_text' WHERE id = '$price_id' ");
if($query){
  ?> <script> alert('Категории успешно отредактиованы!') </script>
  <?php } else{
  ?> <script> alert('Произошла ошибка при редактировании категорий, пожалуйста обратитесь к разработчикам!') </script>
  <?php }
if($query2){
  ?> <script> alert('Категории про кухню успешно отредактиованы!') </script>
  <?php } else{
  ?> <script> alert('Произошла ошибка при редактировании категорий про кухню, пожалуйста обратитесь к разработчикам!') </script>
  <?php }
if($query3){
  ?> <script> alert('Категории про цены успешно отредактиованы!') </script>
  <?php } else{
  ?> <script> alert('Произошла ошибка при редактировании категорий про цены, пожалуйста обратитесь к разработчикам!') </script>
  <?php }



  } else{?>
    <script> alert('Чтобы увидеть содержание данной страницы заполните все поля и нажмите на красную кнопку!!!') </script>
  <?php }?>
