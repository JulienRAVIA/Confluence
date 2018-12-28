-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.21 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour confluence
CREATE DATABASE IF NOT EXISTS `confluence` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `confluence`;

-- Export de la structure de la table confluence. lieux
CREATE TABLE IF NOT EXISTS `lieux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description_fr` text NOT NULL,
  `description_en` text NOT NULL,
  `gps` varchar(100) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_lieux_types` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

-- Export de données de la table confluence.lieux : ~84 rows (environ)
/*!40000 ALTER TABLE `lieux` DISABLE KEYS */;
INSERT INTO `lieux` (`id`, `type`, `nom`, `description_fr`, `description_en`, `gps`, `image`) VALUES
	(1, 4, 'Centre Commercial Confluence', '<p>Le centre commercial de Confluence se situe à mi-chemin entre la gare de Perrache, plus au nord et le musée des confluences à la pointe de la Presqu’île au sud.</p>\r\n<p>Lancé en 2001, il faudra attendre décembre 2007 pour la pose de la première pierre car une longue phase d’étude et de dépollution du site seront nécessaires.</p>\r\n<p>Il ouvrira finalement ses portes en avril 2012.</p>\r\n<p>Le bâtiment, réalisé par l’architecte Jean-Paul Virgie, a une architecture inspiré du milieu marin et de la batellerie.</p>\r\n\r\n\r\n<p>On retrouve dans ce centre les magasins de modes, et grandes surfaces bien sur, mais aussi un dernier étage dédié aux restaurant allant du fast food au restaurant plus “chic” en passant par les sushi et les tacos mexicains. Cet étage abrite aussi un cinéma UGC</p>\r\n<p>Vous y trouverez aussi le centre d’escalade Climb Up Lyon, une salle de 800 m² possédant plusieurs murs allant de 6 à 22 m ce qui en fait le plus haut mur d’escalade de France.</p>\r\n\r\n<p>Comment y accéder? </p>\r\n\r\n<p>Il existe un arrêt servant à la fois pour les bus et les tramways qui se trouve juste devant l’entrée du centre commercial : il s’agit de celui d’Hôtel de Région - Montrochet desservi par les Tram T1 et les Bus 63 et S1.</p>\r\n\r\n<p>Une desserte par bateau est proposée par le centre commercial avec quatre arrêts tout au long de la Saône. Il permet entre autre de rallier le centre commercial depuis le centre ville (Bellecour) en moins de 30 min. Un trajet coûte 4 € par personne.</p>\r\n\r\n<a href="https://www.confluence.fr" target="_blank">Site du centre commercial de Confluence</a>\r\n', '<p>Confluence’s mall is situated halfway between Perrache train station to the north and the Confluences museum to the south at the edge of the Presqu’île.</p>  <p>Launch in 2001, it will need a long study phase and cleanup before the start of the work in december 2007. It gates will be finally opens in april 2012. The building, design by the architect Jean-Paul Virgie, is inspired by the marin world and the inland water shipping.</p>  <p> We can find in this mall much stores about fashions, and larges areas of course, but also the last floor dedicated to many restaurants going from fast food to traditional restaurants by passing in front of sushi’s restaurants and mexican tacos. This floor has got also a UGC movie theater. You will find also the climbing center “Climb up Lyon”, a room of 800 m² having many walls going to 6 from 22 m which represents the highest climbing wall in France</p>  <p>How to get acces ?</p>  <p>There is one bus stop who can be used for buses and streetcars, there is located in front of the center of Confluence’s Mall : It is <<Hôtel de Région - Montrochet>> served by Streetcars T1 and buses 63 and and S1.</p>  <p>A boat ride is proposed by the Mall with 4 stops all along the Saône. It makes among other to rally the mall from the city center (Bellecour) in less than 30 mins. A ride cost 4 € per per person.</p>\r\n\r\n<a href="https://www.confluence.fr" target="_blank">Confluence mall website</a>', '45.740926, 4.817638', 'Centre_commercial.jpg'),
	(2, 2, 'Musée des confluences', ' <p>Le musée des confluences se dresse à l\'entrée de la ville de Lyon, au point de rencontre des deux fleuves qui traversent la ville :  La Saône et le Rhône. </p>\r\n\r\n   <p> Ce bâtiment, à l\'architecture si particulière, a été conçu par l\'agence d\'architecture autrichienne Coop Himmelb(l)au. Il a ouvert le samedi 20 décembre 2014 après quinze ans de travaux.\r\n\r\n    Ce musée d\'histoire naturelle, d’anthropologie, des sociétés et arts et métiers, possède une exposition permanente principalement composée de la collection issue de l\'ancien musée d\'histoire naturelle de Lyon. </p>\r\n\r\n   <p> On y retrouve quatre espaces d\'expositions :</p>\r\n\r\n    <strong>Origines,</strong> les récits du monde : présente des pièces remontant à l\'origine du monde, squelette préhistorique (mosasaure, trilobites ....) mais aussi des météorites.</br>\r\n\r\n     <strong>Sociétés,</strong> le théâtre des hommes : expose les fondements des civilisations actuelles et les processus par lesquelles elles ont été fondées.</br>\r\n\r\n     <strong>Espèces,</strong> la maille du vivant : montre l\'histoire des animaux depuis l\'arrivée de l\'Homme. Vous y trouverez notamment des animaux momifiés datant de l\'Egypte antique.</br>\r\n\r\n     <strong>Éternités,</strong> visions de l\'au-delà : cet espace est consacré à la représentation de la mort dans l\'histoire des civilisations.</br>\r\n\r\n   <p> Il y a également des expositions temporaires courtes. </p>\r\n\r\n    <p>Le bâtiment est ouvert aux visiteurs du mardi au vendredi de 11h à 19h et du samedi au dimanche de 10h à 19h.</br>\r\n    Chaque jeudi, ouverture en nocturne jusqu\'à 22h, avec animations spéciales. </br>\r\n    Le musée contient aussi une librairie boutique, une brasserie et un café.</br></p>\r\n\r\n    <p>Les prix d’entrée vont de 9 € pour les adultes plein tarif à 5 € pour les jeunes actifs. Gratuit pour les moins de 18 ans et les étudiants de moins de 26 ans.</p>', '<p>The museum of Confluence, stand at the gates of Lyon city, at the point where the two rivers crossing the city converge : the Sâone and the Rhône.</p>\r\n\r\n<p> This building, with is so typical architecture, was conceived by the austrian architecture agency Coop Himmelb(l)au. It open it gates on saturday december the 20th of 2014 after fifteen years of building.</p>\r\n\r\n<p>This museum of natural sciences, anthropology, societies and arts and crafts show a permanent exhibition that once belonged to lyon\'s former museum of natural sciences.</p>\r\n\r\n<p> Their we can find four differents showrooms : Origines, tales of the world : which presente pieces from the beginning of the world such as prehistoricals skeletons (mosasaurus, trilobites ...) as well as meteorites.   Societies, Human\'s theatre : expose the bases of nowadays civilisations and the processes which were used to build them.    Species, web of the living : show the History of the whole animal reign since the rise of mankind. Their you will find mummified animals from the ancient Egypt and so.    Eternity, vision from beyond : this space is dedicated to the representation of death in civilisations History. </p>\r\n\r\n<p>Their are also shorter and temporaries exhibition which subjects changes regularly.</p>\r\n\r\n<p>The building is open for visits from tuesday to friday, from 11 am to 7 pm and from saturday to sunday, from 10am to 7pm. Every thursday, nocturnal opening until 10 pm and with specials animations. The museum also contain a library shop, a bar and a coffee shop.</p>\r\n\r\n<p>Entrance fees are 9€ at full prices for adults, 5€ for young workers. Free for children less than 18 years old and students less than 26 years old.</p>', '45.732568, 4.818133', 'Musee_Confluence2.jpg'),
	(3, 1, 'Burger King', 'Fast-food', 'Fast-food', '45.740878, 4.818955', 'Burger_King.jpg'),
	(4, 6, 'Musée des Confluences', 'Lignes désservies : T1', 'Served lines : T1', '45.733691, 4.818751', 'Tram_Confluence.jpg'),
	(6, 1, 'Ouest Express Confluence', '<p>Chaîne de restauration rapide lancé par le groupe Bocuse en janvier 2008, vous y mangerez Burger / Pâtes et crêpes.</p> \r\n', '<p>Fast food restaurants launched by the famous french cook Bocuse in january 2008, it serve burgers, pastas and crepes. </p>', '45.741666, 4.8194654', 'Ouest_Express.jpg'),
	(7, 1, 'Burger & Wine Confluence', 'Art culinaire français et nourriture américaine', 'American food and French culinary traditions', '45.7421313, 4.818901', 'Burger_Wine.jpg'),
	(8, 6, 'Sainte-Blandine', 'Lignes désservies : T1', 'Served lines : T1', '45.744264, 4.822180', 'Tram_St_Blandine.jpg'),
	(9, 7, 'Confluence Docks', 'Station vélov', 'Velov station', '45.739635, 4.815009', 'Velov.jpg'),
	(10, 7, 'Confluence Hôtel de Région', 'Station vélov', 'Velov station', '45.740199, 4.818647', 'VeloV_St_Blandine.jpg'),
	(11, 2, 'UGC Ciné Cité Confluence', '<p>Le cinéma UGC Ciné Cité Confluence diffuse de nombreux films à travers ses 14 salles</p>\r\n\r\n<a href="https://www.ugc.fr/cinema.html?id=32">Découvrez les films à l\'affiche</a>', 'Cinema', '45.740295, 4.818314', 'Cine.jpg'),
	(12, 1, 'Hippopotamus', 'Steak-house', 'Steak-house', '45.740862, 4.819369', 'Hippopotamus.jpg'),
	(13, 3, 'Patinoire Charlemagne', '<p>Au centre du quartier, non loin du centre commercial de confluence, se dresse la patinoire charlemagne.</p>\r\n\r\n<p>D\'une capacité publique de 4 200 personnes, la patinoire reçoit aussi des spectacles sur glace et des compétitions internationales et nationales.   Il s’agit d’une des plus grandes patinoires de France : elle est en effet aux dimensions olympiques (60 x 30 m).   Elle fut commandée en 1967 aux architectes R.Roustit et C.Batton assistés par Guy Morel à l’occasion de la candidature de Lyon aux Jeux Olympiques.   La patinoire vous propose aussi des matchs de Hockeys dont vous pouvez retrouver le calendrier des matchs sur le site suivant www.lyon-hockey-club.com .   L’équipe du Lyon Hockey Club évolue depuis plusieurs année en Ligue Magnus, le plus haut niveau français de hockey sur glace.   Horaires</p>\r\n\r\n<p>Hors vacances scolaires - Mardi : 21h - 23h - Mercredi : 14h - 17h - Vendredi : 21h - 23h - Samedi : 14h30 - 17h30 et 21h - 23h - Dimanche : 10h30 - 13h et 14h - 17h30</p>\r\n\r\n<p>Pendant les vacances scolaires : - Lundi : 10h - 12h et 14h - 17h30 - Mardi au vendredi : 10h - 12h et 14h - 17h30 et 20h30 - 22h30 - Samedi : 14h - 17h30 et 20h30 - 22h30 - Dimanche : 10h30 - 13h et 14h - 17h30</p>\r\n\r\n<p>Attention, les caisses ferment 30 minutes avant la fin de chaque séance.   Tarifs</p>\r\n\r\n<p>Entrée à l\'unité sans patins Plein tarif : 4 € Tarif réduit : 2,70 €* (Etudiant moins de 26 ans et mineurs)   Patins(supplément) : Location à l\'unité : 3,30€</p>\r\n\r\n<p>Soirée à thème  9€   Gratuit : Pour les enfants de moins de 6 ans accompagnés d\'un adulte. La location des patins reste payante.</p>', '<p>In the very heart of the district, not far from Confluence’s mall, stand Charlemagne Ice Rink.</p>\r\n\r\n<p>With a capacity of 4 200 people, this ice rink also hold ice shows and internationals contests. </p>\r\n\r\n<p>It’s actually one of the largest France’s ice rink with it olympics sizes (60 x 30 m / 196,85 f x 98,4252 f ).   It was order in 1967, to the architects R.Roustit and C.Batton with the help of Guy Morel to celebrate Lyon application to the Olympics Games.   Furthermore, the ice rink will also host hockey\'s contests. You can find the calendar regarding those events in the following link : www.lyon-hockey-club.com.   Lyon’s hockey club team is playing, since now some years, in the Magnus Ligue, the highest level in french ice hockey.   Opening Hours :  Monday : 10 am to 5 pm during holidays only Tuesday : 9 pm to 11 pm and 10 am to 10 pm during holidays Wednesday : 7 am to 5 pm and 10 am to 10 pm during holidays Thursday : 10 am to 10 pm during holidays only Friday : 9 pm to 11 pm and 10 am to 10 pm during holidays Saturday : 2 pm to 11 am Sunday : 10 am to 7 pm   Be aware : You can’t enter 30 min before the closure.</p>\r\n\r\n<p>Fees : </p>\r\n\r\n<p>Without Ice skates Standard : 4 € Youngster less then 18 or students less then 26 : 2.70 €</p>\r\n\r\n<p>Ice skates : rent 3.30 € each </p>\r\n\r\n<p>Special night party : 9 €</p>\r\n\r\n<p>Free : For children less than 6 years old with an adult. Ice skates rent is still needed.</p>', '45.742465, 4.820217', 'Patinoire.jpg'),
	(14, 3, 'Climb-Up Confluence', 'Mur escalade', 'Climbing wall', '45.741050, 4.819491', 'Climb_up.jpg'),
	(15, 9, 'Mob Hotel***', '<p>Non loin du centre commercial de Confluence en longeant le fleuve, vous trouvez un hotel, classé trois étoiles, un peu particulier : Le Mob Hotel.</p> \r\n<p>Dans cet établissement vous retrouverez bien entendu des chambres d\'hôtel, mais  avec des designs unique et bien plus. </p>\r\n<p>En effet, vous pourrez profiter d’une scène de spectacle pour des concerts live ou autre, des espaces de travails collaboratifs, une bibliothèque qui se veut “ambiance comme à la maison” et un restaurant bio où seul les produits des exploitants de la région sont acceptés.  \r\nDe plus chaque dimanche, un brunch géant est organisé par l’hôtel avec les restes de la semaine dans le but d’éviter le gaspillage.</p>\r\n\r\n<p>L’hôtel se veut accessible, et les prix d’une chambre tournent au alentour de 100 €.</p>\r\n', '<p>Not far from Confluence’s mall, along the river, stand find a strange 3 stars hotel : The Mob Hotel.</p>\r\n<p>In this place, which indeed provide hotel rooms,but also find a theatre room, a collaborative workspace, a library “as if you were home” and an restaurant that only serve organic food provided by the nearby farms. </p>\r\n<p>Moreover, every sunday, the hotel will host a brunch with the leftovers of the week to prevent waste</p>\r\n<p>The rooms are around 100 € for the night </p>\r\n\r\n\r\n\r\n', '45.734484, 4.816088', 'Mob_Hotel.jpg'),
	(16, 9, 'Hotel Charlemagne****', '<p>L’hôtel Charlemagne se situe en plein centre du quartier. </p>\r\n<p>Cet établissement 4 étoiles se divise en deux parties liés par un jardin commun et une grande terrasse fleurie.   </p>\r\n\r\n<p>L’hôtel propose aussi des salle de réunion et de réception, un bar lounge et bien entendu un restaurant. </p>\r\n<p>Tout le personnel y est multilingue.</p>\r\n<p>Attention toutefois, il n’y a ni parking, ni petit déjeuner inclus. </p>\r\n<p>Le prix des chambres varient aux alentours des 100 euros la nuit. </p>\r\n', '<p>The Hotel “Charlemagne”, is situated in the center of the district. </p>\r\n<p>This 4 stars hotel, is divided in two parts link by a shared garden and a spacious flowered yard.</p>\r\n<p>The place also offer meeting and receptions rooms, lounge bar and of course a restaurant.</p>\r\n<p>The whole staff there is multilingual.</p> \r\n<p>Be aware though, there are no parking, and no breakfast include in the price</p>\r\n<p>The rooms’ prices are around 100 € each nights.</p>\r\n\r\n', '45.745967, 4.823973', 'Charlemagne.jpg'),
	(17, 7, 'Confluence Darse', 'Station vélov', 'Station Velov', '45.743366, 4.815828', 'Velov_Confluence.jpg'),
	(18, 7, 'Place de l\'hippodrome', 'Station vélov', 'Station Velov', '45.743366, 4.815828', 'Velov.jpg'),
	(19, 6, 'Suchet', 'Lignes désservies : T1', 'Served lines : T1', '45.747044, 4.824570', 'Tram_Suchet.jpg'),
	(20, 7, 'Place des archives', 'Station vélov', 'Station Velov', '45.748013, 4.824913', 'Velov.jpg'),
	(22, 7, 'Patinoire Charlemagne', 'Station vélov', 'Station Velov', '45.742963, 4.820076', 'Velov.jpg'),
	(23, 1, 'Inada Confluence', 'Restaurant Japonais', 'Japanese restaurant', '45.745476, 4.820561', 'Inada.jpg'),
	(24, 1, 'Confluence Sushi', 'Restaurant Japonais', 'Japanese restaurant', '45.743927, 4.817128', NULL),
	(25, 1, 'Starbucks Coffee', 'Café', 'Coffeehouse', '45.741339, 4.817753', NULL),
	(26, 1, 'L\'atelier du Pizzaiolo', 'Restaurant Italien', 'Italian restaurant', '45.742966, 4.817229', 'Pizzaiolo.jpg'),
	(27, 1, 'Ti Amo Maria', 'Restaurant Italien', 'Italian restaurant', '45.742505, 4.821811', NULL),
	(28, 1, 'Selcius', 'Restaurant, bar à vins, terrasse, brunch & Club', 'Restaurant, wine bar, terrace, brunch & Club', '45.738934, 4.815068', NULL),
	(29, 1, 'Le Bateau Bellona', 'Restaurant', 'French Restaurant', '45.734975, 4.819782', NULL),
	(30, 1, 'Zinc Zinc Confluence', 'Bouchon Lyonnais', 'Lyonnais Bouchon', '45.740907, 4.818952', 'Zinc_zinc.jpg'),
	(31, 1, 'Boulangerie Paul', 'Boulangerie, Sandwicherie', 'Bakery, Sandwichery', '45.740813, 4.818765', 'Paul.jpg'),
	(32, 1, 'Vapiano Confluence', 'Restaurant Italien', 'Italian restaurant', '45.740914, 4.818952', NULL),
	(33, 1, 'Restaurant L\'Endroit Confluence', 'Brasserie', 'Restaurant', '45.742503, 4.817538', 'L_endroit.jpg'),
	(34, 1, 'Le St-Trop Confluence', 'Restaurant traditionnel', 'Traditional restaurant', '45.742916, 4.816553', 'Le_St_trop.jpg'),
	(35, 7, 'Musée des Confluences', 'Station vélov', 'Station Velov', '45.733438, 4.818984', 'Velov.jpg'),
	(36, 2, 'Pont Raymond Barre', '<p>Le pont Raymond Barre nommé en l’honneur de l’ancien maire de Lyon, est réservé aux transport mode doux (Vélo, Tram et piétons).</p>\r\n<p>L’ouvrage conçu par l’architecte Alain Spielmann et construit à côté du pont pasteur, permet de franchir le Rhône. </p>\r\n</p>Les travaux ont débuté en novembre 2011 et se sont achevés en septembre 2013.\r\nIl possède une longueur total de 260 m pour 17,50 de large. </p>\r\n<p>Il a été prévue pour coïncider avec le prolongement en février 2014 de la ligne de tram T1 qui relie maintenant Confluence par la station Montrochet à Gerland par la station de métro Debourg.</p>\r\n', '<p>Raymond Barre bridge, named in honor of Lyon’s former mayor, is restricted to “soft” transport medias such as  bike, tram and indeed walkers.</p> <p>The structure, imagined by the architect Alain Spielmann and build next to the Pasteur bridge, allow Lyon’s inhabitants to cross the Rhône.</p>  <p>The construction started in early november 2011 and would be achieved in septembre 2013. The bridge total length is about 260 m (853,018 feets) and is width is 17.50 m ( 55,77428) </p>  <p>It was aimed to be built the same time as the extension in february 2014 of the tram T1 ligne which now link Confluence, by Montrochet station to Gerland, by the subway station Debourg </p> ', '45.732672, 4.820448', 'Pont.jpg'),
	(37, 2, 'Maison de la confluence', '<p>La Maison de La Confluence est une sorte de musée de l’urbanisation du quartier. Ici vous y trouverez toutes les informations et les concertations concernant le projet urbain du second arrondissement de Lyon. Ce lieu, qui fut anciennement le hall du marché au gros du quartier est ouvert au public et des chargés de concertation présent sur place animent et répondent aux questions des visiteurs. </p>\r\n\r\n<p>L’exposition principale : “Cultivons la ville en bonne intelligence” est régulièrement remise à jour pour aider au mieux à la compréhension du projet urbain de Confluence.  Une grande maquette à l\'échelle 1/750, des maquettes 3D réalistes et en temps-réel ou encore un documentaire sur le quartier vous seront présentés pour une meilleur expérience. </p>\r\n\r\n<p>L’accès à la maison de La Confluence ce fait par: - tramway (T1) arrêt Hôtel de Région-Montrochet  - bus (S1) même arrêt</p>\r\n\r\n<p>Ou encore par Vélo’v dans la station Hôtel de Région-Montrochet</p>', '<p>“La Maison de La Confluence”, Confluence’s home, is kind of a district’s urbanisation museum.  There, you will find every informations, and thought in regards of Lyon’s second district urban project.  This place, which was the neighborhood’s former wholesale market hall, is now wide open for public visits and some in charge of consultation will be there to host differents animations and answer your questions.</p>\r\n\r\n<p> The main show, translated by “Improve the city wisely” is regularly update in order to always make the understanding of the Confluence’s urban project better. A 1/750 scale model, realistics and real time 3D models and even a documentary about the district will be display for a better experience. </p>\r\n\r\n<p> You can access “La Maison de La Confluence” with public transports:  Tram(T1), stop : Hôtel de Région-Montrochet Bus(S1) same stop</p>\r\n\r\n<p>Or even use the Vélo’v (Lyon public bikes) with the nearby station.</p>', '45.741336, 4.821518', NULL),
	(38, 2, 'Eglise de Sainte Blandine', '<p>L\'église Sainte-Blandine de Lyon est une église catholique située dans le deuxième arrondissement de Lyon. Au milieu du XIXème siècle l’ancienne église de Perrache devenant trop petite pour y accueillir la population grandissante du quartier. Pour y remédier, l\'archevêque Bonald demande à l’abbé Dartigues de fonder une nouvelle paroisse qui serait dédiée à Sainte Blandine. Le bâtiment, de style néogothique sera réalisé par l\'architecte Clair Tisseur, puis par la suite Joseph Étienne Malaval, le chantier débuta en avril 1863 pour s’achever en mai 1869. Une mezzanine sera par la suite inaugurée en avril 2017 pour augmenter la capacité d’accueil de l’église. Sainte-Blandine est une église à une nef et deux bas-côtés, sans chapelle latérale ni transept. </p>', '<p>The church Sainte Blandine is a catholic church located in Lyon’s second district. That was in the middle of the 19th century, when the former church of Perrache had become too small to welcome the always growing population of the neighborhood that the archbishop Bonald asked to the Abbot Dartigues to found a new one, which would dedicated to St Blandine. </p>\r\n\r\n<p>This building, with a neo-gothic style will be first realized by the architect Clair Tisseur and then continued by Joseph Etienne Malaval. It will take from april 1863 to may 1869 to achieve the whole structure.  A mezzanine will be later at to the structure, in april 2017, adding more space for ceremonies. </p>', '45.744914, 4.823694', 'SainteBlandine.jpg'),
	(39, 2, 'La Sucrière', '<p>Le bâtiment de la sucrière, situé sur au 47 quai rambaud, a subit beaucoup d\'évolution depuis sa construction en 1925 où il ne faisait que 100 mètres de long et ne comportait aucun étage.</p>\r\n<p>C’est en 1927 que la Chambre de Commerce décide de surélever son entrepôts de 2 étages, il s’appelle alors “Entrepôt réel des sucres indigènes”.\r\nIl sera ensuite agrandis au nord en 1930 puis un nouvel entrepôt lui sera une nouvelle fois ajouté en 1960.</p>\r\n<p>C’est en 1976 que le projet des 3 silos, que l\'on peut encore voir aujourd’hui, est lancé dans le but de stocker des grandes quantitées de sucre en vrac qui sont acheminée par péniche.</p>\r\n<p>Il fermera finalement ses porte en 1993, après 68 ans d’activitées. C’est après plusieurs années d’abandons que des travaux sont entrepris afin de transformer le silos de 1930 en espace d’exposition, c’est pour l’occasion de la 7eme édition de la biennale d’art contemporains de 2004 qu’il sera renommé “La Sucrière”.</p>\r\n<p>La partie de 1960 et les silos vont ensuite être rénové pour accueillir “le Sucre”, en 2012, salle culturelle en rooftop qui accueil “club, concerts, apéros, conférences et événements tout au long de l\'année”.</p>\r\n\r\n', '<p>The building call “Sucrière”, had been through many evolution since it construction in 1925 were it length was only 100 m (328 ft) and just one floor.</p>  <p>In 1927, the Chamber of Trading decide to add 2 more floors to the warehouse and call it “Real warehouse of indigenous Sugars”. It would then, be extend once more in 1930, and once again in 1960 when a new warehouse will be add to the structure. </p> <p>In 1976, 3 sugar silos, which are still visible nowadays, will be adds to store a great amount of sugar that would be coming by trading barges.</p>  <p>Later, in 1993, after 68 years of activities, the whole complex would be closed. After many years, the city would decided to transform the old silo from 1930 to an exhibition room and would be then renamed “La Sucrière”.</p> <p>In 2012, the leftover parts would be too made anew and renamed “Le Sucre”, a place of culture that hold clubs, concerts and such.</p>', '45.736444, 4.814952', 'La_Sucriere.jpg'),
	(40, 2, 'The Orange Cube', '<p>Cet énorme cube orange qui siège fièrement sur les anciens Rambaud depuis 2010, non loin de son petit frère le rectangle vert qui lui a vu le jour en 2015, fut imaginé par le cabinet Jakob et MacFarlane dans une volontée de rappeler les périodes industrielle de la presqu\'île jusque dans sa couleur minium, très présente dans le monde industriel.\r\nCe bâtiment héberge le siège social du Groupe Cardinal, qui a pour coeur de métier la promotion immobilière, ils travaillent régulièrement avec des architecte de renom tels que Jean Nouvel, Rudy Ricciotti, Jakob+MacFarlane, Jean-Michel Wilmotte. Leur siège social est à l’image de leur souhait de repenser l’architecture d’une façon beaucoup plus avant-gardiste.</p>\r\n\r\n<p>Le groupe cardinale possède également une branche spécialisé dans le logement d’étudiant, Cardinal Campus. Ils ont repensé le logement étudiants avec pour objectif d’être au plus prêt de leur locataires en dynamisant la vie de leur résidence en offrant des sorties et activitées d’échange/rencontre animé par des community manager qui véhicule les informations sur les différents réseaux sociaux.</p>\r\n', '<p>This enormous orange cube stand proudly in the former Rambaud wharfs since 2010, not far from it little brother : the green rectangle which was built in 2015, was imagined by Jakob and MacFarlane in order to evok the industrial era of the neighbourhood.</p> <p>The structure host the headquarter of the Groupe Cardinal, a real estate company, which work regularly with architects of great reputation such as Jean Nouvel, Rudy Ricciotti, Jakob and MacFarlane, Jean-Michel Wilmotte. Their headquarter represent their wish to create a new and more futurist way of thinking concerning architecture.</p>', '45.739181, 4.814609', 'Cube_Orange.jpg'),
	(41, 2, 'Le Sucre', '<p>Le sucre est une salle qui accueil “club, concerts, apéros, conférences et événements tout au long de l\'année”. Cette salle en rooftop de la Sucrière est placé sur les quai Rambaud et offre un panorama sur la ville de Lyon qui est plus qu appréciable à la nuit tombée.</p>\r\n\r\n<p>Littéralement encensé par la critique cet espace culturel offre un panel non négligeable d’événement pour tout âge. Ce monument, a l’image de la reconquête du quartier de la Confluence, est l’égérie d’un mouvement des années 2010-2020. Il s’inclut dans l’urbanisation du quartier en proposant la semaine des évènements privée pour toutes les société demeurant autours de la salle et le week end des afterwork et des soirées ouvert au public gratuit ou payant.</p>\r\n\r\n', '<p>”Le sucre” is a culturale room, hosting clubs, concerts and many others events all year long. This room, on top of La Sucrière is placed along the Rambaud wharfs and offer a great landscape of Lyon city, especially by night.</p> <p>This space provide a great amount of events for all ages. This monument is a true symbol of the whole district reborn.</p> It provide, during the week, privates events for the companies all around, and some afterworks during the weekend and night parties for everyone.</p>', '45.736686, 4.815004', NULL),
	(42, 2, 'Vaporetto', '<p>Le vaporetto est un bus sur l’eau mise en place par le centre commercial de Confluence, rappelant ainsi son inspiration maritime, et qui permet de se déplacer du quartier de Vaise à celui de Confluence en passant par la place Bellecour et la gare Saint Paul, le long de la Saône.</p>\r\n<p>Sélectionnée pour son allure de yacht des années 50, avec son sol en tek, plats bords et entourage des fenêtres en acajou massif il fait clin d’œil à l’histoire du quartier, situé entre le Rhône et la Saône et aux activités de dockers et à la présence des mariniers sur place.</p>\r\n<p> Le Vaporetto long de 19,5 m sur 5,20 m de large peut accueillir 70 voyageurs.\r\nLa traversé dure environ 30 minutes et est disponible sans interruption de 9h30 à 21h30.</p>\r\n<p>Un trajet coûte 4 euros.</p> \r\n\r\n', '<p>The Vaporetto is a bus like boat owned by Confluence’s mall, reminding it marine inspiration. This boat travel from Vaise district to Confluence while passing by Bellecour and Saint Paul train station.</p>\r\n<p>Select for it frame close to a yacht from the 50’s, with it teak deck, flat border and  mahogany windows frame, it’s an allusion at the history of the district, situated between the Rhône and the Saône, and the activity of the dockers there.</p>\r\n<p>The vaporetto with it length of 19,5 m (64 ft) and width of 5,20 m (16,4 ft), it can bring 70 travelers at once.</p>\r\n<p>The whole journey take about 30 min, cost 4 euros and without interruption from 9 am to 9 pm </p>\r\n\r\n', '45.7748786, 4.7641719', 'Vaporetto.jpg'),
	(43, 2, 'Euronews', '<p>Le quartier de Confluence compte depuis 2015 en son sein le siège mondial d’Euronews. Ce bâtiment atypique situé sur les quai de l’ancien port Rambaud, a été pensé par le cabinets d\'architecture Jakob et MacFarlane. Ils également à l’origine d’un bâtiment similaire ayant vu le jours sur les mêmes quai 5 ans auparavant, le Orange Cube.</p>\r\n<p>Ce “Rectangle vert” accueille plus de 800 collaborateurs de la chaîne dans 10 000m², qui chiffres un budget à 60 millions d’euro pour sa création, a été inauguré le 15 octobre 2015.</p>\r\n\r\n<p>C’est dans une démarche de modernité et d’ouverture au nouvelles technologies digitales que la chaîne international a voulu se lancer avec dans ce challenge technique et logistique.<p>\r\n<p>Leur souhait était d’être “en adéquation avec la chronologie de consommation de l’information”.</p>\r\n\r\n\r\n', '<p>Since 2015, Confluence district is hosting Euronews’ head office. This particular building, located near the former Rambaud port’s quay, was imagined by the architecture office Jakob  and MacFarlane, who also made the similar building, not far from this one, the Orange Cube.</p>\r\n<p>This “Green Rectangle” host more than 800 employees in 10 000m² (107 639,1 ft²), which costed 60 millions of euros for it creation, was inaugurate in 2015 october the 15th</p>\r\n<p>It was to show a will of modernity and an open minded state concerning new digitals technologies that the company was willing to start this major technical and logistical challenge</p>\r\n\r\n', '45.734641, 4.815615', 'Siege_Euronews.jpg'),
	(44, 8, 'Suchet', 'Lignes désservies : 63, S1', 'Served lines : 63, S1', '45.746527391948, 4.8248524606759', NULL),
	(45, 8, 'Suchet', 'Lignes désservies : 63, S1', 'Served lines : 63, S1', '45.746826359432, 4.8239531574299', NULL),
	(46, 8, 'Perrache', 'Lignes désservies : 301', 'Served lines : 301', '45.749800722848, 4.8269069618791', NULL),
	(47, 8, 'Perrache', 'Lignes désservies : 60', 'Served lines : 60', '45.749276079035, 4.8271367634456', NULL),
	(48, 8, 'Perrache', 'Lignes désservies : 8', 'Served lines : 8', '45.749227413516, 4.8273017046629', NULL),
	(49, 8, 'Perrache', 'Lignes désservies : 49', 'Served lines : 49', '45.75008745374, 4.8258620303249', NULL),
	(50, 8, 'Perrache', 'Lignes désservies : C19', 'Served lines : C19', '45.75002023614, 4.8260518505173', NULL),
	(51, 8, 'Perrache', 'Lignes désservies : C21', 'Served lines : C21', '45.74991277629, 4.8264327101099', NULL),
	(52, 8, 'Perrache', 'Lignes désservies : 15, 31, 46, 49, 55, 63, 8, C10, C19, C20, C21', 'Served lines : 15, 31, 46, 49, 55, 63, 8, C10, C19, C20, C21', '45.749794417132, 4.8256816289022', NULL),
	(53, 8, 'Perrache', 'Lignes désservies : 55', 'Served lines : 55', '45.749961440541, 4.8262677660655', NULL),
	(54, 8, 'Perrache', 'Lignes désservies : 15', 'Served lines : 15', '45.749078849843, 4.8279121250596', NULL),
	(55, 8, 'Perrache', 'Lignes désservies : 632, C10', 'Served lines : 632, C10', '45.749109817123, 4.827733526391', NULL),
	(56, 8, 'Claudius Collonge', 'Lignes désservies : 63, S1', 'Served lines : 63, S1', '45.748428508488, 4.8202970453795', NULL),
	(57, 8, 'Montrochet', 'Lignes désservies : S1', 'Served lines : S1', '45.740274158632, 4.8157897269606', NULL),
	(58, 8, 'Musée des Confluences', 'Lignes désservies : 15, 63, C10', 'Served lines : 15, 63, C10', '45.734777631972, 4.8184985279698', NULL),
	(59, 8, 'Perrache', 'Lignes désservies : C22', 'Served lines : C22', '45.749325599225, 4.8269332889176', NULL),
	(60, 8, 'Musée des Confluences', 'Lignes désservies : 15, C10', 'Served lines : 15, C10', '45.734417282791, 4.8189193058186', NULL),
	(61, 8, 'Musée des Confluences', 'Lignes désservies : C7', 'Served lines : C7', '45.73358499184, 4.8174807395983', NULL),
	(62, 8, 'Musée des Confluences', 'Lignes désservies : C7', 'Served lines : C7', '45.733131130451, 4.8179012840177', NULL),
	(63, 8, 'Musée des Confluences', 'Lignes désservies : 63', 'Served lines : 63', '45.735082369281, 4.8179263898585', NULL),
	(64, 8, 'Perrache', 'Lignes désservies : 301', 'Served lines : 301', '45.749754417248, 4.8270020677527', NULL),
	(65, 8, 'Perrache', 'Lignes désservies : 60, 632, C22', 'Served lines : 60, 632, C22', '45.749459083578, 4.8278136242208', NULL),
	(66, 8, 'Ravat', 'Lignes désservies : 63', 'Served lines : 63', '45.743029223634, 4.8255170670762', NULL),
	(67, 8, 'Verdun - Rambaud', 'Lignes désservies : S1', 'Served lines : S1', '45.750040299592, 4.8227098367227', NULL),
	(68, 8, 'Ravat', 'Lignes désservies : S1', 'Served lines : S1', '45.743905516352, 4.8241553986017', NULL),
	(69, 8, 'Perrache', 'Lignes désservies : 63', 'Served lines : 63', '45.749159338393, 4.8275300530166', NULL),
	(70, 8, 'Montrochet', 'Lignes désservies : S1', 'Served lines : S1', '45.740423336764, 4.8159635630195', NULL),
	(71, 8, 'Perrache', 'Lignes désservies : 46', 'Served lines : 46', '45.750108856008, 4.8257087095349', NULL),
	(72, 8, 'Ravat', 'Lignes désservies : S1', 'Served lines : S1', '45.744116719584, 4.8235607131215', NULL),
	(73, 8, 'Perrache', 'Lignes désservies : 31, C20', 'Served lines : 31, C20', '45.7498731039, 4.8265980607562', NULL),
	(74, 8, 'Ravat', 'Lignes désservies : 63', 'Served lines : 63', '45.743531234347, 4.8260154380058', NULL),
	(75, 8, 'La Sucriere', 'Lignes désservies : S1', 'Served lines : S1', '45.737940389978, 4.8153523166454', NULL),
	(76, 8, 'Hôtel de Région Montrochet', 'Lignes désservies : 63', 'Served lines : 63', '45.738626290741, 4.8219243159534', NULL),
	(77, 8, 'Hôtel de Région Montrochet', 'Lignes désservies : S1', 'Served lines : S1', '45.741107399576, 4.8196083804859', NULL),
	(78, 8, 'Hôtel de Région Montrochet', 'Lignes désservies : 63', 'Served lines : 63', '45.737881422614, 4.8211613152022', NULL),
	(79, 8, 'Hôtel de Région Montrochet', 'Lignes désservies : S1', 'Served lines : S1', '45.74128100935, 4.8195116993139', NULL),
	(80, 8, 'La Sucriere', 'Lignes désservies : S1', 'Served lines : S1', '45.737975661436, 4.8151205955756', NULL),
	(81, 8, 'Confluence Rambaud', 'Lignes désservies : S1', 'Served lines : S1', '45.733347434776, 4.8161783899967', NULL),
	(82, 8, 'Claudius Collonge', 'Lignes désservies : 63, S1', 'Served lines : 63, S1', '45.747711264367, 4.8218073643608', NULL),
	(83, 6, 'Perrache', 'Lignes désservies : T1, T2, MA <br>\r\nGare SNCF', 'Served lines : T1, T2, MA, SNCF Train Station', '45.749594542742, 4.8270148896529', 'Metro_Perrache.jpg'),
	(88, 6, 'Hôtel de Région Montrochet', 'Lignes désservies : T1', 'Served lines : T1', '45.740625398592, 4.8190058387082', NULL),
	(91, 5, 'Citiz LPA Charlemagne', 'Station autopartage Citiz LPA Charlemagne <br> Adresse : 79, Cours Charlemagne 69002 Lyon', 'Car sharing station Citiz LPA Charlemagne <br> Adress : 79, Cours Charlemagne 69002 Lyon', '45.742903324947, 4.8211374812884', NULL),
	(92, 5, 'Bluely 503 rue Vuillerme', 'Station autopartage Bluely 503 rue Vuillerme <br> Adresse : 503 rue Vuillerme 69002 Lyon', 'Car sharing station Bluely 503 rue Vuillerme <br> Adress : 503 rue Vuillerme 69002 Lyon', '45.735198786713, 4.8177895424535', NULL);
/*!40000 ALTER TABLE `lieux` ENABLE KEYS */;

-- Export de la structure de la table confluence. photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `fichier` varchar(150) NOT NULL,
  `taille` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

-- Export de données de la table confluence.photos : ~77 rows (environ)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`id`, `description`, `fichier`, `taille`) VALUES
	(1, '2 Batiments Blanc', '2_Batiments_Blanc.jpg', 3725802),
	(2, 'Bar Style de ouf confluence', 'Bar_Style_de_ouf_confluence.jpg', 2902476),
	(3, 'Bateau Batiments', 'Bateau_Batiments.jpg', 2569719),
	(4, 'Batiment Avec Des Carres', 'Batiment_Avec_Des_Carres.jpg', 3145461),
	(5, 'Batiment Blanc', 'Batiment_Blanc.jpg', 3628764),
	(6, 'Batiment Bleu', 'Batiment_Bleu.jpg', 3805921),
	(7, 'Batiment Gris', 'Batiment_Gris.jpg', 3396269),
	(8, 'Batiment Gris Fonce', 'Batiment_Gris_Fonce.jpg', 3324139),
	(9, 'Batiment Jaune', 'Batiment_Jaune.jpg', 3694576),
	(10, 'Batiment Noir', 'Batiment_Noir.jpg', 3413238),
	(11, 'Batiment Rayures', 'Batiment_Rayures.jpg', 3225051),
	(12, 'Batiment Verre', 'Batiment_Verre.jpg', 3732412),
	(13, 'Bijou du rhone', 'Bijou_du_rhone.jpg', 2494596),
	(14, 'Bijou du rhône', 'Bijou_du_rhone.jpg', 6006003),
	(15, 'BlackByJack', 'BlackByJack.jpg', 2268711),
	(16, 'Brasserie Confluence', 'Brasserie_Confluence.jpg', 3162028),
	(17, 'Burger King', 'Burger_King.jpg', 2403986),
	(18, 'Burger Wine', 'Burger_Wine.jpg', 4365042),
	(19, 'Centre commercial', 'Centre_commercial.jpg', 2150475),
	(20, 'Chambre Commerce Lyon', 'Chambre_Commerce_Lyon.jpg', 3536261),
	(21, 'Chambre Du Commerce Lyon', 'Chambre_Du_Commerce_Lyon.jpg', 3851824),
	(22, 'Charlemagne', 'Charlemagne.jpg', 3233071),
	(23, 'Cine', 'Cine.jpg', 2480499),
	(24, 'Climb up', 'Climb_up.jpg', 2658352),
	(25, 'Cube Orange', 'Cube_Orange.jpg', 3708803),
	(26, 'Cube Orange 2', 'Cube_Orange_2.jpg', 2739077),
	(27, 'Deloitte', 'Deloitte.jpg', 3685806),
	(28, 'Hanoi Ca Phe', 'Hanoi_Ca_Phe.jpg', 2879032),
	(29, 'Hippopotamus', 'Hippopotamus.jpg', 2252952),
	(30, 'Inada', 'Inada.jpg', 2957541),
	(31, 'L endroit', 'L_endroit.jpg', 3826037),
	(32, 'La Sucriere', 'La_Sucriere.jpg', 3762659),
	(33, 'La tete dans les nuages', 'La_tete_dans_les_nuages.jpg', 2195792),
	(34, 'Le paradis du fruit', 'Le_paradis_du_fruit.jpg', 2593583),
	(35, 'Le St trop', 'Le_St_trop.jpg', 4124326),
	(36, 'Metro Perrache', 'Metro_Perrache.jpg', 3654742),
	(37, 'Mob Hotel', 'Mob_Hotel.jpg', 2775260),
	(38, 'Mur Escalade Confluence', 'Mur_Escalade_Confluence.jpg', 2463001),
	(39, 'Mure D eau Centre Commercial', 'Mure_D_eau_Centre_Commercial.jpg', 2690105),
	(40, 'Musee 2', 'Musee_2.jpg', 3808160),
	(41, 'Musee Confluence', 'Musee_Confluence.jpg', 3410717),
	(42, 'Musee Confluence2', 'Musee_Confluence2.jpg', 3074477),
	(45, 'Musee Confluence 2', 'Musee_Confluence_2.png', 13826835),
	(46, 'Musee Confluence Entree', 'Musee_Confluence_Entree.jpg', 2343109),
	(47, 'Musee Confluence Exterieur', 'Musee_Confluence_Exterieur.jpg', 3583680),
	(48, 'Musée Confluence 2', 'Musee_Confluence_2.png', 13203872),
	(49, 'Novotel', 'Novotel.jpg', 2831386),
	(50, 'Ouest Express', 'Ouest_Express.jpg', 2667478),
	(51, 'Panorama architecture confluence', 'Panorama_architecture_confluence.jpg', 979473),
	(52, 'Panorama Centre Commercial', 'Panorama_Centre_Commercial.jpg', 1022703),
	(53, 'Panorama Centre Commercial 2', 'Panorama_Centre_Commercial_2.jpg', 1191170),
	(54, 'Panorama musee confluence', 'Panorama_musee_confluence.jpg', 675587),
	(55, 'Patinoire', 'Patinoire.jpg', 3021498),
	(56, 'Paul', 'Paul.jpg', 2090121),
	(57, 'Peaky Blinders Tavern', 'Peaky_Blinders_Tavern.jpg', 2348622),
	(58, 'Perrache', 'Perrache.jpg', 3923390),
	(59, 'Piada', 'Piada.jpg', 2159159),
	(60, 'Pizzaiolo', 'Pizzaiolo.jpg', 3328948),
	(61, 'Pont', 'Pont.jpg', 3228494),
	(62, 'Pont Pasteur', 'Pont_Pasteur.jpg', 2834943),
	(63, 'Pont Pasteur Panorama', 'Pont_Pasteur_Panorama.jpg', 2595895),
	(64, 'Quai', 'Quai.jpg', 2950247),
	(65, 'Razowski', 'Razowski.jpg', 3739710),
	(66, 'SainteBlandine', 'SainteBlandine.jpg', 2762342),
	(67, 'Siege Euronews', 'Siege_Euronews.jpg', 3635476),
	(68, 'SteaknShake Confluence', 'SteaknShake_Confluence.jpg', 3330705),
	(69, 'Sushi Shop', 'Sushi_Shop.jpg', 2849049),
	(70, 'timelapse', 'Timelapse.gif', 41861),
	(71, 'Tram Confluence', 'Tram_Confluence.jpg', 2721850),
	(72, 'Tram Perrache', 'Tram_Perrache.jpg', 2486736),
	(73, 'Tram St Blandine', 'Tram_St_Blandine.jpg', 3868167),
	(74, 'Tram Suchet', 'Tram_Suchet.jpg', 3319299),
	(75, 'UGC Confluence', 'UGC_Confluence.jpg', 2561091),
	(76, 'Vaporetto', 'Vaporetto.jpg', 498744),
	(77, 'Velov', 'Velov.jpg', 2479105),
	(78, 'Velov Confluence', 'Velov_Confluence.jpg', 3179983),
	(79, 'VeloV St Blandine', 'VeloV_St_Blandine.jpg', 3546324);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Export de la structure de la table confluence. types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_fr` varchar(30) NOT NULL,
  `libelle_en` varchar(30) NOT NULL,
  `icone` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Export de données de la table confluence.types : ~9 rows (environ)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `libelle_fr`, `libelle_en`, `icone`) VALUES
	(1, 'Restaurants', 'Restaurant(s)', 'utensils'),
	(2, 'Culture', 'Culture', 'book'),
	(3, 'Sport', 'Sport', 'futbol'),
	(4, 'Boutiques', 'Shops', 'shopping-basket'),
	(5, 'Stations Auto-Partage', 'Car sharing stations', 'car'),
	(6, 'Stations de tram / Gares SNCF', 'Tram stations', 'train'),
	(7, 'Stations Vélo\'v', 'Vélo\'v stations', 'bicycle'),
	(8, 'Stations de bus', 'Bus stations', 'bus'),
	(9, 'Hotels', 'Hotels', 'bed');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
