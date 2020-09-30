<?php
require('header.inc');
?>
<?php
  $document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
  <title>Автозапчати - Заказы клиентов</title>
</head>
<body>
<h1>Лабораторная работа №2 по теме сохранение и восстановление данных посредством текстовых файлов</h1>
<h2>Автозапчасти</h2>
<h3>Заказы клиентов</h3>
<?php

   @$fp = fopen("orders.txt", 'rb');
   flock($fp, LOCK_SH); // lock file for reading
   if (!$fp) {
     echo "<p><strong>Нет ожидающих заказов.
           Пожалуйста, попытайтесь позже.</strong></p>";
     exit;
   }

   while (!feof($fp)) {
      $order= fgets($fp);
      echo htmlspecialchars($order)."<br />";
   }

  flock($fp, LOCK_UN); // release read lock
  fclose($fp); 
?>
</body>
</html>
<?php
require('footer.inc');
?>