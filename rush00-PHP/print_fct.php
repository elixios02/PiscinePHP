<?php
	include "get_fct.php";
	function print_articles_by_id($bdd, $id)
	{
		if ($bdd)
		{
			$tab = get_articles_by_id($bdd, $id);
			$i = count($tab) - 1;
			$j = $i;
			while ($i >= 0)
			{
				echo '<div class="article"';
				if($j >= 8)
					echo 'style="width:296"';
				echo '><img class="article-img" src="'.$tab[$i]['url_img'].'">
				<div class="article-nom">'.$tab[$i]['nom'].'</div>
				<div class="article-bloc-prix"> <div class="article-prix">'.($tab[$i]['prix']/800).' BTC</div><a href=add_article_cart.php?id_article='.$tab[$i]['id_article'].'>'.'<img class="article-add" id="add'.$i.'"src="icons/shopping-cart-5.png" onmousedown=\'clickCart("add'.$i.'")\' onmouseup=\'clickCart("add'.$i.'")\'/></a></div>
				</div>';
					$i--;
				}
		}
		else
			echo "BDD ERROR !";
	}

	function get_article_name($bdd, $id_article)
	{
		if ($resultat = mysqli_query($bdd, "SELECT * FROM t_articles WHERE id_article = '$id_article'"))
		{
			$donnees = mysqli_fetch_assoc($resultat);
			return ($donnees['nom']);
		}
		return (NULL);
	}

	function get_article_price($bdd, $id_article)
	{
		if ($resultat = mysqli_query($bdd, "SELECT * FROM t_articles WHERE id_article = '$id_article'"))
		{
			$donnees = mysqli_fetch_assoc($resultat);
			return ($donnees['prix']);
		}
		return (NULL);
	}

	function is_articles($articles_tab)
	{
		foreach ($articles_tab as $key => $value)
		{
			if ($value)
				return (TRUE);
		}
		return (FALSE);
	}

	function print_order($bdd, $articles_tab)
	{
		if (is_articles($articles_tab))
		{
			echo '<div style="display:flex; flex-direction:column;"><table style="display:block; height: auto; width: auto;" border = "1" cellpadding = "6">
				<tbody>
			<tr>
				<td>ARTICLE</td>
				<td>QUANTITE</td>
				<td>PRIX</td>
			</tr>';
			$total = 0;
			foreach ($articles_tab as $key => $value)
			{
					if ($value)
					{
						$nom_article = get_article_name($bdd, $key);
						$prix_article = get_article_price($bdd, $key);
						$total += ($prix_article * $value / 800);
						echo '<tr>
								<td>'.$nom_article.'</td>
								<td style="text-align:center;"><form action="update_cart.php"><input type="number" min=0 max=99 name="quantity" value="'.$value.'"></td>
								<td style="text-align:right;">'.($prix_article * $value / 800).' BTC</td>
								<input type="hidden" name="id_article" value="'.$key.'"/>
								<td><input type="image" src="icons/reload.png" alt="submit" height="16px"></form></td>
							</tr>';
					}
			}
			echo '<th style="text-align:right;" colspan = "3">'.'TOTAL : '.$total . "BTC".'</th>';
			echo '</tbody></table>';
			echo '<div style="text-align:right; position:relative; top:15px;"><a href="add_order.php"><input type="button" value="Valider le panier"></a></div></div>';
		}
		else
			echo "Panier vide";
	}
?>
