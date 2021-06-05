<?php
	function get_articles_by_id($bdd, $id)
	{
		if ($resultat = mysqli_query($bdd, "SELECT * FROM t_articles WHERE id_categorieA = '$id' OR id_categorieB = '$id'"))
		{
			while($donnees = mysqli_fetch_assoc($resultat))
				$tab[] = $donnees;
		}
		else
			echo "QUERY ERROR !";
		return ($tab);
	}

	function get_all_articles($bdd, $id)
	{
		if ($resultat = mysqli_query($bdd, "SELECT * FROM t_articles"))
		{
			while($donnees = mysqli_fetch_assoc($resultat))
				$tab[] = $donnees;
		}
		else
			echo "QUERY ERROR !";
		return ($tab);
	}

	function is_valid_article($bdd, $id_article)
	{
		if ($resultat = mysqli_query($bdd, "SELECT * FROM t_articles WHERE id_article = '$id_article'"))
		{
			$donnees = mysqli_fetch_assoc($resultat);
			if ($donnees['nom'] && $donnees['nom'] != "")
				return (TRUE);
		}
		return (FALSE);
	}
?>
