<?php
use App\Util\SessionManager;

session_start();
include_once 'vendor/autoload.php';

$session = new SessionManager;
$sessions = ['lang' => 'fr', 'accessibility' => false];

foreach ($sessions as $key => $default) {
    if($session->get($key) === null) {
        $session->set($key, $default);
    }
}

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();