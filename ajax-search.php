<?php


include_once ('config.php');

if(isset($_GET['keyword'])){
    $keyword = 	trim($_GET['keyword']) ;
$keyword = mysql_real_escape_string($keyword);



$query = "select * from fulus where email like '%$keyword%' or descr like '%$keyword%' or name like '%$keyword%' ";

$result = mysql_query($query);
if($result){
 
		  while($row = mysql_fetch_array($result)){

			  $content=$row['content'];

	preg_match('/[a-zA-Z]+:\/\/[0-9a-zA-Z;.\/?:@=_#&%~,+$]+/', $content, $matches);

	if($matches[0])
	{
		echo '<img src="images/fulu.png">';
			
	}
	else
			  {

		$string="";
			$fileCount=0;
			$filePath='images/preview/'; 
			$dir = opendir($filePath); 
			while ($file = readdir($dir)) { 
			  if (eregi($content,$file)) { # Look at only files with a .php extension
				$string = "$file";
				$fileCount++;
			  }
			}

			if ($fileCount > 0) {
echo '<div class="rsltthumb"><img src="'.$filePath.$string.'" width="45" height="45">';

			}
			}
     echo '<p> <b>'.$row['email'].'</b> '.$row['descr'].'</p></div>'   ;
	}
    }else {
        echo 'No Results for :"'.$_GET['keyword'].'"';
    }
  
}
else {
    echo 'Parameter Missing';
}




?>