<?php 
session_start();
unset($_SESSION['lvl']);
session_unset();
session_destroy();

header("Location:index.php");


?>