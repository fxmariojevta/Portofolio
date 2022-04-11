<?php
if (strpos($_SERVER['PHP_SELF'],"hitcounter.php") != false)
{
header ("Location: ./");
exit();
}
$counterfile = './counter';
$counter = intval(@file_get_contents($counterfile)) + 1;
$file = fopen($counterfile,'w');
fwrite($file,$counter);
fclose($file);
echo $counter;
?>