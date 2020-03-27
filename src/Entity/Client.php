<?php

namespace APP\Entity;

class Client {


    
    public function getId(){
       return $this->id;
    }
    
    public function getTitreCli(){
        return $this->titreCli;
    }
    
    public function getPrenomCli(){
        return $this->prenomCli;
    }
    
    public function getNomCli(){
        return $this->nomCli;
    }

}

