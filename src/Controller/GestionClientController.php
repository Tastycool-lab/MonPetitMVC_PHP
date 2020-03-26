<?php

namespace APP\Controller;

use APP\Model\GestionClientModel;
use ReflectionClass;
use \Exception;

class GestionClientController {
    
    public function chercheUn($params) {
        
       $modele = new GestionClientModel();
       $id = filter_var(intval($params["id"]),FILTER_VALIDATE_INT);
       $unClient = $modele->find($id);
       if($unClient){
           //ETRANGE ReflectionClass
           $r = new ReflectionClass($this);
           include_once PATH_VIEW.str_replace('Controller','View',$r->getShortName())."/unClient.php";
       }else{
           throw new Exception("Client".$id." inconnu.");
       }  
       
        
    }
    
    public function chercheTous(){
        $modele = new GestionClientModel();
        $clients = $modele->findAll();
        if($clients){
            $r = ReflectionClass($this);
            include_once PATH_VIEW.str_replace('Controller','View',$r->getShortName())."/plusieursClients.php";
        }else{
            throw new Exception("Aucun Client à afficher.");
        }
    }
}