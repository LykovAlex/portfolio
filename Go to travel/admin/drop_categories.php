<html>
<head>
  <meta http-equiv='Refresh' content='0; URL=delete_categories.php'>
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
$query = mysqli_query($link, "DELETE FROM Categories Where id = $id");
$query2 = mysqli_query($link, "DELETE FROM About_kitchen Where id = $id");
$query3 = mysqli_query($link, "DELETE FROM About_price Where id = $id");
if($query && $query2 && $query3){?>
    <script> alert('Рубрика успешно удалeна!') </script>
<?php }
else {?>
    <script> alert('Произошла ошибка при удалении рубрики, пожалуйста обратитесь к разработчикам') </script>
<?php }
?>
