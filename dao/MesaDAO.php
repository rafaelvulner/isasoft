<?php

require_once '../model/Mesa.php';
require_once '../Conexao/Conexao.php';

class MesaDAO {

    public function qtdMesas() {

        $conn = Database::conexao();
        $lista = array();


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

    public function carregaCategoria() {

        $lista = array();

        //Cria conexao
        $conn = Database::conexao();
        //Cria SQL para inserir no banco
        $sql = "select  t.id,t.nome_categoria from categoria t";
        //Cria o prepared para inserir com segurança no banco

        $ps = $conn->query($sql);

        while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $nomeCategoria = $row['nome_categoria'];

            $lista[] = array('id' => $id, 'nomeCategoria' => $nomeCategoria);
        }

        return json_encode($lista);
    }

    public function carregaProduto($id) {

        $lista = array();

        //Cria conexao
        $conn = Database::conexao();
        //Cria SQL para inserir no banco
        $sql = "select p.id, p.nome_prod from produto p
where p.id_categoria = ?";
        //Cria o prepared para inserir com segurança no banco

        $ps = $conn->prepare($sql);

        $ps->bindValue(1, $id);

        $ps->execute();



        while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $nomeProduto = $row['nome_prod'];

            $lista[] = array('id' => $id, 'nomeProduto' => $nomeProduto);
        }

        return json_encode($lista);
    }

    public function adicionarComanda($numMesa, $idProduto, $qtdProduto, $qtdPessoa) {
        //Cria conexao
        $conn = Database::conexao();

        //VERIFICAR SE A COMANDA JA NÃO EXISTE
        $sql = "select id_comanda from mesa
                where num_mesa =" . $numMesa;

        $ps = $conn->query($sql);

        //Looping para pegar todas informações do banco
        while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
            $verifica = $row['id_comanda'];
        }

        if ($verifica == null) {
            //ABRE A COMANDA COM ID ÚNICO
            $sql = "insert into comanda values(null,now(),0)";
            $ps = $conn->query($sql);

            //PEGA ID DA COMANDA PARA INSERTIR NA MESA
            $id = $conn->lastInsertId();

            //ABRE UMA MESA COM ID DA ULTIMA COMANDA ABERTA
            $sql = "update mesa set id_comanda = ? where num_mesa = ?;";
            $ps = $conn->prepare($sql);
            $ps->bindValue(1, $id);
            $ps->bindValue(2, $numMesa);
            $ps->execute();

            //ADICIONA OS PRODUTOS NA COMANDA
            $sql = "insert into comanda_produto values(null,?, ?,?,?)";
            $ps = $conn->prepare($sql);
            $ps->bindValue(1, $idProduto);
            $ps->bindValue(2, $id);
            $ps->bindValue(3, $qtdProduto);
            $ps->bindValue(4, $qtdPessoa);
            $ps->execute();

            echo "if";
        } else {
            echo "else";
            $sql = "insert into comanda_produto values(?,?,?,?,?)";
            $ps = $conn->prepare($sql);

            $ps->bindValue(1, null);
            $ps->bindValue(2, $idProduto);
            $ps->bindValue(3, $verifica);
            $ps->bindValue(4, $qtdProduto);
            $ps->bindValue(5, $qtdPessoa);
            $ps->execute();
        }
    }

    public function extratoComanda($numMesa) {
        $lista = array();
        //Cria conexao
        $conn = Database::conexao();
        //Cria SQL para inserir no banco
        $sql = "select t.*,r.total from restaurante t
                inner join (

                select num_mesa,sum(valor) as total from restaurante group by num_mesa

                ) r on t.num_mesa = r.num_mesa

                where t.num_mesa = ?";
        //Cria o prepared para inserir com segurança no banco

        $ps = $conn->prepare($sql);

        $ps->bindValue(1, $numMesa);

        $ps->execute();

        while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {

            $num_mesa = $row['num_mesa'];
            $id_comanda = $row['id_comanda'];
            $nome_prod = $row['nome_prod'];
            $preco_prod = $row['preco_prod'];
            $nome_categoria = $row['nome_categoria'];
            $qtd_produto = $row['qtd_produto'];
            $qtd_pessoas = $row['qtd_pessoas'];
            $valor = $row['valor'];
            $total = $row['total'];

            $lista[] = array('num_mesa' => $num_mesa, 'id_comanda' => $id_comanda, 'nome_prod' => $nome_prod, 'preco_prod' => $preco_prod, 'nome_categoria' => $nome_categoria, 'qtd_produto' => $qtd_produto, 'qtd_pessoas' => $qtd_pessoas, 'valor' => $valor, 'total' => $total);
        }

        return json_encode($lista);
    }

    public function liberarMesa($numMesa) {

        //Cria conexao
        $conn = Database::conexao();
        
        $sql = "update mesa set id_comanda = null where num_mesa = ?";

        $ps = $conn->prepare($sql);
        $ps->bindValue(1, $numMesa);
        $ps->execute();
    }
    
    public function transferirMesa($numMesa, $idComanda, $numMesaTransfer){
        //Cria conexao
        $conn = Database::conexao();
        
        $sql = "update mesa set id_comanda = null where num_mesa = ?";

        $ps = $conn->prepare($sql);
        $ps->bindValue(1, $numMesa);
        $ps->execute();
        
        $sql = "update mesa set id_comanda = ? where num_mesa = ?";

        $ps = $conn->prepare($sql);
        $ps->bindValue(1, $idComanda);
        $ps->bindValue(2, $numMesaTransfer);
        $ps->execute();
        
        
    }

}
