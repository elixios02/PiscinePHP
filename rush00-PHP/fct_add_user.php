<?PHP
function check_login($bdd, $login)
{
	$resultat = mysqli_query($bdd, "SELECT id_user FROM t_users WHERE login = '$login'");
	if (mysqli_num_rows($resultat))
		return (FALSE);
	else
		return (TRUE);
}

if (!$bdd = mysqli_connect('localhost', 'admin', 'root', 'db_blackmarket'))
	echo "Error !";
if (check_login($bdd, $_POST['login']) === TRUE)
{
	$nom = mysqli_real_escape_string($bdd, $_POST['lastname']);
	$prenom = mysqli_real_escape_string($bdd, $_POST['firstname']);
	$adresse = mysqli_real_escape_string($bdd, $_POST['adresse']);
	$mail = mysqli_real_escape_string($bdd, $_POST['email']);
	$login = mysqli_real_escape_string($bdd, $_POST['login']);
	$passwd = mysqli_real_escape_string($bdd, $passwd);
	$passwd = hash("whirlpool", $_POST['passwd']);
	mysqli_query($bdd, "INSERT INTO t_users (prenom, nom, mail, adresse, login, passwd) VALUES ('$prenom', '$nom', '$mail', '$adresse', '$login', '$passwd')");
	header('Location: index.php');
	exit();
}
?>
