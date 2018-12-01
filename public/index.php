<?php 

include_once '../bootstrap.php';

$router = new AltoRouter();
// Si il n'y à pas de virtual host et que le projet est dans www
// $router->setBasePath('/confluence/public');

// Page d'accueil et déconnexion
$router->addRoutes(array(
    array('GET', '/', 'App\\Controllers\\HomeController@index', 'index'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/se-reperer', 'App\\Controllers\\FindController@index', 'se-reperer'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/decouvrir', 'App\\Controllers\\DiscoverController@index', 'decouvrir'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/a-propos', 'App\\Controllers\\AboutController@index', 'a-propos'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/cgu', 'App\\Controllers\\HomeController@cgu', 'cgu'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/[fr|en:lang]', 'App\\Controllers\\HomeController@lang', 'switchLang'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET','/api/lieux/[i:id]', 'App\\Controllers\\ApiController@lieuxByType', 'lieuxByType'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET','/contact', 'App\\Controllers\\ContactController@index', 'contact'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('POST','/contact/send', 'App\\Controllers\\ContactController@send', 'checkEmail'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('POST','/api/lieux', 'App\\Controllers\\ApiController@lieuxByTypes', 'lieuxByTypes'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('POST','/api/types', 'App\\Controllers\\ApiController@types', 'types'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET','/api/weather', 'App\\Controllers\\ApiController@weather', 'weather'), // affichage de la page d'accueil ou de la page de connexion si non connecté
));

$match = $router->match();

if (!$match) { 
    throw new Exception('Page non trouvée');
} else {
    list($controller, $action) = explode('@', $match['target']);
    $controller = new $controller;
    if (is_callable(array($controller, $action))) {
        try {
            call_user_func_array(array($controller, $action), array($match['params']));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo 'Error: can not call ' . get_class($controller) . '@' . $action;
        // here your routes are wrong.
        // Throw an exception in debug, send a 500 error in production
    }
}

?>