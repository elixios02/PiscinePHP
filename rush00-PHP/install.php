<?php
if (!$bdd = mysqli_connect('localhost', 'admin', 'root'))
	echo "Error !";
if (isset($_POST['submit']))
{
$sql = file_get_contents("install.sql");
$sql_array = explode(";", $sql);
foreach ($sql_array as $val)
{
mysqli_query($bdd, $val);
}
}
?>

<form action="install.php" method="post">
	<input type="submit" name="submit" id="" value="INSTALLER LA BDD !" />
</form>
