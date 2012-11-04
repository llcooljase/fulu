<?php
include("config.php");
error_reporting(0);

if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$name=mysql_escape_String($_POST['name']);


mysql_query("update fulu_fulus set $name=$name+1 where id='$id'");


$result=mysql_query("select up,down from fulu_fulus where id='$id'");
$row=mysql_fetch_array($result);
$up_value=$row['up'];
$down_value=$row['down'];
$total=$up_value+$down_value;

$up_per=($up_value*100)/$total;
$down_per=($down_value*100)/$total;
?>

<p  class="votetext">Ratings for this blog</b> ( <?php echo $total; ?> total)</p>

<div class="votetable"><table width="100%">

<tr>
<td width="100%"><?php echo $up_value; ?></td><td width="100%"><?php echo $down_value; ?></td>
</tr>
</table></div>

<?php
//echo $id=mysql_escape_String($_POST['id']);
}
?>