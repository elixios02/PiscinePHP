<?php
	session_start();
	if ($_SESSION["loggued_on_user"] != "")
		$_SESSION["loggued_on_user"] = "";
	if ($_SESSION["id_user"] != "")
		$_SESSION["id_user"] = "";
		session_destroy();
	header('Location: index.php');
	 	exit();
?>
