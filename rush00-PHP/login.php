<?php
session_start();
function auth($bdd, $login, $passwd)
{
	$passwd = mysqli_real_escape_string($bdd, $passwd);
	$login = mysqli_real_escape_string($bdd, $login);
	$passwd = hash("whirlpool", $passwd);
	$resultat = mysqli_query($bdd, "SELECT id_user FROM t_users WHERE login = '$login' AND passwd = '$passwd'");
	if (mysqli_num_rows($resultat))
		return (TRUE);
	else
		return (FALSE);
}

function get_id_user_from_login($bdd, $login)
{
	$resultat = mysqli_query($bdd, "SELECT id_user FROM t_users WHERE login = '$login'");
	$donnees = mysqli_fetch_assoc($resultat);
	return ($donnees['id_user']);
}

if (!$bdd = mysqli_connect('localhost', 'admin', 'root', 'db_blackmarket'))
	echo "Error !";
if (auth($bdd, $_POST["login"], $_POST["passwd"]))
{
	$_SESSION["loggued_on_user"] = ucfirst(strtolower($_POST["login"]));
	$_SESSION["id_user"] = get_id_user_from_login($bdd, $_POST["login"]);
	header('Location: index.php');
 	exit();
}
else
{
	$_SESSION["loggued_on_user"] = "";
	header('Location: wrong_pass.php');
 	exit();
}
?>
