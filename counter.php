<?php
/* counter */

//opens count.txt to read the number of hits

$datei = fopen("count.txt","r");
$count = fgets($datei, 1000);
fclose($datei);
$count=$count + 1;
echo "<h2 style:'float:right !important; background:black; color:white; width:150px; font-size:16px; padding:10px; position:fixed;'>Visitors so Far: $count</h2>";

// opens count.txt to change new hit number

$datei = fopen("count.txt", "w");
fwrite($datei, $count);
fclose($datei);
?>
