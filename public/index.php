<?php 

include_once '../bootstrap.php';

$router = new AltoRouter();
// Si il n'y à pas de virtual host et que le projet est dans www
// $router->setBasePath('/confluence/public');

// Page d'accueil et déconnexion
$router->addRoutes(array(
    array('GET', '/', 'App\\Controllers\\HomeController@index', 'fezf'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/[fr|en:lang]', 'App\\Controllers\\HomeController@lang', 'switchLang'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/[fr|en:lang]/[accueil|homepage]', 'App\\Controllers\\HomeController@index', 'index'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/[fr|en:lang]/[decouvrir|discover]', 'App\\Controllers\\DiscoverController@index', 'decouvrir'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/[fr|en:lang]/[decouvrir|discover]/[galerie|gallery]', 'App\\Controllers\\DiscoverController@gallery', 'galerie'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/[fr|en:lang]/[a-propos|about]', 'App\\Controllers\\AboutController@index', 'a-propos'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET', '/[fr|en:lang]/[cgu|terms-of-use]', 'App\\Controllers\\HomeController@cgu', 'cgu'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET','/api/lieux/[i:id]', 'App\\Controllers\\ApiController@lieuxByType', 'lieuxByType'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET','/contact', 'App\\Controllers\\ContactController@index', 'contact'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('POST','/contact/send', 'App\\Controllers\\ContactController@send', 'checkEmail'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('POST','/api/lieux', 'App\\Controllers\\ApiController@lieuxByTypes', 'lieuxByTypes'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('POST','/api/types', 'App\\Controllers\\ApiController@types', 'types'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET','/api/weather', 'App\\Controllers\\ApiController@weather', 'weather'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('GET','/api/photos/[*:path]', 'App\\Controllers\\ApiController@photos', 'photos'), // affichage de la page d'accueil ou de la page de connexion si non connecté
));

$match = $router->match();

if (!$match) { 
    header('HTTP/1.0 404 Not Found', true, 404);
} else {
    list($controller, $action) = explode('@', $match['target']);
    $lang = array_key_exists('lang', $match['params']) ? $match['params']['lang'] : $session->get('lang');
    
    $controller = new $controller($lang);
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