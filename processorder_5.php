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
function Display($tireqty, $oilqty, $sparkqty, $coldqty, $fio, $addresss, $document_root)
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
<table width=100% height=100% border=1><tr><td class=cont > <? echo $this->zakaz ($tireqty, $oilqty, $sparkqty, $coldqty, $fio, $address, $document_root); ?> </td></table>
<?
$this -> DisplayFooter();
echo "</body>\n</html>\n";
}
function zakaz($tireqty, $oilqty, $sparkqty, $coldqty, $fio, $addresss, $document_root) 
{

// <?php
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
?>

<html>
<head>
	<title>Автозапчасти</title>
</head>

<body>
<h1>Осуществление разбивки Веб-окна посредством использования технологии ООП</h1>
<h2>Автозапчасти</h2>
<h3>Результаты заказа</h3>
<?php
$totalqty = 0;
$totalamount = 0.00;

$totalqty += $tireqty;
$totalqty += $oilqty;
$totalqty += $sparkqty;
$totalqty += $coldqty;

define('TIREPRICE',65);
define('OILPRICE',100);
define('SPARKPRICE',25);
define('COLDPRICE',30);

echo "<p>Заказ обработан в ".date('H:i, jS F Y')."</p>";
echo "<p>Список Вашего заказа: </p>";
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

$total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE + $coldqty * COLDPRICE;
$total = number_format($total, 2, '.',' ');
echo "Итого по заказу: ".$total."<br />";
echo "<p>ФИО клиента ".$fio."</p>";
echo "<p>Адрес доставки ".$address."</p>";

$outputstring = $date."\t".$tireqty." шин \t".$oilqty." дисков\t"
                .$sparkqty." моторных масел\t".$coldqty." охлаждений\t\$".$totalamount
                ."\t".$date."\t".$address." Адрес доставки \t".$fio." ФИО клиента\n";
//файл добавления
$date_1 = date ('Y-m-d H:i:s',mktime());
$query = "insert into `zakaz` (`fio`, `address`, `data`) values ('$fio','$address','$date_1')";
$result = mysql_query($query);
$query_1 = "SELECT `id` FROM `zakaz` WHERE `fio`='$fio'";
//вывод если что-то не insert
//echo($query); 
//echo($query_1);
$result_1=mysql_query($query_1);
//echo($result_1);

while ($row = mysql_fetch_array($result_1))
{

    $id=$row['id'];
}

//для проверки ошибок добавления в бд
//$result = mysql_query($row) || die(mysql_error()); 

$query = "insert into `tovar` (`id`, `tireqty`, `oilqty`, `sparkqty`, `coldqty`) values ('$id', '$tireqty', '$oilqty', '$sparkqty', '$coldqty')";
//вывод если что-то не insert
//echo($query);
$result = mysql_query ($query);

echo '<p>Заказ сохранен</p>';
?>
<a href='vieworders_5.php'>Интерфейс персонала для просмотра файла заказов</a>
<?}}
$services = new orderformPage();
$content ='cddc';
$services -> SetContent($content);
$services -> SetTitle('Лобораторная работа по теме: ООП на PHP');
$services -> Setnazvanie('Лабораторные работы по курсу разработка интернет приложений в сфере коммерции посредством PHP и MySQL <br> Студента группы ПИс-181: Баянова Ульяна Сергеевна <br> Проверил: Киринберг');
$services -> Display($tireqty, $oilqty, $sparkqty, $coldqty, $fio, $addresss, $document_root);
//$services -> zakaz($tireqty, $oilqty);
?>