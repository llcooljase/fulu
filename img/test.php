<?php
session_start();
error_reporting(0);
include_once('config.php');

$query=mysql_query("SELECT * FROM fulufeed");
$count = mysql_num_rows($query);
$pages = ceil($count/$per_page)


?>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!--<script type="text/javascript">

$(document).ready(function() {	

		$("#fulus").load("fulumachine.php?page=1&pages=1&sort=recent");
});

</script>-->
</head>

<body>

<div id="fulus">

</div>

<div id="2">

</div>

<div class="clickdiv">

<a class="prev" page="6">PREVIOUS</a>
<script type="text/javascript">
				$(".prev").click(function() {
					var prevpage = parseInt($(this).attr("page"));
					if (prevpage == 0) {return false}
					var nextpage = prevpage + 2;
//					var sortMethod = $(this).attr("sortMethod");
					
 					$(this).attr("page",prevpage-1);
					$(this).nextAll('.next').attr("page",nextpage-1);
					$(this).parent().prevAll('#fulus').load("fulumachine.php?page=1&pages=1&sort=trending");
				});
			</script>
<a class="next" page="2">NEXT</a>
</div>
</body>