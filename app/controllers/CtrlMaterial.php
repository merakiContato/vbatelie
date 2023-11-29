
<?php

use models\Material;
use core\utils\ControllerHandler;

class CtrlMaterial extends ControllerHandler
{

    private $material = null;

    public function __construct()
    {
        $this->material = new Material();
        parent::__construct();
    }

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
        $result = $this->material->save();
        echo $result;
    }

    public function put()
    {
        $idMaterial = $this->getParameter('idMaterial');
        $titulo = $this->getParameter('titulo');
        $descricao = $this->getParameter('descricao');
        $this->material->populate($idMaterial, $titulo, $descricao);
        $result = $this->material->save();
        echo $result;
    }

    public function delete() {
        $idMaterial = $this->getParameter('idMaterial');
        $this->material->setIdMaterial($idMaterial);
    
        $result = $this->material->delete();
        echo $result;
    }
    


    public function file()
    {
    }
}

new CtrlMaterial();
?>
