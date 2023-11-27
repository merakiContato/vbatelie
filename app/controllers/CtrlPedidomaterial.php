
<?php

use models\Pedidomaterial;
use core\utils\ControllerHandler;

class CtrlPedidomaterial extends ControllerHandler
{

    private $pedidomaterial = null;

    public function __construct()
    {
        $this->pedidomaterial = new Pedidomaterial();
        parent::__construct();
    }

    public function get()
    {
        echo json_encode($this->pedidomaterial->listAll());
    }

    public function post()
    {
        var_dump($_POST);
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial') ?? 0;
        $idPedidoMaterial = (($idPedidoMaterial == '') ? 0 : $idPedidoMaterial);
        $idPedido = $this->getParameter('idPedido');
        $idMaterial = $this->getParameter('idMaterial');
        $dtCompra = $this->getParameter('dtCompra');
        $qtd = $this->getParameter('qtd');
        $unidadeMedida = $this->getParameter('unidadeMedida');
        $preco = $this->getParameter('preco');
        $this->pedidomaterial->populate($idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco);
        $result = $this->pedidomaterial->save();
        echo $result;
    }

    public function put()
    {
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial');
        $idPedido = $this->getParameter('idPedido');
        $idMaterial = $this->getParameter('idMaterial');
        $dtCompra = $this->getParameter('dtCompra');
        $qtd = $this->getParameter('qtd');
        $unidadeMedida = $this->getParameter('unidadeMedida');
        $preco = $this->getParameter('preco');
        $this->pedidomaterial->populate($idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco);
        $result = $this->pedidomaterial->save();
        echo $result;
    }

    public function delete()
    {
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial');
        $this->pedidomaterial->setIdPedidoMaterial($idPedidoMaterial);

        $result = $this->pedidomaterial->delete();
        echo $result;
    }

    public function file()
    {
    }
}

new CtrlPedidomaterial();
?>