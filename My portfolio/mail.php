<?php
  $recepient = "rostsangs@mail.ru";
  $nameSite = "Портфолио";

  $name = trim($_Post['name']);
  $mail = trim($_Post['mail']);
  $text = trim($_Post['text']);
  $message = "Имя: $name \nПочта: $mail \nСообщение: $text";
  $pageTitle = "Новое сообщение с сайта \"$nameSite\"";

  mail($recepient, $pageTitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
?>
