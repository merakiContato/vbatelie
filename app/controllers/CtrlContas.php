
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
        var_dump($_POST);
        $idContas = $this->getParameter('idContas') ?? 0;
        $idContas = (($idContas == '') ? 0 : $idContas);
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

    // SWITCH!
    public function put()
    {
        $data = $this->getData();
        $this->contas = new Contas();

        if (isset($data['action'])) {
            $action = $data['action'];

            switch ($action) {
                case 'relatorio':
                    $ano = $this->getParameter('ano');
                    $mes = $this->getParameter('mes');

                    $this->contas->setAno($ano);
                    $this->contas->setMes($mes);

                    $result = $this->contas->relatorioPeriodo($mes, $ano);

                    echo json_encode($result);
                    break;

                case 'insert':
                    // Obtenha os parâmetros necessários
                    $idContas = $this->getParameter('idContas');
                    $mes = $this->getParameter('mes');
                    $ano = $this->getParameter('ano');
                    $idPedidoMaterial = $this->getParameter('idPedidoMaterial');
                    $idServContratado = $this->getParameter('idServContratado');
                    $tipo = $this->getParameter('tipo');
                    $preco = $this->getParameter('preco');
                    $dtPag = $this->getParameter('dtPag');
                    $sitPag = $this->getParameter('sitPag');

                    // Chame o método save com os parâmetros
                    $result = $this->contas->save($idContas, $mes, $ano, $idPedidoMaterial, $idServContratado, $tipo, $preco, $dtPag, $sitPag);

                    // Retorne um JSON
                    echo json_encode(['result' => $result]);
                    break;

                default:
                    http_response_code(400);
                    echo json_encode([
                        'error' => 'Ação não reconhecida.'
                    ]);
                    break;
            }
        }
    }


    public function delete()
    {
        $idContas = $this->getParameter('idContas');
        $this->contas->setIdContas($idContas);

        $result = $this->contas->delete();
        echo $result;
    }

    public function file()
    {
    }
}

new CtrlContas();
?>