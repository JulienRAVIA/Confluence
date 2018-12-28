# Comprendre le projet

#### Programmation Orientée Objet et MVC : 

Le projet est réalisé en [orienté objet](https://www.grafikart.fr/formations/programmation-objet-php) avec une architecture [MVC (Model View Controller)](https://www.grafikart.fr/formations/programmation-objet-php/mvc-model-view-controller).
* Les requêtes SQL sont dans le fichier `src/app/Database.php` (singleton et Model). Une méthode/fonction = une requête
* Les vues sont dans le dossier `src/templates/` et ont pour extension `.html.twig` (extension obligatoire pour toute nouvelle vue)
* Les controlleurs (classes d'actions) sont dans le dossier `src/app/Controllers`. Un controlleur = une page/un module (sauf pages vitrines)
* Les fichiers de traduction sont dans le dossier  (classes d'actions) sont dans le dossier `src/trads` au format YAML et chargés par un module YAML. Un fichier = une langue;

# Comprendre les technos

Maintenant, présentation des technos ou librairies utilisées : 

#### Composer
Composer est un gestionnaire de paquets PHP, il permet le téléchargement et l'utilisation de librairies externes de manière rapide et propre.
Pour trouver des librairies, il suffit de visiter le site : https://packagist.org ou alors même Github, la plupart des projets proposent dans leur README un "namespace composer" :  _author/project_

Pour ajouter ces dépendances au projet : `composer require author/project`

* [Vidéo de présentation et tutoriel](https://www.grafikart.fr/tutoriels/php/composer-480)

#### Twig
[Twig](https://twig.symfony.com/doc/2.x/) est un moteur de template, il va "compiler" du code html. 

Twig est très complet et extensible, aller lire la documentation et voir la vidéo de présentation afin de voir les différentes solutions qu'apporte Twig. 
* [Documentation](https://twig.symfony.com/doc/2.x/).
* [Vidéo de présentation et tutoriel](https://www.grafikart.fr/tutoriels/php/twig-832)

Plusieurs extensions, tutoriels ou autres sont disponibles pour Twig, pour les découvrir allez voir mon dépot Github **Awesome Twig** : https://github.com/JulienRAVIA/awesome-twig

#### AltoRouter
[AltoRouter](http://altorouter.com) est un système de routage en PHP. Il permet de générer des URL propres (par exemple `http://ndd.com/decouvrir` et propre à un type de requête (GET ou POST), ou tout simplement de générer des routes particulères en attendant en paramètre un certain type de données (par exemple `http://ndd.com/restaurant/18` au lieu de `http//ndd.com/restaurants.php?id=18`). 

* [Documentation](http://altorouter.com)
* Comment créer ses routes : http://altorouter.com/usage/mapping-routes.html

#### L'autoloading
Grace à ces simples lignes dans le fichier `composer.json` : 
`"autoload": {
        "psr-4": {
            "App\\": "src/app/"
        }
    }
`, on peut ordonner à Composer d'auto-charger le dossier `src/app/` et d'y attribuer le namespace App.
Il est possible de modifier ou ajouter un auto-chargement, il faut ensuite faire la commande : `composer dump --autoload`

[Vidéo d'explication](https://www.grafikart.fr/tutoriels/php/autoload-php-psr-510)

# Comprendre les routes

Nous avons par exemple dans le fichier `public/index.php` ceci :
 
![](https://i.imgur.com/mBcrD5K.png)
Bon ça suit pas ce que je vais dire après, mais tant pis...

**Attention, l'ordre de déclaration des routes est important, il faut le réflechir**

### Ajouter une route

Voici l'exemple de base d'ajout de route

`$router->map( 'METHOD', '/route', 'namespace\\controller@method', 'route_name');`
* METHOD correspond au type de requête que va matcher le routeur pour cette route. (GET ou POST)
* namespace correspond au namespace du controlleur
* controller correspond au nom du controlleur (le nom de la classe devant avoir le même nom que celui du fichier (sans le .php bien sur)
* @ est le signe pour séparer le controller et la méthode. Pas besoin de toucher..
* method correspond au nom de la méthode présente dans le controller
* route_name correspond au nom de la route. Pour ce projet ce n'est pas forcément nécessaire mais pour les projets avec un framework tel que Symfony ou Laravel, ce sera utile. **Attention, un route_name doit-être unique**. Le dernier paramètre n'est donc pas obligatoire

Prenons donc pour exemple : 

`$router->map('GET', '/decouvrir', 'App\\Controllers\\HomeController@index', 'index');`
Lorsque l'url dans la barre de recherche sera par exemple http://confluence.fr/decouvrir, le routeur appellera la méthode index du controller HomeController (ayant pour namespace App\\Controllers\\). Le nom de la route est index

Si on essaye cette URL avec la méthode POST, le script renverra une exception car l'url n'existe pas (à moins qu'elle ait été ajoutée peu après avec pour type de méthode POST)

Par exemple
`$router->map('POST', '/contact', 'App\\Controllers\\ContactController@send', 'send');`
servira pour les formulaires ou les requêtes ajax

### Une même route pour deux types de requêtes

Il est tout à fait possible d'avoir pour une même route, deux types de requêtes différents qui appelleront chacun une méthode différente (mais devront avoir un nom de route différent)
`$router->map('GET', '/contact', 'App\\Controllers\\ContactController@index', 'contact_index');` lorsque l'url dans la barre d'adresse finira en /contact
`$router->map('POST', '/contact', 'App\\Controllers\\ContactController@send', 'contact_send');` lorsque l'url lors d'une requête AJAX ou d'un envoi de formulaire fini en /contact

### Plusieurs routes pour un même controlleur/une même page

Il est mieux de regrouper les routes par page. Par exemple pour la page contact on peut faire comme ceci : 
![](https://i.imgur.com/5xXQS2g.png)

### Attendre un ou des paramètre(s) dans une route
Il est possible d'attendre un ou plusieurs paramètre(s) dans une route, afin d'effectuer des requêtes particulières ou autre.
Si la route est de type **GET**, on peut faire comme ceci par exemple : 
`$router->map('GET', '/restaurants/[i:id]', 'App\\Controllers\\RestaurantsController@fiche', 'fiche_restaurant');`
_i_ correspond au type de valeur attendue (un integer)
_id_ correspond au nom de la valeur attendue (on attend un id, donc id, mais on peut-mettre ce que bon nous semble)

Pour récupérer la valeur passée dans l'url ensuite, il faudra dans la méthode ajouter en paramètre une variable **$request** et récupérer la valeur par rapport au nom renseigné dans la route : 

![](https://i.imgur.com/BWD51MK.png)

#### Les types
* [i]                  // Match an integer
* [i:id]               // Match an integer as 'id'
* [a:action]           // Match alphanumeric characters as 'action'
* [h:key]              // Match hexadecimal characters as 'key'
* [:action]            // Match anything up to the next / or end of the URI as 'action'
* [create|edit:action] // Match either 'create' or 'edit' as 'action'
* [*]                  // Catch all (lazy, stops at the next trailing slash)
* [*:trailing]         // Catch all as 'trailing' (lazy)
* [**:trailing]        // Catch all (possessive - will match the rest of the URI)
* .[:format]?          // Match an optional parameter 'format' - a / or . before the block is also optional

Ce qui correspond à ces expressions régulières : 
* 'i'  => '[0-9]++' (donc integer)
* 'a'  => '[0-9A-Za-z]++' (string)
* 'h'  => '[0-9A-Fa-f]++' 
* '*'  => '.+?' (tout type de données)
* '**' => '.++'
* ''   => '[^/\.]++'

il est possible d'ajouter un type attendu avec cette ligne dans le fichier `public/index.php` : 
`$router->addMatchTypes(array('aliasdutype' => 'regex'));` après : `$router = new AltoRouter();`

**exemple :** 

`$router->addMatchTypes(array('cId' => '[a-zA-Z]{2}[0-9](?:_[0-9]++)?'));`

`$router->map('GET', '/restaurants/[cId:id]', 'App\\Controllers\\RestaurantsController@fiche', 'fiche_restaurant');`

# Installer et configurer le projet

### Prérequis
* Installer [WampServer](http://www.wampserver.com) (la v3 de préférence) ou tout autre serveur AMP (Apache MySQL PHP) : par exemple [Laragon](https://laragon.org) ([vidéo présentation et tutoriel](https://www.youtube.com/watch?v=sHHl5kihXD4))
* Installer [Composer](https://getcomposer.org/), soit via le Setup directement (Windows) (**le paramétrer sur la version PHP 7.1.\***) soit par l'invite de commande : [téléchargement](https://getcomposer.org/download/) 
* Installer [Git](https://git-scm.com) si ensuite vous êtes amenés à développer sur le projet et cloner le projet : 
`git clone https://github.com/JulienRAVIA/Confluence.git`

### Création d'un virtual host
Il est conseillé de paramétrer un virtual host (nom de domaine virtuel) sur le dossier public (par exemple `C:/wamp/www/confluence/public` en chemin de virtual host), c'est possible facilement et rapidement via Wamp : [tutoriel rapide](https://agence-web.cubis-helios.com/wamp-creer-un-nouveau-vhosts-domaine-sous-domaine/) ou [tutoriel manuel](https://blog.smarchal.com/creer-un-virtualhost-avec-wampserver), si autre que Wamp (ou Laragon qui le permet aussi, regarder la vidéo donnée plus haut), Google is your friend.

Par exemple, votre virtual host peut-être : `confluence.dev` (ça risque de buguer selon le navigateur à cause de l'extension **.dev**), `confluence.local`, `confluence.g4`, fin bref libre à vous de choisir

**Attention, si vous choisissez de ne pas passer par un virtual-host, il faut ajouter à l'adresse locale le suffixe `/public`**
**Exemple : `http://localhost/confluence/public`** et ainsi dé commenter la ligne suivante du fichier _index.php_ dans le dossier _public_ : 
`// $router->setBasePath('/confluence/public');`, remplacer `confluence` par le nom de votre dossier

Bien entendu si la ligne en question est dé commentée et que vous souhaitez utiliser un virtual host, il faut la commenter, petit raccourci une fois sur la ligne <kbd>Ctrl</kbd>+<kbd>/</kbd> pour que le routage marche

>  Pourquoi un virtual host ?
Parce que `confluence.quelquechose` c'est bien mieux que `http://localhost/confluence/public`

### Installation des dépendances
Le projet utilise plusieurs dépendances qui seront nécessaires au projet, ou alors même nécessite un système d'[autoloading](https://www.grafikart.fr/formations/programmation-objet-php/autoload) qui est pris en charge par Composer, notre gestionnaire de dépendances qui va être très pratique

Pour installer les dépendances, une fois le projet cloné et installé correctement dans votre dossier local de développement, executer la commande suivante : `composer install --no-dev` dans l'invite de commande et positionné dans le dossier en question (avec la commande cd) 

### Configuration de la base de données
Pour configurer la base de données, il suffit de dupliquer le fichier .env.dist et le nommer .env, et changer les valeurs correspondantes. Par défaut, elles sont configurées avec les identifiants et hôtes par défaut de Wamp

La classe Database est un [singleton](https://www.grafikart.fr/formations/programmation-objet-php/singleton) qui sert aussi de Model (classe de requêtes). Toutes les requêtes devront dans cette classe, une fonction = une requête (conseil : utiliser les [requêtes préparées](https://secure.php.net/manual/fr/pdo.prepared-statements.php))

### Générer la documentation
Lancer la mise à jour/regénération de la documentation avec la commande suivante (à la racine du projet) : `vendor\bin\apigen generate src --destination docs`