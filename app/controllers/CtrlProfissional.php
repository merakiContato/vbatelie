
<?php

use models\Profissional;
use core\utils\ControllerHandler;

class CtrlProfissional extends ControllerHandler {

    private $profissional = null;

    public function __construct(){
        $this->profissional = new Profissional();
        parent::__construct();
    }

    public function get() {
        echo json_encode($this->profissional->listAll());
    }

    public function post() { 
        var_dump($_POST);       
        $idProfissional = $this->getParameter('idProfissional')??0;
        $idProfissional = (( $idProfissional == '') ? 0 : $idProfissional);
        $nome = $this->getParameter('nome');
        $cargo = $this->getParameter('cargo');
        $hrTrabalho = $this->getParameter('hrTrabalho');
        $cpf = $this->getParameter('cpf');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->profissional->populate( $idProfissional, $nome, $cargo, $hrTrabalho, $cpf, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->profissional->save();
        echo $result;
    }

    public function put() {        
        $idProfissional = $this->getParameter('idProfissional');
        $nome = $this->getParameter('nome');
        $cargo = $this->getParameter('cargo');
        $hrTrabalho = $this->getParameter('hrTrabalho');
        $cpf = $this->getParameter('cpf');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->profissional->populate( $idProfissional, $nome, $cargo, $hrTrabalho, $cpf, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->profissional->save();
        echo $result;
    }

    public function delete() {        
        $idProfissional = $this->getParameter('idProfissional');
        $this->profissional->setidProfissional($idProfissional);
    
        $result = $this->profissional->delete();
        echo $result;
    }


    public function file(){

    }
}

new CtrlProfissional();
?>