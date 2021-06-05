<?PHP
session_start();
if (!$bdd = mysqli_connect('localhost', 'admin', 'root', 'db_blackmarket'))
	echo "eroor poto";
$oldpass = mysqli_real_escape_string($bdd, $oldpass);
$newpass = mysqli_real_escape_string($bdd, $newpass);
$oldpass = hash("whirlpool", $_POST['oldpw']);
$newpass = hash("whirlpool", $_POST['newpw']);

$id_user = $_SESSION["id_user"];
$sql = "SELECT passwd FROM t_users WHERE id_user = '$id_user'";
if ($firstpass = mysqli_query($bdd, $sql))
{
	$firstpass = mysqli_fetch_assoc($firstpass);
	if ($oldpass != $firstpass['passwd'])
	{
		echo "ERROR BITCHes";
		return (0);
	}
	else
	{
		$sql = "UPDATE t_users SET passwd = '$newpass' WHERE id_user = '$id_user'";
		mysqli_query($bdd, $sql);
	}
}
	header('Location: ./compte_modify.php');
		exit();
?>
