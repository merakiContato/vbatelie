
<?php

use models\Material;
use core\utils\ControllerHandler;

<<<<<<< HEAD
class CtrlMaterial extends ControllerHandler
{

    private $material = null;

    public function __construct()
    {
=======
class CtrlMaterial extends ControllerHandler {

    private $material = null;

    public function __construct(){
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $this->material = new Material();
        parent::__construct();
    }

<<<<<<< HEAD
    public function get()
    {
        echo json_encode($this->material->listAll());
    }

    public function post()
    {
        var_dump($_POST);
        $idMaterial = $this->getParameter('idMaterial') ?? 0;
        $idMaterial = (($idMaterial == '') ? 0 : $idMaterial);
        $titulo = $this->getParameter('titulo');
        $descricao = $this->getParameter('descricao');
        $this->material->populate($idMaterial, $titulo, $descricao);
=======
    public function get() {
        echo json_encode($this->material->listAll());
    }

    public function post() {        
        $idMaterial = $this->getParameter('idMaterial');
        $titulo = $this->getParameter('titulo');
        $descricao = $this->getParameter('descricao');
        $this->material->populate( $idMaterial, $titulo, $descricao);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->material->save();
        echo $result;
    }

<<<<<<< HEAD
    public function put()
    {
        $idMaterial = $this->getParameter('idMaterial');
        $titulo = $this->getParameter('titulo');
        $descricao = $this->getParameter('descricao');
        $this->material->populate($idMaterial, $titulo, $descricao);
=======
    public function put() {        
        $idMaterial = $this->getParameter('idMaterial');
        $titulo = $this->getParameter('titulo');
        $descricao = $this->getParameter('descricao');
        $this->material->populate( $idMaterial, $titulo, $descricao);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->material->save();
        echo $result;
    }

<<<<<<< HEAD
    public function delete() {
        $idMaterial = $this->getParameter('idMaterial');
        $this->material->setIdMaterial($idMaterial);
    
        $result = $this->material->delete();
        echo $result;
    }
    


    public function file()
    {
=======
    public function delete() {        
        $idMaterial = $this->getParameter('idMaterial');
        $titulo = $this->getParameter('titulo');
        $descricao = $this->getParameter('descricao');
        $this->material->populate( $idMaterial, $titulo, $descricao);
        $result = $this->material->delete();
        echo $result;
    }

    public function file(){

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
    }
}

new CtrlMaterial();
?>
