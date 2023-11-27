
<?php

use models\Pedidomaterial;
use core\utils\ControllerHandler;

<<<<<<< HEAD
class CtrlPedidomaterial extends ControllerHandler
{

    private $pedidomaterial = null;

    public function __construct()
    {
=======
class CtrlPedidomaterial extends ControllerHandler {

    private $pedidomaterial = null;

    public function __construct(){
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $this->pedidomaterial = new Pedidomaterial();
        parent::__construct();
    }

<<<<<<< HEAD
    public function get()
    {
        echo json_encode($this->pedidomaterial->listAll());
    }

    public function post()
    {
        var_dump($_POST);
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial') ?? 0;
        $idPedidoMaterial = (($idPedidoMaterial == '') ? 0 : $idPedidoMaterial);
=======
    public function get() {
        echo json_encode($this->pedidomaterial->listAll());
    }

    public function post() {        
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial')??0;
        $idPedidoMaterial = (( $idPedidoMaterial == '') ? 0 : $idPedidoMaterial);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $idPedido = $this->getParameter('idPedido');
        $idMaterial = $this->getParameter('idMaterial');
        $dtCompra = $this->getParameter('dtCompra');
        $qtd = $this->getParameter('qtd');
        $unidadeMedida = $this->getParameter('unidadeMedida');
        $preco = $this->getParameter('preco');
<<<<<<< HEAD
        $this->pedidomaterial->populate($idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco);
=======
        $this->pedidomaterial->populate( $idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->pedidomaterial->save();
        echo $result;
    }

<<<<<<< HEAD
    public function put()
    {
=======
    public function put() {        
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial');
        $idPedido = $this->getParameter('idPedido');
        $idMaterial = $this->getParameter('idMaterial');
        $dtCompra = $this->getParameter('dtCompra');
        $qtd = $this->getParameter('qtd');
        $unidadeMedida = $this->getParameter('unidadeMedida');
        $preco = $this->getParameter('preco');
<<<<<<< HEAD
        $this->pedidomaterial->populate($idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco);
=======
        $this->pedidomaterial->populate( $idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->pedidomaterial->save();
        echo $result;
    }

<<<<<<< HEAD
    public function delete()
    {
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial');
        $this->pedidomaterial->setIdPedidoMaterial($idPedidoMaterial);

=======
    public function delete() {        
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial');
        $idPedido = $this->getParameter('idPedido');
        $idMaterial = $this->getParameter('idMaterial');
        $dtCompra = $this->getParameter('dtCompra');
        $qtd = $this->getParameter('qtd');
        $unidadeMedida = $this->getParameter('unidadeMedida');
        $preco = $this->getParameter('preco');
        $this->pedidomaterial->populate( $idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->pedidomaterial->delete();
        echo $result;
    }

<<<<<<< HEAD
    public function file()
    {
=======
    public function file(){

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
    }
}

new CtrlPedidomaterial();
?>