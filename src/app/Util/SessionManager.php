<?php

namespace App\Util;

/**
 * Classe de gestion de session
 * 
 * @author Julien RAVIA <julien.ravia@gmail.com>
 */
class SessionManager
{
    /**
     * Retourne la valeur correspondante d'une variable de session
     *
     * @param string $key
     */
    public function get(string $key = null)
    {
        if($key === null)
            return $_SESSION;

        if(!isset($_SESSION[$key]))
            return null;

        return $_SESSION[$key];
    }

    /**
     * Attribue la valeur choisie à une variable de session
     *
     * @param string $key
     * @param $value
     *
     * @return void
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Détruit une variable de session
     *
     * @param string $key
     *
     * @return void
     */
    public function unset(string $key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * Détruit la session de l'utilisateur
     *
     * @return void
     */
    public function destroy()
    {
        session_destroy();
    }
}