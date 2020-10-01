<?php
require('header.inc');
?>

<?php
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
  <title>Автозапчати - Заказы клиентов</title>
</head>
<body>
<h1>Лабораторная работа №4 по теме сохранение и восстановление данных посредством использования массивов и текстовых файлов</h1>
<h2>Автозапчасти</h2>
<h3>Заказы клиентов</h3>
<?php
  $orders= file("orders_4.txt");

  $number_of_orders = count($orders);

  echo "Всего было заказов: $number_of_orders";

  if ($number_of_orders == 0) {
    echo "<p><strong>Нет ожидающих заказов.
          Попробуйте позже.</strong></p>";
  }

  echo "<table border=\"1\">\n";
  echo "<tr><th bgcolor=\"#CCCCFF\">Дата заказа</th>
            <th bgcolor=\"#CCCCFF\">Шины</th>
            <th bgcolor=\"#CCCCFF\">Диски</th>
            <th bgcolor=\"#CCCCFF\">Моторные масла</th>
            <th bgcolor=\"#CCCCFF\">Охлаждение</th>
            <th bgcolor=\"#CCCCFF\">Всего</th>
            <th bgcolor=\"#CCCCFF\">Адрес клиента</th>
            <th bgcolor=\"#CCCCFF\">ФИО клиента</th>
         <tr>";

  for ($i=0; $i<$number_of_orders; $i++) {
    //разбивка строк
    $line = explode("\t", $orders[$i]);

    // только заказанные
    $line[1] = intval($line[1]);
    $line[2] = intval($line[2]);
    $line[3] = intval($line[3]);
    $line[4] = intval($line[4]);

    // вывод заказов
    echo "<tr>
             <td>".$line[0]."</td>
             <td align=\"right\">".$line[1]."</td>
             <td align=\"right\">".$line[2]."</td>
             <td align=\"right\">".$line[3]."</td>
             <td align=\"right\">".$line[4]."</td>
             <td align=\"right\">".$line[5]."</td>
             <td>".$line[7]."</td>
             <td>".$line[8]."</td>
          </tr>";
  }

  echo "</table>";
?>
</body>
</html>
<?php
require('footer.inc');
?>