<?php

session_start();

if(isset($_SESSION['customer_id'])){
	unset($_SESSION['customer_id']);
	header('Location:/BookStore/index.php');
}

?>