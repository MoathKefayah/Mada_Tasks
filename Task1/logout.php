<?php
session_start();
unset($_SESSION['usere']);
session_destroy();
header('location: index.php');
?>
