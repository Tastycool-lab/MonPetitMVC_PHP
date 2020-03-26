<?php

namespace APP\Model;

use \PDO;
use APP\Entity\Client;

class GestionClientModel {

    public function find($id) {
        $connexion = $this->getConnexion();
//        $connexion = Connection::getConnexion();
        $sql = "select * from CLIENT where id=:id";
        $ligne = $connexion->prepare($sql);
        //ETRANGE bindValue
        $ligne->bindValue(':id', $id, PDO::PARAM_INT);
        $ligne->execute();
        return $ligne->fetchObject(Client::class);
    }

    public function findAll() {
        $unObjetPdo = Connexion::getConnexion();
        $sql = "select * from CLIENT";
        $lignes = $unObjetPdo->query($sql);
        return $lignes->fetchAll(PDO::FETCH_CLASS, Client::class);
    }

    public function getConnexion() {
        try {
            $pdo = new PDO("mysql:host=".DATABASE_URL.";port=".DATABASE_PORT.";dbname=".DATABASE_NAME."", DATABASE_USER, DATABASE_PWD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne 4
            return $pdo;
        } catch (PDOException $e) {
            $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
            throw new Exception('Erreur à la connexion <br>' . $e->getMessage());
        }
    }

}
