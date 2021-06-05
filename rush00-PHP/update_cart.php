<?php
	session_start();
	$_SESSION['cart'][$_GET['id_article']] = $_GET['quantity'];
	header('Location: ./cart.php');
		exit();
?>
