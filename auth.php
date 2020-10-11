
<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: register_login.php");
exit(); }
?>