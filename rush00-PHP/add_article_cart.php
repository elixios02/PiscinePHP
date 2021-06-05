<?php
	session_start();
	include "get_fct.php";
	if (!$bdd = mysqli_connect('localhost', 'admin', 'root', 'db_blackmarket'))
		echo "Error !";
	if (is_valid_article($bdd, $_GET['id_article']))
	{
		$_SESSION['cart'][$_GET['id_article']]++;
		header('Location: cart.php');
		exit();
	}
	else
	{
		header('Location: fake_article.php');
		exit();
	}
?>
