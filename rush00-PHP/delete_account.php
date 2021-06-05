<?php
	session_start();
	if (!$bdd = mysqli_connect('localhost', 'admin', 'root', 'db_blackmarket'))
		echo "Wesh grooooosse erreur la";
	$id_user = $_SESSION['id_user'];
	mysqli_query($bdd, "DELETE FROM t_users WHERE id_user = '$id_user';");
	header('Location: logout.php');
		exit();
?>
