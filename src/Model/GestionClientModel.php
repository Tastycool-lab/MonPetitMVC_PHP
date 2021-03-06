<?php

namespace APP\Model;

use \PDO;
use APP\Entity\Client;
use Tools\Connexion;

class GestionClientModel {

    public function find($id) {
//        $connexion = $this->getConnexion();
        $connexion = Connexion::getConnexion();
        $sql = "select * from CLIENT where id=:id";
        $ligne = $connexion->prepare($sql);
        //ETRANGE bindValue
        $ligne->bindValue(':id', $id, PDO::PARAM_INT);
        $ligne->execute();
        return $ligne->fetchObject(Client::class);
    }

    public function findAll() {
        $connexion = Connexion::getConnexion();
        $sql = "select * from CLIENT";
        $lignes = $connexion->query($sql);
        return $lignes->fetchAll(PDO::FETCH_CLASS, Client::class);
    }
}
