<?php

session_start();
if(isset($_SESSION[$_POST["name"]])) {
  echo $_SESSION[$_POST["name"]];
}else{
  var_dump($_SESSION);
}
 ?>
