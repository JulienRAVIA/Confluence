<?php

namespace App;

/**
 * Classe d'accès aux données
 */
class Database {

    private static $dbh; // Objet dbh
    private $_host = 'localhost';
    private $_database = 'confluence';
    private $_user = 'root';
    private $_password = '';
    private $_port = 3306;
    private static $instance;

    /**
     * Constructeur avec la création de l'instance de base de données
     */
    private function __construct() {
        $user = $this->_user;
        $password = $this->_password;
        $options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
        $options[\PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";

        $dsn = 'mysql:host=' . $this->_host .
                ';dbname=' . $this->_database;
        // Au besoin :
        //';port='      . $this->_port .
        //';connect_timeout=15';
        // Création du pdo
        try {
            Database::$dbh = new \PDO($dsn, $user, $password, $options);
            Database::$dbh->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception('Impossible de se connecter à la base de données');
        }
    }

    /**
     * Méthode statique de récupération de l'instance
     * 
     * @return PDO Instance de base de données
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

    /**
     * Récupération des types de lieux
     *
     * @return array
     */
    public function getTypes()
    {
        $query = Database::$dbh->query('SELECT * FROM types');
        return $query->fetchAll();
    }
    
    /**
     * Récupération de tous les lieux
     *
     * @return array
     */
    public function getLieux()
    {
        $query = Database::$dbh->query('SELECT * FROM lieux INNER JOIN types ON lieux.type = types.id');
        return $query->fetchAll();
    }

    /**
     * Récupération sous forme de tableau (nom, coordonnées GPS, icone du type de lieu)
     * des lieux ayant pour type le type renseigné en paramètre
     *
     * @param array $types Identifiant dU type à filtrer
     *
     * @return array 
     */
    public function getLieuxByType(int $type)
    {
        $query = Database::$dbh->prepare('SELECT lieux.* FROM lieux INNER JOIN types ON lieux.type = types.id WHERE types.id = :type');
        $query->execute(array('type' => 1));
        return $query->fetchAll();
    }

    /**
     * Récupération sous forme de tableau (nom, coordonnées GPS, icone du type de lieu)
     * des lieux ayant pour type les types renseignés en paramètre
     *
     * @param array $types Identifiant des types à filtrer
     *
     * @return array 
     */
    public function getLieuxByTypes(array $types)
    {
        $query = Database::$dbh->prepare('SELECT nom, gps, icone FROM lieux INNER JOIN types ON lieux.type = types.id WHERE types.id IN(:types)');
        $query->execute(['types' => implode(', ', $types)]);
        return $query->fetchAll();
    }
}
