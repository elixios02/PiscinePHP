CREATE DATABASE IF NOT EXISTS db_blackmarket CHARACTER SET 'utf8';
USE db_blackmarket;
CREATE TABLE t_users
						(id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL
						, nom VARCHAR(255)
						, prenom VARCHAR(255)
						, mail VARCHAR(255)
						, adresse VARCHAR(1024)
						, telephone VARCHAR(255)
						, login VARCHAR(32) NOT NULL
						, passwd VARCHAR(1024) NOT NULL
						);
CREATE TABLE t_orders
					(id_order INT PRIMARY KEY AUTO_INCREMENT NOT NULL
					, id_user INT NOT NULL
					, id_article VARCHAR(1024) NOT NULL
					, quantite	VARCHAR(1024) NOT NULL
					, date_order DATE NOT NULL
					);
CREATE TABLE t_articles
					(id_article INT PRIMARY KEY AUTO_INCREMENT NOT NULL
					, id_categorieA INT NOT NULL
					, id_categorieB INT
					, nom VARCHAR(255) NOT NULL
					, prix INT NOT NULL
					, stock INT
					, url_img VARCHAR(255) DEFAULT "img/bouclier.png"
					, description VARCHAR(1024) DEFAULT "Go Google"
					);
CREATE TABLE t_categories
						(id_categorie INT PRIMARY KEY AUTO_INCREMENT NOT NULL
						, nom_categorie VARCHAR(255) NOT NULL
						);
INSERT INTO t_users (login, passwd) VALUES ("admin", "06948d93cd1e0855ea37e75ad516a250d2d0772890b073808d831c438509190162c0d890b17001361820cffc30d50f010c387e9df943065aa8f4e92e63ff060c");
INSERT INTO t_users (login, passwd) VALUES ("Charlemagne", "06948d93cd1e0855ea37e75ad516a250d2d0772890b073808d831c438509190162c0d890b17001361820cffc30d50f010c387e9df943065aa8f4e92e63ff060c");
INSERT INTO t_categories (nom_categorie) VALUES ("ORGANE"), ("NOURRITURE"), ("ARME"), ("ELEMENT_CHIMIQUE"), ("DROGUE"), ("CONTREFACON");
INSERT INTO t_articles (id_categorieA, id_categorieB, nom, prix, stock) VALUES (1, NULL, "Poumons", 5000, 2)
			, (1, 2, "Phallus 30cm", 10000, 1)
			, (1, NULL, "Cerveau surprise", 50, 10)
			, (1, NULL, "Pied", 1000, 16)
			, (1, NULL, "Testicule droit", 2500, 4);
INSERT INTO t_articles (id_categorieA, id_categorieB, nom, prix, stock) VALUES (2, NULL, "Chips de Foetus", 666, 999)
			, (2, NULL, "Pates 1Kg", 1, 10000)
			, (2, 3, "Morpions (Par 10.000)", 20, 80)
			, (2, 1, "Coeur", 10000, 2)
			, (2, NULL, "Pain (500Gr)", 2, 500);
INSERT INTO t_articles (id_categorieA, id_categorieB, nom, prix, stock) VALUES (3, 6, "Samsung Galaxy Note 7", 1000, 1000)
			, (3, NULL, "Bombe Nucl&eacuteaire", 1000000000, 10)
			, (3, NULL, "Panzerschreck", 6000, 9)
			, (3, NULL, "Femme", 10, 10000)
			, (3, NULL, "Arbalette", 400, 30);
INSERT INTO t_articles (id_categorieA, id_categorieB, nom, prix, stock) VALUES (4, NULL, "Barre de Plutonium", 12000, 7)
			, (4, NULL, "Barre d'Uranium Enrichi", 34000, 4)
			, (4, 5, "Meth (prix au gramme)", 200, 100)
			, (4, 5, "Ampoule de Morphine", 150, 8)
			, (4, 3, "Acide chlorhydrique (prix au litre)", 60, 9);
INSERT INTO t_articles (id_categorieA, id_categorieB, nom, prix, stock) VALUES (5, NULL, "Weed (au gramme)", 20, 3400)
			, (5, NULL, "Cocaine (au gramme)", 60, 390)
			, (5, 3, "GHB (le cachet)", 150, 38)
			, (5, 2, "Champi", 50, 64)
			, (5, NULL, "Shit coup&eacute au pneu (au gramme)", 5, 6000);
INSERT INTO t_articles (id_categorieA, id_categorieB, nom, prix, stock) VALUES (6, NULL, "Billet de 50E en papier Canson", 60, 1500)
			, (6, 3, "Sac Louis Buiston", 300, 54)
			, (6, 5, "Cocaine (Farine)", 70, 10000)
			, (6, NULL, "Lunettes RayBoon", 250, 75)
			, (6, NULL, "Passeport Syrien", 5, 100000);
