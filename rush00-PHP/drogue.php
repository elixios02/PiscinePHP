<?php
	include "print_fct.php";
	session_start();
/* CONNEXION A LA BDD */
	if (!$bdd = mysqli_connect('localhost', 'admin', 'root', 'db_blackmarket'))
		echo "Error !";
?>

<HTML>
	<HEAD>
		<title>Drogues | Black Market</title>
		<meta charset="UTF-8">
		<script>
			var x = 0;
			function popupConnectVisible(){
				if (!x){
					document.getElementById('popup-connect').style.display = "block";
					x = 1;
				}
				else {
					document.getElementById('popup-connect').style.display = "none";
					x = 0;
				}
			}
			function toggleConnectPopup(){
				document.getElementById("connect-icon").onclick = popupConnectVisible;
			};
			function clickCart(id){
				console.log(id);
				if (document.getElementById(id).src == "http://localhost:8080/Rush00/icons/shopping-cart-red.png")
					document.getElementById(id).src = "./icons/shopping-cart-5.png";
				else
					document.getElementById(id).src = "./icons/shopping-cart-red.png";
				console.log(document.getElementById(id).src);
			}
			function connected_user(){
				var login = '<?php echo $_SESSION["loggued_on_user"]; ?>';
				if (login != "")
				{
					document.getElementById('connect-icon').style.display = "none";
					document.getElementById('register-icon').style.display = "none";
					document.getElementById('disconnect-icon').style.display = "block";
					if ('<?php echo $_SESSION["id_user"]; ?>' == 1)
						document.getElementById('admin-pan').style.display = "block";
					else
						document.getElementById('mon-compte').style.display = "block";
					document.getElementById('welcome-login').style.display = "block";
				}
			}
			window.onload = function (){
				document.getElementById('popup-connect').style.display = "none";
				toggleConnectPopup();
				connected_user();
			};
		</script>
		<link rel="stylesheet" href="css/style.css" />
	</HEAD>
	<BODY>
		<div id="content">
			<!-- Banniere de bienvenue tout en haut -->
			<div id="top-banner">Bienvenue sur le Black Market ! Profitez des soldes jusqu'à -80% !</div>
			<!-- Banniere de boutons connexion, inscription, panier. -->
			<a title="Accueil" href="index.php"><img src="img/logo.png" style="padding-left:30px; display:block;height:66px; position:absolute; top:39px;"></a>
			<div id="top-connection-banner">
				<div id="welcome-login">Bienvenue <?php echo $_SESSION["loggued_on_user"]?> !</div>
				<div class="block-icon" id="mon-compte"><a href="compte.php" title="Mon compte" style="text-decoration:none; color:inherit;"><img class="sm-icon" src="./icons/newspaper.png"><span style="display:block">Mon compte</span></a></div>
				<div class="block-icon" id="admin-pan"><a href="admin-pan.php" title="Panneau Admin" style="text-decoration:none; color:inherit;"><img class="sm-icon" src="./icons/newspaper.png"><span style="display:block">Admin</span></a></div>
				<div class="block-icon" id="disconnect-icon" style="display:none; border-left:1px solid #9A9A9A; border-right:1px solid #9A9A9A"><a style="color:inherit; text-decoration:none;" href="logout.php"><img class="sm-icon" src="./icons/user-2.png"><span style="display:block">Deconnexion</span></a></div>
				<div class="block-icon" id="connect-icon"><img class="sm-icon" src="./icons/user-2.png"><span style="display:block">Connexion</span></div>
				<div class="block-icon" id="register-icon" style="border-left: 1px solid #9A9A9A; border-right: 1px solid #9A9A9A;"><a href="inscription.php" title="Inscription" style="text-decoration:none; color:inherit;"><img class="sm-icon" src="./icons/pen.png"><span style="display:block">Inscription</span></a></div>
				<div class="block-icon"><a href="cart.php" title="Panier" style="text-decoration:none; color:inherit;"><img class="sm-icon" src="./icons/shopping-cart.png"><span style="display:block">Mon panier</span></a></div>
			</div>
			<div id="popup-connect">
				<form action="login.php" method="post">
					Identifiant <br /><input style="width:200px;" type="text" name="login" />
					<br /><br />
					Mot de passe <br /><input style="width:200px;" type="password" name="passwd" />
					<br /><br />
					<input type="submit" name="submit" value="Connexion" />
				</form>
			</div>
			<hr>
			<!-- Encart pour les soldes -->
			<div id="encart-soldes"><img style="display:block; margin:auto;" src="img/rsz_soldes-encar.jpg"></img></div>
			<!-- Menu listant les categories de produit -->
			<div id="menu">
				<ul>
					<a href="organe.php" title="Organes" style="color:inherit; text-decoration:none; "><li>ORGANE</li></a>
					<a href="nourriture.php" title="Nourriture" style="color:inherit; text-decoration:none; "><li>NOURRITURE</li></a>
					<a href="arme.php" title="Armes" style="color:inherit; text-decoration:none; "><li>ARMES</li></a>
					<a href="element_chimique.php" title="Elements chimiques" style="color:inherit; text-decoration:none; "><li>ELEMENT CHIMIQUE</li></a>
					<a href="drogue.php" title="Drogue" style="color:inherit; text-decoration:none; "><li>DROGUE</li></a>
					<a href="contrefacon.php" title="Contrefacon" style="color:inherit; text-decoration:none; "><li>CONTREFACON</li></a>
				</ul>
			</div>
			<!-- Bloc des meilleures ventes-->
			<div id="banner-grey">DROGUES</div>
			<div id="best-sales-content">
			<?php
				print_articles_by_id($bdd, 5);
			?>
			</div>
			<hr>
			<!-- Footer -->
			<div id="footer">
				© paim / jbouloux | Miniboutik | Phpool Janvier 2017
			</div>
		</div>

	</BODY>
</HTML>
