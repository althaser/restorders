<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);
  session_start();
  session_destroy();
  unset($_SESSION["id"]);
  unset($_SESSION["username"]);
  header("Location: index.php");
?>

