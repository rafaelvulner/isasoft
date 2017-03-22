<?php

require_once '../dao/MesaDAO.php';
$dao = new MesaDAO();

class MesaController {
    
    
    
    public function qtdMesas(){
        
        $dao = new MesaDAO();   
        
        return $dao->qtdMesas();
        
    }
    
    public function carregaCategoria(){  
        
        $dao = new MesaDAO();
        
        return $dao->carregaCategoria();
    }
    
    public function carregaProduto($id){
        
        
        $dao = new MesaDAO();
        
      
        
        return $dao->carregaProduto($id);
    }
    
    public function adicionarProduto(){
        
        $numMesa = $_POST['numMesa'];
        $idProduto = $_POST['idProduto'];
        $qtdProduto = $_POST['qtdProduto'];
        $qtdPessoa = $_POST['qtdPessoa'];
        
        $dao = new MesaDAO();
        
        $dao->adicionarComanda($numMesa, $idProduto, $qtdProduto, $qtdPessoa);
        
        return "Deu certo";
        
    }
    
    public function extratoComanda(){
        
        
        $numMesa = $_POST['numMesa'];
        
        $dao = new MesaDAO();
        
        return $dao->extratoComanda($numMesa);
    }
    
    public function liberarMesa(){
        $numMesa = $_POST['numMesa'];
        
        $dao = new MesaDAO();
        
        $dao->liberarMesa($numMesa);
    
    }
    
    public function transferirMesa(){
        
        $numMesa = $_POST['numMesa'];
        $idComanda = $_POST['idComanda'];
        $numMesaTranfer = $_POST['numMesaTransfer'];
        
        
        echo $numMesa." ".$idComanda." ".$numMesaTranfer;
        
        
        $dao = new MesaDAO();
        
        $dao->transferirMesa($numMesa, $idComanda,$numMesaTranfer);
    }
    
   
}
