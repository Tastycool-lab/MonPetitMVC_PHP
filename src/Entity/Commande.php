<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace APP\Entity;

/**
 * Description of Commande
 *
 * @author alex8
 */
class Commande {

    public function getId() {
        return $this->id;
    }

    public function getDateCde() {
        return $this->dateCde;
    }

    public function getNoFacture() {
        if (is_null($this->noFacture)) {
            return "Non facturée";
        } else {
            return $this->noFacture;
        }
    }

    public function getIdClient() {
        return $this->idClient;
    }

}
