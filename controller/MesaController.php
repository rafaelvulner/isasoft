<?php

require_once '../dao/MesaDAO.php';

class MesaController {
    
    public function qtdMesas(){
        
        $dao = new MesaDAO();
        
        return $dao->qtdMesas();
        
    }
    
    public function teste(){
        
        return "teste";
    }
   
}
