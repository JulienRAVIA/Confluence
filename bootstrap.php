<?php
use App\Util\SessionManager;

session_start();
ini_set('memory_limit', '-1');
include_once 'vendor/autoload.php';

$session = new SessionManager;
if($session->get('lang') === null) {
    $session->set('lang', 'fr');
}

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();