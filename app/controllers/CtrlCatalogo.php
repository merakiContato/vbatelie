
<?php

use models\Catalogo;
use core\utils\ControllerHandler;

class CtrlCatalogo extends ControllerHandler {

<<<<<<< HEAD
    private $catalogo = null;
=======
    private $estadosCivis = null;
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465

    public function __construct(){
        $this->catalogo = new Catalogo();
        parent::__construct();
    }

    public function get() {
<<<<<<< HEAD
        echo json_encode($this->catalogo->listAll());
    }

    public function post() {        
        $idCatalogo = $this->getParameter('idCatalogo')??0;
        $idCatalogo = (( $idCatalogo == '') ? 0 : $idCatalogo);
=======
        print_r($this->catalogo->listAll());
    }

    public function post() {        
        $idCatalogo = $this->getParameter('idCatalogo');
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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
<<<<<<< HEAD
        $this->catalogo->setidCatalogo($idCatalogo);
    
=======
        $descricao = $this->getParameter('descricao');
        $nome = $this->getParameter('nome');
        $this->catalogo->populate( $idCatalogo, $descricao, $nome);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->catalogo->delete();
        echo $result;
    }

    public function file(){

    }
}

new CtrlCatalogo();
?>