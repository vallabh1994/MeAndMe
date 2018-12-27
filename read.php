<?php

echo shell_exec("ls");
$size = filesize("syslib.php");
echo $size;
$File1 = fopen("syslib.php","r");
$content = fread($File1,$size);
fclose($File1);

$File2 = fopen("output.txt","a");
fwrite($File2,$content,$size);
fclose($File2);


?>