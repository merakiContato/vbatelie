
<?php

use models\Cliente;
use core\utils\ControllerHandler;

class CtrlCliente extends ControllerHandler {

    private $cliente = null;

    public function __construct(){
        $this->cliente = new Cliente();
        parent::__construct();
    }

    public function get() {
        print_r($this->cliente->listAll());
    }

    public function post() {        
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->cliente->populate( $cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->cliente->save();
        echo $result;
    }

    public function put() {        
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->cliente->populate( $cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->cliente->save();
        echo $result;
    }

    public function delete() {        
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->cliente->populate( $cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->cliente->delete();
        echo $result;
    }

    public function file(){

    }
}

new CtrlCliente();
?>