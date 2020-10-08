<?php
//echo "$tireqty";
//echo "$oilqty';
require ('page_5.inc');
class OrderformPage extends Page
{
var $row2buttons = array('Re-engineering' => 'reengineering.php',
						 'Standards Compliance' => 'standards.php', 
						 'Buzzword Compliance' => 'buzzword.php',
						 'Mission Statements' => 'mission.php' );
// var $tireqty ;
// var $oilqty ;
// var $sparkqty ;
// var $coldqty ;
// var $address ;
// var $fio ;
function Display_1($tireqty)
{
//$this->tireqty=$tireqty ;
//echo $this->tireqty; 
echo $tireqty; }
function Display()
{
echo "<html>\n<head>\n";
$this -> DisplayTitle();
$this -> DisplayKeywords();
$this -> Displaystyles();
echo "</head>\n<body>\n";
$this -> DisplayHeader();
$this -> DisplayMenu($this->buttons);
$this -> DisplayMenu($this->row2buttons);
?> 
<table width=100% height=100% border=1><tr><td class=cont > <? echo $this->spisok(); ?> </td></table>
<?
$this -> DisplayFooter();
echo "</body>\n</html>\n";
}
function spisok()
{
$tireqty = (int) $_POST['tireqty'];
$oilqty = (int) $_POST['oilqty'];
$sparkqty = (int) $_POST['sparkqty'];
$coldqty = (int) $_POST['coldqty'];
$address = preg_replace('/\t|\R/',' ',$_POST['address']);
$fio = $_POST['fio'];
$date = date('H:i, jS F Y');
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
//БД
  $hostname='localhost';
  $user='root';
  $password='';
  $db='mc';

  if(!$link = mysql_connect($hostname, $user, $password))
    {
      echo '<br> не могу соединиться с серваком БД<br>';  
      exit();
    }
  
  if(!mysql_select_db($db, $link))
  {
      echo '<br> не могу выбрать БД<br>';  
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
?> </table> <?
}}
$services = new orderformPage();
$content ='cddc';
$services -> SetContent($content);
$services -> SetTitle('Лобораторная работа по теме: ООП на PHP');
$services -> Setnazvanie('Лабораторные работы по курсу разработка интернет приложений в сфере коммерции посредством PHP и MySQL <br> Студента группы ПИс-181: Баянова Ульяна Сергеевна <br> Проверил: Киринберг');
$services -> Display($tireqty, $oilqty, $sparkqty, $coldqty, $fio, $addresss, $document_root);
//$services -> zakaz($tireqty, $oilqty);
?>