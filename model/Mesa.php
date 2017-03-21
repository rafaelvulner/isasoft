<?php


class Mesa {
    
    private $ocupado;
    private $qtdPessoas;
    private $tipoAlimento;
    private $produto;
    private $qtdProduto;
    
    function getOcupado() {
        return $this->ocupado;
    }

    function getQtdPessoas() {
        return $this->qtdPessoas;
    }

    function getTipoAlimento() {
        return $this->tipoAlimento;
    }

    function getProduto() {
        return $this->produto;
    }

    function getQtdProduto() {
        return $this->qtdProduto;
    }

    function setOcupado($ocupado) {
        $this->ocupado = $ocupado;
    }

    function setQtdPessoas($qtdPessoas) {
        $this->qtdPessoas = $qtdPessoas;
    }

    function setTipoAlimento($tipoAlimento) {
        $this->tipoAlimento = $tipoAlimento;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setQtdProduto($qtdProduto) {
        $this->qtdProduto = $qtdProduto;
    }


}
