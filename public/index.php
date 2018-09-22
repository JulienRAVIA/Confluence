<?php 

include_once '../bootstrap.php';

$router = new AltoRouter();
// Si il n'y à pas de virtual host et que le projet est dans www
// $router->setBasePath('/confluence/public');

// Page d'accueil et déconnexion
$router->addRoutes(array(
    array('GET', '/', 'App\\Controllers\\HomeController@index', 'index'), // affichage de la page d'accueil ou de la page de connexion si non connecté
    array('POST','/api/lieux', 'App\\Controllers\\ApiController@lieuxByTypes', 'lieuxByTypes'), // affichage de la page d'accueil ou de la page de connexion si non connecté
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