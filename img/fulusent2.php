<?php

// some stuff to get it going
session_start();
include_once('config.php');
if(isset($_FILES['image']))
{
$file=explode('.',$_FILES['image']['name']);
$filename=$file[0];
$filenext=$file[1];

$newfile=$_SESSION['fulumail'].'.'.$filenext;

move_uploaded_file($_FILES['image']['tmp_name'],'images/preview/'.$newfile);
echo 'images/preview/'.$newfile;

}
else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Fulu Sent!</title>


<style type="text/css">
* {  font-size: 96%; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }</style>

</head>

<body>
<?php

$healthy = array("'", "&#039;", "&#145;", "&#146");
$name = $_REQUEST['title']." ".$_REQUEST['verb'];

// If something's empty, say this about it:
if(empty($_REQUEST['title']))
{$mes='Please enter a title!';
}
else if(empty($_REQUEST['verb']))
{$mes='Please enter a verb!';
}
else if(empty($_REQUEST['message']))
{$mes='Please enter a message!';
}

else if(($_REQUEST['link']) && ($_REQUEST['url']))
{$mes='You have both a link and a URL! Please deselect one!';
}
else {$mes='';} // nothing's wrong :)

/*  			if($_REQUEST['video']!='')
				{
						$content=$_REQUEST['video'];
				}
				else
				{
						$content=$_SESSION['fulumail'];
				} */

			mysql_query("INSERT INTO fulufeed SET 
			title='".str_replace("'",$healthy,$name)."',  
			message='".str_replace("'",$healthy,$_REQUEST['message'])."',
			url='".str_replace("'",$healthy,$_REQUEST['url'])."',
			picture='".$_REQUEST['photo']."'
			") 
			
			or die(mysql_error());
			
			// remote_user doesn't always work
			$remote_user = $_REQUEST['remote_user'];
			if (!$remote_user){
				$remote_user = "no le gusta";
			}
			
			/*mysql_query("INSERT INTO users SET 
			language='".str_replace("'","",$_REQUEST['language'])."',
			remote_user='".str_replace("'","",$remote_user)."',
			remote_port='".str_replace("'","",$_REQUEST['remote_port'])."',
			IP='".str_replace("'","",$_REQUEST['IP'])."' 
			")

			or die(mysql_error()); */
	?>
    
SUCCESS!
         
          <label class="lable">
  
 <a href="javascript:history.go(-1)">Back</a><br>
            <?php
			echo $mes;
			?></label>
       
    </aside>

</body>
</html>

<?php
}
	?>