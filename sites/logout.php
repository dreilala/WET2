<?php
//session_start();
session_destroy();
setcookie("userid", $id, time() +0);
header("Location: index.php"); 
exit; 
?>