
<?php

use models\Servcontratado;
use core\utils\ControllerHandler;

class CtrlServcontratado extends ControllerHandler {

    private $servcontratado = null;

    public function __construct(){
        $this->servcontratado = new Servcontratado();
        parent::__construct();
    }

    public function get() {
        echo json_encode($this->servcontratado->listAll());
    }

    public function post() {        
        $idServContratado = $this->getParameter('idServContratado')??0;
        $idServContratado = (( $idServContratado == '') ? 0 : $idServContratado);
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $telefone = $this->getParameter('telefone');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $email = $this->getParameter('email');
        $idPedido = $this->getParameter('idPedido');
        $idServico = $this->getParameter('idServico');
        $pagServ = $this->getParameter('pagServ');
        $dtPagServ = $this->getParameter('dtPagServ');
        $this->servcontratado->populate( $idServContratado, $cpf, $nome, $telefone, $cep, $endereco, $complemento, $email, $idPedido, $idServico, $pagServ, $dtPagServ);
        $result = $this->servcontratado->save();
        echo $result;
    }

    public function put() {        
        $idServContratado = $this->getParameter('idServContratado');
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $telefone = $this->getParameter('telefone');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $email = $this->getParameter('email');
        $idPedido = $this->getParameter('idPedido');
        $idServico = $this->getParameter('idServico');
        $pagServ = $this->getParameter('pagServ');
        $dtPagServ = $this->getParameter('dtPagServ');
        $this->servcontratado->populate( $idServContratado, $cpf, $nome, $telefone, $cep, $endereco, $complemento, $email, $idPedido, $idServico, $pagServ, $dtPagServ);
        $result = $this->servcontratado->save();
        echo $result;
    }

    public function delete() {        
        $idServContratado = $this->getParameter('idServContratado');
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $telefone = $this->getParameter('telefone');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $email = $this->getParameter('email');
        $idPedido = $this->getParameter('idPedido');
        $idServico = $this->getParameter('idServico');
        $pagServ = $this->getParameter('pagServ');
        $dtPagServ = $this->getParameter('dtPagServ');
        $this->servcontratado->populate( $idServContratado, $cpf, $nome, $telefone, $cep, $endereco, $complemento, $email, $idPedido, $idServico, $pagServ, $dtPagServ);
        $result = $this->servcontratado->delete();
        echo $result;
    }

    public function file(){

    }
}

new CtrlServcontratado();
?>