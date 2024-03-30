<!-- CST8285 Assignment 2 group 12:

Huaifang Yin: implement logout function
-->
<?php 
session_start();
session_unset();
session_destroy();

header('Location: index.php');

?>