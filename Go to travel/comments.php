<?php
error_reporting(E_ALL);
if(isset($_POST['name_comment']) && isset($_POST['text_comment'])){
  $name = trim($_POST['name_comment']);
  $comment = trim($_POST['text_comment']);
} else {
  exit('Заполните поле с именем и текстом комментария и нажмите кнопку отправить комментарий');
}

if(isset($_POST['id'])){
$id = $_POST['id'];
} else {
  exit('Произошла ошибка при добавлении комментария, пожалуйста свяжитесь с администратором по почте и сообщите ему о данной ошибке');
}

if(empty($name) && empty($comment)){
  exit('Вы не заполнили поля с именем и комментарием');
} else if(empty($name)){
  exit('Вы не заполнили поле с именем');
} else if(empty($comment)) {
  exit('Вы не заполнили поле с комментарием');
}

$name = stripslashes($name);
$name = htmlspecialchars($name);
$comment = stripslashes($comment);
$comment = htmlspecialchars($comment);

include('blocks/link.php');
$query = mysqli_query($link, "INSERT INTO comments (post,text,author) VALUES ('$id', '$comment', '$name')");
if($query){
  $address = 'rostsangs@mail.ru';
	$subject = 'Новый комментарий на блоге';
	$query = mysqli_query($link, "SELECT title FROM Posts WHERE id = '$id' ");
	$result = mysqli_fetch_assoc($query);
	$post_title = $result['title'];
	$message = "Появился комментарий к статье - ".$post_title."\r\nКомментарий добавил(а):".$name."\r\nТекст комментария: ".$comment."\r\nСсылка на заметку: http://localhost:8888/Go_to_travel_2/view_post.php?id=".$id."";
	mail($address, $subject, $message, "charset = UTF - 8\r\n");  // функция отправления почты

	echo "<html> <head>
			<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
		  </head> </html>";
		  exit();
} else {
  exit('Произошла ошибка при добавлении комментария, пожалуйста свяжитесь с администратором по почте и сообщите ему о данной ошибке');
}
?>
