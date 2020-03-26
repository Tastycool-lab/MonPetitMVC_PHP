<?php

class Connexion {

    private static $connexion = null;
    private static $connexionInstance = null;

    private function __construct() {
        try {

            self::$connexion = new PDO("mysql:host={".DATABASE_URL."};port={".DATABASE_PORT."};dbname={".DATABASE_NAME."}", DATABASE_USER, DATABASE_PWD);
            self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne 4
        } catch (PDOException $e) {
            $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
            throw new Exception('Erreur à la connexion <br>' . $e->getMessage());
        }
    }

    public static function getConnexion() {

        if (is_null(self::$connexionInstance)) {
            self::$connexionInstance = new Connexion();
        }

        return self::$connexion;
    }

}
