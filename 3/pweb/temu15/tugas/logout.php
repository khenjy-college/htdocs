<?php
session_start();
unset($_SESSION['lv']);
session_unset();
session_destroy();

header('location: index.php');
?>