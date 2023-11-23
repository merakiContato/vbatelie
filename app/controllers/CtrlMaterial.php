
<?php

use models\Material;
use core\utils\ControllerHandler;

class CtrlMaterial extends ControllerHandler {

    private $material = null;

    public function __construct(){
        $this->material = new Material();
        parent::__construct();
    }

    public function get() {
        echo json_encode($this->material->listAll());
    }

    public function post() {        
        $idMaterial = $this->getParameter('idMaterial');
        $titulo = $this->getParameter('titulo');
        $descricao = $this->getParameter('descricao');
        $this->material->populate( $idMaterial, $titulo, $descricao);
        $result = $this->material->save();
        echo $result;
    }

    public function put() {        
        $idMaterial = $this->getParameter('idMaterial');
        $titulo = $this->getParameter('titulo');
        $descricao = $this->getParameter('descricao');
        $this->material->populate( $idMaterial, $titulo, $descricao);
        $result = $this->material->save();
        echo $result;
    }

    public function delete() {        
        $idMaterial = $this->getParameter('idMaterial');
        $titulo = $this->getParameter('titulo');
        $descricao = $this->getParameter('descricao');
        $this->material->populate( $idMaterial, $titulo, $descricao);
        $result = $this->material->delete();
        echo $result;
    }

    public function file(){

    }
}

new CtrlMaterial();
?>
