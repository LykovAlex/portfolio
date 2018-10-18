<?php session_start();
$_SESSION['name'] = 'travel'; ?>
<?php
  if(isset($_POST['password'])){
    $password = $_POST['password'];
    include('blocks/link.php');
    $query = mysqli_query($link, "SELECT * FROM password");
    $result = mysqli_fetch_assoc($query);
    if($password == $result['password']){

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Блог путешественника </title>
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>


      <?php include('blocks/header_for_index.php'); ?>

        <h2 id="hello_admin"> Добро пожаловать на страницу администратора! </h2>
      <div class="main">

                                                                       <!-- Content -->
        <div class="content">


        </div>

        <?php include('blocks/sidebar.php'); ?>
        <?php include('blocks/footer.php'); ?>
      <?php } else {?>
        <script> alert('Вы ввели неверный пароль!!!') </script>
        <html>
        <head>
          <meta http-equiv='Refresh' content='0; URL=index.php'>
        </head>
        </html>
    <?php  }
    } else {?>
      <script> alert('Введите пароль!!!') </script>
      <html>
      <head>
        <meta http-equiv='Refresh' content='0; URL=index.php'>
      </head>
      </html>
    <?php }  ?>
