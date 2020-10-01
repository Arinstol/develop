<?php
require('header.inc');
?>
<html>
<head>
	<title>Автозапчасти</title>
</head>

<body>
<h1>Лабораторная работа №1 по теме передача данных из формы в основную программу и их последующая обработка</h1>
<h2>Автозапчасти</h2>
<h3>Результаты заказа</h3>
<?php
    echo '<p> Заказ обработан в ';
    echo date('H:i, js F');
    echo '</p>';

    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparkqty = $_POST['sparkqty'];
    $coldqty = $_POST['coldqty'];
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $find = $_POST['find'];

    echo '<p>Список Вашего заказа: </p>';
    echo $tireqty , ' шин</br>';
    echo $oilqty , ' дисков</br>';
    echo $sparkqty , ' моторных масел</br>';
    echo $coldqty , ' охлаждений</br>';

    $totalqty = 0;
    $totalqty = $tireqty + $oilqty + $sparkqty + $coldqty;
    echo 'Заказано товаров: '.$totalqty.'</br>';

    $totalamount = 0.00;

    define('TIREPRICE',65);
    define('OILPRICE',100);
    define('SPARKPRICE',25);
    define('COLDPRICE',30);

    $totalamount = $tireqty * TIREPRICE
        + $oilqty * OILPRICE
        + $sparkqty * SPARKPRICE
        + $coldqty * COLDPRICE;
    echo 'Итого: $'.number_format($totalamount,3).'</br>';
    $taxrate = 0.10; //налог 10%
    $totalamount = $totalamount * (1 + $taxrate);
    echo 'Всего, включая налог с продаж: $'.number_format($totalamount,2).'</br>';

?>
На вопрос как Вы нашли нашу компанию был получен ответ: <? echo $find ?>
</body>
</html>
<?php
require('footer.inc');
?>