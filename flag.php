<?php
include("config.php");
$ip=$_SERVER['REMOTE_ADDR']; 

if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);

//Verify IP address in Voting_IP table
$ip_sql=mysql_query("select ip_add from Flagging_IP where mes_id_fk='$id' and ip_add='$ip'");
$count=mysql_num_rows($ip_sql);

if($count==0)
{
// Update Vote.
$sql = "update fulufeed set flag=flag+1 where id='$id'";
mysql_query( $sql);

// Insert IP address and Message Id in Voting_IP table.
$sql_in = "insert into Flagging_IP (mes_id_fk,ip_add) values ('$id','$ip')";
mysql_query( $sql_in);

echo "<script>alert('Thanks, we'll get right to it!');</script>";

$from = "holmadic@fulumail.com";
$to  = 'jason.adleberg@gmail.com' . ', '; // note the comma
$to .= 'aaegan@princeton.edu';
$subject = "Flag on ID No. ".$id;

$message='Message No. '.$id.' got a flag -- click here to go remove it: https://p3nlmysqladm001.secureserver.net/grid50/3431/index.php?lang=en-iso-8859-1&convcharset=iso-8859-1&collation_connection=utf8_unicode_ci&token=c679f9d54a91b91fb35dcdb0491ca15c <br>
Username: fulumail <br>
Password: Same as GoDaddy <br>
<br>
Holmadic,<br>
FuluMaster';
			 
$headers = "From: $from";

// boundary
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

// headers for attachment
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

// multipart boundary
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n"."Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

			
$ok = @mail($to, $subject, $message, $headers, $returnpath);
if($ok){ $mes= 'Mail Sent Successfully';

} else { $mes='Error #4075F34.'; }

}

else
{
echo "<script>alert('Thanks, we got it!');</script>";
}
}
	?>
    
