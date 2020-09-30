<?php
require('header.inc');
?>
<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
	<title>Автозапчасти</title>
</head>

<body>
<h1>Лабораторная работа №1 по теме передача данных из формы в основную программу и их последующая обработка</h1>
<h2>Автозапчасти</h2>
<h3>Форма заказа</h3>

<form action="processorder.php" method=post>
<table border=0>
<tr bgcolor=#CCCCCC>
	<td width=150>Товар</td>
	<td width=15>Количество</td>
</tr>
<tr>
	<td>Шины</td>
	<td align=center><input type='text' name='tireqty' size='3' maxlenght='3'></td>
</tr>
<tr>
	<td>Диски</td>
	<td align=center><input type='text' name='oilqty' size='3' maxlenght='3'></td>
</tr>
<tr>
	<td>Моторные масла</td>
	<td align=center><input type='text' name='sparkqty' size='3' maxlenght='3'></td>
</tr>
<tr>
	<td>Охлаждение</td>
	<td align=center><input type='text' name='coldqty' size='3' maxlenght='3'></td>
</tr>
<tr>
	<td>Как вы нашли нашу компанию?</td>
	<td><select name='find'>
			<option value='Я регулярный клиент'>Я регулярный клиент
			<option value='В интернете'>В интернете
			<option value='В телефонном справочнике'>В телефонном справочнике
			<option value='Кто-то порекомендовал'>Кто-то порекомендовал
		<select>
	</td>
</tr>
<tr>
	<td colspan='2' align='center'><input type='submit' value='Отправить заказ'></td>
</tr>
</table>
</form>
</body>
</html>
<?php
require('footer.inc');
?>