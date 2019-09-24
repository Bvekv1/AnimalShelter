<?php
session_start();
setcookie('bibek','value',time()-1);
session_destroy();
header("location:index.php");
?>
