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
$password='Qwerty123';
$db='mc';

if(!$link = mysql_connect($hostname, $user, $password))
{
  //echo '<br> не могу соединиться с серваком БД<br>'  
  exit();
}

if(!mysql_select_db($db, $link))
{
  //echo '<br> не могу выбрать БД<br>'  
  exit();
}
else
{
echo '<br> Выбор БД успешен<br>'
}

$query_1 = 'select zakaz.id, zakaz.fio, zakaz.address, zakaz.data, tavar.id, tovar.tireqty, tovar.oilqty, tovar.sparkqty, tovar.coldqty FROM zakaz, tovar where zakaz.id = tovar.id order by zakaz.data';
$result_1 = mysql_query ($query_1);

?>

<table border=1 color=black width=100% height=100%>
<tr>
<td><b>№</b></td><td><b>ФИО</b></td><td><b>Адрес</b></td><td><b>Дата заказа</b></td><td><b>шины</b></td><td><b>диски</b></td><td><b>моторные масла</b></td><td><b>охлаждения</b></td>

<?
