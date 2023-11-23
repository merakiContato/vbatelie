
<?php

use models\Contas;
use core\utils\ControllerHandler;

class CtrlContas extends ControllerHandler
{

    private $contas = null;

    public function __construct()
    {
        $this->contas = new Contas();
        parent::__construct();
    }

    public function get()
    {
        echo json_encode($this->contas->listAll());
    }

    public function post()
    {
        $idContas = $this->getParameter('idContas');
        $mes = $this->getParameter('mes');
        $ano = $this->getParameter('ano');
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial');
        $idServContratado = $this->getParameter('idServContratado');
        $tipo = $this->getParameter('tipo');
        $preco = $this->getParameter('preco');
        $dtPag = $this->getParameter('dtPag');
        $sitPag = $this->getParameter('sitPag');
        $this->contas->populate($idContas, $mes, $ano, $idPedidoMaterial, $idServContratado, $tipo, $preco, $dtPag, $sitPag);
        $result = $this->contas->save();
        echo $result;
    }

    public function put()
    {
        error_log("Método PUT chamado.");
        $ano = $this->getParameter('ano');
        $mes = $this->getParameter('mes');

        $this->contas->setAno($ano);
        $this->contas->setMes($mes);

        $result = $this->contas->relatorioPeriodo($mes, $ano);

        echo json_encode($result);
    }


    public function delete()
    {
        $idContas = $this->getParameter('idContas');
        $mes = $this->getParameter('mes');
        $ano = $this->getParameter('ano');
        $idPedidoMaterial = $this->getParameter('idPedidoMaterial');
        $idServContratado = $this->getParameter('idServContratado');
        $tipo = $this->getParameter('tipo');
        $preco = $this->getParameter('preco');
        $dtPag = $this->getParameter('dtPag');
        $sitPag = $this->getParameter('sitPag');
        $this->contas->populate($idContas, $mes, $ano, $idPedidoMaterial, $idServContratado, $tipo, $preco, $dtPag, $sitPag);
        $result = $this->contas->delete();
        echo $result;
    }

    public function file()
    {
    }
}

new CtrlContas();
?>