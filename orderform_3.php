<?php
require('header.inc');
?>
<html>
<head>
	<title>Автозапчасти</title>
</head>

<body>
<h1>Лабораторная работа №3 по теме сохранение и восстановление данных посредством СУБД - MySQL</h1>
<h2>Автозапчасти</h2>
<h3>Форма заказа</h3>
<formaction="processorder_3.php" method=post>
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
	<td>ФИО клиента</td>
	<td align=center><input type='text' name='fio' size='40' maxlenght='40'></td>
</tr>
<tr>
	<td>Адрес доставки</td>
	<td align=center><input type='text' name='address' size='40' maxlenght='40'></td>
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