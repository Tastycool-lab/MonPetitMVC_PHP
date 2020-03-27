<?php

namespace APP\Model;

use \PDO;
use APP\Entity\Commande;
use Tools\Connexion;

class GestionCommandeModel {

    public function find($id) {
        $connexion = Connexion::getConnexion();
        $sql = "select * from COMMANDE where id=:id";
        $ligne = $connexion->prepare($sql);
        //ETRANGE bindValue
        $ligne->bindValue(':id', $id, PDO::PARAM_INT);
        $ligne->execute();
        return $ligne->fetchObject(Commande::class);
    }

    public function findAll() {
        $connexion = Connexion::getConnexion();
        $sql = "select * from COMMANDE";
        $lignes = $connexion->query($sql);
        return $lignes->fetchAll(PDO::FETCH_CLASS, Commande::class);
    }
}
