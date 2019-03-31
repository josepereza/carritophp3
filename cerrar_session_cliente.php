<?php
session_start();
unset($_SESSION['cliente']);
unset($_SESSION['cliente_id']);
//session_destroy(); 

header("Location: ./index.php");


?>