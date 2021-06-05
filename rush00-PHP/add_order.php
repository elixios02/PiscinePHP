<?php
	session_start();
	if ($_SESSION['id_user'] > 1)
	{
		$id= "";
		$qt= "";
		foreach ($_SESSION['cart'] as $key => $value)
		{
			if ($value !== 0)
			{
				$id = $id . strval($key) . "-";
				$qt = $qt . strval($value) . "-";
			}
		}
		if (!$bdd = mysqli_connect('localhost', 'admin', 'root', 'db_blackmarket'))
			echo "Wesh grooooosse erreur la";
		$user = $_SESSION['id_user'];
		mysqli_query($bdd, "INSERT INTO t_orders (id_user, id_article, quantite, `date_order`) VALUES ('$user', '$id', '$qt', curdate())");
		$_SESSION['cart'] = NULL;
		header('Location: ./panier_valide.php');
			exit();
	}
	else
	{
		header('Location: ./panier_invalide.php');
			exit();
	}

?>
