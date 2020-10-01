<?php
require('header.inc');
?>

<?php
  $tireqty = (int) $_POST['tireqty'];
  $oilqty = (int) $_POST['oilqty'];
  $sparkqty = (int) $_POST['sparkqty'];
  $coldqty = (int) $_POST['coldqty'];
  $address = preg_replace('/\t|\R/',' ',$_POST['address']);
  $fio = $_POST['fio'];
  $date = date('H:i, jS F Y');
?>
<html>
<head>
	<title>Автозапчасти</title>
</head>

<body>
<h1>Лабораторная работа №2 по теме сохранение и восстановление данных посредством текстовых файлов</h1>
<h2>Автозапчасти</h2>
<h3>Результаты заказа</h3>

<?php
    echo "<p>Заказ обработан в ".date('H:i, jS F Y')."</p>";
    echo "<p>Список Вашего заказа: </p>";

    $totalqty = 0;
    $totalamount = 0.00;

    define('TIREPRICE',65);
    define('OILPRICE',100);
    define('SPARKPRICE',25);
    define('COLDPRICE',30);

    $totalqty = $tireqty + $oilqty + $sparkqty + $coldqty;
    echo 'Заказано товаров: '.$totalqty.'</br>';


    if ($totalqty == 0) 
    {
      echo "Вы ничего не заказали на предыдущей странице!<br />";
    } else 
    {
      if ($tireqty > 0) {
        echo htmlspecialchars($tireqty).' шин<br />';
      }
      if ($oilqty > 0) {
        echo htmlspecialchars($oilqty).' дисков<br />';
      }
      if ($sparkqty > 0) {
        echo htmlspecialchars($sparkqty).' моторных масел<br />';
      }
      if ($coldqty > 0) {
        echo htmlspecialchars($coldqty).' охлаждений<br />';
      }
    }

    $totalamount = $tireqty * TIREPRICE
        + $oilqty * OILPRICE
        + $sparkqty * SPARKPRICE
        + $coldqty * COLDPRICE;

    echo "Итого: $".number_format($totalamount,2)."<br />";

    $taxrate = 0.10;  // налог 10%
    $totalamount = $totalamount * (1 + $taxrate);
    echo "Всего, включая налог с продаж: $".number_format($totalamount,2)."<br />";
    echo "<p>ФИО клиента ".htmlspecialchars($fio)."</p>";
    echo "<p>Адрес доставки ".htmlspecialchars($address)."</p>";

    $outputstring = $date."\t".$tireqty." шин \t".$oilqty." дисков\t"
                    .$sparkqty." моторных масел\t".$coldqty." охлаждений\t\$".$totalamount
                    ."\t".$date."\t" .$fio." ФИО клиента\t".$address." Адрес доставки \n";

    // открытие файла добавления
    @$fp = fopen("orders.txt", 'ab');

    if (!$fp) {
      echo "<p><strong> Ваш заказ не может быть обработан в настоящее время. 
      Пожалуйста, попробуйте позже.</strong></p></body></html>";
      exit;
    }

    flock($fp, LOCK_EX);
    fwrite($fp, $outputstring, strlen($outputstring));
    flock($fp, LOCK_UN);
    fclose($fp);

    echo "<p>Заказ сохранен.</p>";
?>
<a href='vieworders_2.php'>Интерфейс для просмотра файла заказов</a>

</body>
</html>
<?php
require('footer.inc');
?>