<?php $link = mysqli_connect('localhost','root','root','GoToTravel');
if(!$link){
  echo 'Ошибка:'. mysqli_connect_error().'Код ошибки:'. mysqli_connect_errno();
  exit();
}
 ?>
