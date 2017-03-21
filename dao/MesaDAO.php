<?php

require_once '../model/Mesa.php';
require_once '../Conexao/Conexao.php';

class MesaDAO {
    
    
   
    public function qtdMesas(){  

        $lista = array();        
        
        //Cria conexao
        $conn = Database::conexao("localhost", "isasoft", "root", "", "mysql");
        //Cria SQL para inserir no banco
        $sql = "select *  from mesa";
        //Cria o prepared para inserir com segurança no banco
        $ps = $conn->prepare($sql);
        $ps = $conn->query($sql);       
                        
       while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
           $numMesa = $row['num_mesa'];
           $idComanda = $row['id_comanda'];
           
           $lista[] = array('numMesa' => $numMesa, 'id_comanda' => $idComanda);
             
       }      
       
       
      
       
        return json_encode($lista);
    }
    
  
    
}
