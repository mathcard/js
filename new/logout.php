<?php
require "verifica.php";
setcookie("name2","",0);
session_destroy();
header ("location: login.html");
?>

