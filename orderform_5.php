<?php
require('page_5.inc');

class orderformPage extends Page
{
var $row2buttons = array('Re-engineering' => 'reengineering.php',
						 'Standards Compliance' => 'standards.php', 
						 'Buzzword Compliance' => 'buzzword.php',
						 'Mission Statements' => 'mission.php'
						 );
function Display()
{
echo "<html>\n<head>\n";
$this -> DisplayTitle ();
$this -> DisplayKeywords ();
//$this -> DisplayDescription ();
$this -> DisplayStyles();
echo "</head>\n<body>\n";
$this ->DisplayHeader ();
$this -> DisplayMenu ($this ->buttons);
$this -> DisplayMenu ($this->row2buttons);
?> 
<table width=100% height=100% border=1><tr><td class=cont > <? echo $this->content; ?> </td></table> 
<?
//echo $this->content;
$this -> DisplayFooter(); 
echo "</body>\n</html>\n";
}
}
$services = new orderformPage();
$content ='
<form action="processorder_5.php" method=post>
<table border=0>
<tr bgcolor=#CCCCCC>
	<td width=150>Товар</td>
	<td width=15>Количество</td>
</tr>
<tr>
	<td>Шины</td>
	<td align="left"><input type="text" name="tireqty" size="3" maxlenght="3"></td>
</tr>
<tr>
	<td>Диски</td>
	<td align="left"><input type="text" name="oilqty" size="3" maxlenght="3"></td>
</tr>
<tr>
	<td>Моторные масла</td>
	<td align="left"r><input type="text" name="sparkqty" size="3" maxlenght="3"></td>
</tr>
<tr>
	<td>Охлаждение</td>
	<td align="left"><input type="text" name="coldqty" size="3" maxlenght="3"></td>
</tr>
<tr>
	<td>ФИО клиента</td>
	<td align="left"><input type="text" name="fio" size="3" maxlenght="3"></td>
</tr>
<tr>
	<td>Адрес доставки</td>
	<td align="left"><input type="text" name="address" size="3" maxlenght="3"></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="Отправить заказ"></td>
</tr>
</table>
</form> ';
$services -> SetContent($content);
$services -> SetTitle('Лобораторная работа по теме: ООП на PHP');
$services -> Setnazvanie('Лабораторные работы по курсу разработка интернет приложений в сфере коммерции посредством PHP и MySQL <br> Студента группы ПИс-181: Баянова Ульяна Сергеевна <br> Проверил: Киринберг');
$services -> Display();
?>