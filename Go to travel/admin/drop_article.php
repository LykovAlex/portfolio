<html>
<head>
  <meta http-equiv='Refresh' content='0; URL=delete_article.php'>
</head>
</html>
<?php
if(isset($_POST['id'])){
  $id = $_POST['id'];
}
else{?>
  <script> alert('Выберите статью для удаления!') </script>
<?php }
include('blocks/link.php');
$query = mysqli_query($link, "DELETE FROM Posts Where id = $id");
if($query){?>
    <script> alert('Статья успешно удалeна!') </script>
<?php }
else {?>
    <script> alert('Произошла ошибка при удалении статьи, пожалуйста обратитесь к разработчикам') </script>
<?php }
?>
