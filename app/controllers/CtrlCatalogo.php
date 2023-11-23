
<?php

use models\Catalogo;
use core\utils\ControllerHandler;

class CtrlCatalogo extends ControllerHandler {

    private $estadosCivis = null;

    public function __construct(){
        $this->catalogo = new Catalogo();
        parent::__construct();
    }

    public function get() {
        print_r($this->catalogo->listAll());
    }

    public function post() {        
        $idCatalogo = $this->getParameter('idCatalogo');
        $descricao = $this->getParameter('descricao');
        $nome = $this->getParameter('nome');
        $this->catalogo->populate( $idCatalogo, $descricao, $nome);
        $result = $this->catalogo->save();
        echo $result;
    }

    public function put() {        
        $idCatalogo = $this->getParameter('idCatalogo');
        $descricao = $this->getParameter('descricao');
        $nome = $this->getParameter('nome');
        $this->catalogo->populate( $idCatalogo, $descricao, $nome);
        $result = $this->catalogo->save();
        echo $result;
    }

    public function delete() {        
        $idCatalogo = $this->getParameter('idCatalogo');
        $descricao = $this->getParameter('descricao');
        $nome = $this->getParameter('nome');
        $this->catalogo->populate( $idCatalogo, $descricao, $nome);
        $result = $this->catalogo->delete();
        echo $result;
    }

    public function file(){

    }
}

new CtrlCatalogo();
?>