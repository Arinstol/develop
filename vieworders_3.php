<?php ini_set('display_errors', 1); ?>
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
<h1>Лабораторная работа №3 по теме сохранение и восстановление данных посредством СУБД - MySQL</h1>
<h2>Автозапчасти</h2>
<h3>Заказы клиентов</h3>

<?php
//БД
$hostname='localhost';
$user='root';
$password='';
$db='mc';

if(!$link = mysql_connect($hostname, $user, $password))
{
  //echo '<br> не могу соединиться с серваком БД<br>';
  exit();
}
//echo '<br>Соединение успешно<br>';

if(!mysql_select_db($db, $link))
{
  //echo '<br> не могу выбрать БД<br>';  
  exit();
}
else
{
echo '<br> Выбор БД успешен<br>';
}
$query_1 = 'select `za`.`id`, `za`.`fio`, `za`.`address`, `za`.`data`, `t`.`id`, `t`.`tireqty`, `t`.`oilqty`, `t`.`sparkqty`, `t`.`coldqty` FROM `zakaz` as `za`, `tovar` as `t` where `za`.`id` = `t`.`id` order by `za`.`data`';
$result_1 = mysql_query ($query_1);
?>
<table border=1 color=black width=100 height=100>
<tr>
<td><b>№</b></td><td><b>ФИО</b></td><td><b>Адрес</b></td><td><b>Дата заказа</b></td><td><b>шины</b></td><td><b>диски</b></td><td><b>моторные масла</b></td><td><b>охлаждения</b></td>
<?
while ($row_1 = mysql_fetch_array ($result_1))
{
$id=$row_1['id'];
$fio=$row_1['fio'];
$address=$row_1['address'];
$data =$row_1['data'];
$tireqty=$row_1['tireqty'];
$oilqty=$row_1['oilqty'];
$sparkqty=$row_1['sparkqty'];
$coldqty=$row_1['coldqty'];
?></tr>
<tr><td><? echo $id ?></td><td><? echo $fio ?></td><td><? echo $address ?></td><td><? echo $data ?></td><td><? echo $tireqty ?></td><td><? echo $oilqty ?></td><td><? echo $sparkqty ?></td><td><? echo $coldqty ?></td>
</tr>
<?
}
?> </table> 
</body>
</html>
<?php
require('footer.inc');
?>