<!-- FULU GETTER MACHINE v1.0 by Jason Adleberg! -->


<!-- Load JQuery -->
<script type="text/javascript" src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>

<!-- The fun part -->
<?php
/*error_reporting(0);

// Connect to Database
include('config.php');

// Define variables
$per_page = 8; // 8 fulus/page, subject to change.

// How to get the page
if($_GET)
{$page=$_GET['page'];}

// Let's figure out which fulus to get
$forcount = "select * from fulus";
$count = mysql_num_rows($forcount);
$pages = ceil($count/$per_page);

// (Trust me this does it)
$start = $count - (($pages- $page+1)*$per_page);

if ($start < 0) {
	$plus = $per_page + $start;
	$start = 0;
}

else {$plus = $per_page;}
$sql = "select * from fulus limit $start,$plus";
$query = mysql_query($sql);
?>



		
<?php

// get data
while($data= mysql_fetch_array($query))
{

//spill out message
$message = $data['message'];
	

?>

<?php echo $message;?>

                    <?php
}	
*/

echo 'spaghetti';
						?>
