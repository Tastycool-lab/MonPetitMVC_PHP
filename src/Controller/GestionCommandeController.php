<?php

namespace APP\Controller;

use APP\Model\GestionCommandeModel;
use ReflectionClass;
use \Exception;

class GestionCommandeController {
    
    public function chercheUne($params) {
        
       $modele = new GestionCommandeModel();
       $id = filter_var(intval($params["id"]),FILTER_VALIDATE_INT);
       $uneCommande = $modele->find($id);
       if($uneCommande){
           //ETRANGE ReflectionClass
           $r = new ReflectionClass($this);
           include_once PATH_VIEW.str_replace('Controller','View',$r->getShortName())."/chercheUne.php";
       }else{
           throw new Exception("Commande".$id." inconnu.");
       }  
       
        
    }
    
    public function chercheToutes(){
        $modele = new GestionCommandeModel();
        $commandes = $modele->findAll();
        if($commandes){
            $r = new ReflectionClass($this);
            include_once PATH_VIEW.str_replace('Controller','View',$r->getShortName())."/chercheToutes.php";
        }else{
            throw new Exception("Aucune Commande à afficher.");
        }
    }
}