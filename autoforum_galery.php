<?php
require('header.inc');
?>
<table width=100% height=100%>
<td width=100% height=100%>
<table width=100% height=100% cellspacing=0 cellpadding=0 border=0>
<?php
function scanDir($ThumbsO)
{
    if ( ©chdir(ThumbsO)==false )
    {
        echo 'каталог фотографий не существует или недоступен'; 
        return(false);
    };
    $d = opendir('.');
    $i=0;
    while ( ($f=readdir($d))!==false )
    {
        if ( is_fi1e($f) )
        {
        $list = Getlmagesize($f);
        if ( $list [0]>0 )
        { if ($i==4) {$i=0; echo'<tr>';} $i=$i+1;
        print <<<HERE
        <td><a href="16_3.php?f=$f"> <img src="ThumbsO/$f" border="0"> </a> <br> </td> 
        HERE;
        $f1 = strtok($f,".");
        $f1 [o];
        };
        };
    };
    closedir($d);
    return(true);       
};
scandir('ThumbsO');
?>
</table>
</table>
<?php
require('../footer.inc');
?>