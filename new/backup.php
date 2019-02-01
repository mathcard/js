<?php
require "connect.php"; 
$sql = $con->query("select current_date as agora");
$row = $sql->fetch(PDO::FETCH_OBJ);
$agora = $row->agora;

$command ='c:\xampp\mysql\bin\mysqldump.exe teste > d:\math\backup-'.$agora.'.sql';
system($command);

require "modelobkp.php";
echo "<b>Backup efetuado!</b>";
header ("refresh:3; url=index.php");
?>