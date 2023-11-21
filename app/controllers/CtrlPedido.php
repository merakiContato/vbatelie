<?php
// Não funciona!

use models\Pedido;
use core\utils\ControllerHandler;

class CtrlPedido extends ControllerHandler
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        try {
            $idPedido = $this->getParameter('idPedido') ?? 0;
            if ($idPedido == "") {
                $pedido = new Pedido();
                $resultSet = $pedido->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else {
                $pedido = new Pedido();
                $pedido->populate("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""); // Arrumei aqui!
                $resultSet = $pedido->listByFieldKey($idPedido);
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            }
        } catch (\Exception $error) {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID do Pedido não fornecido.'
            ]);
        }
    }

    public function post()
    {
        $data = $this->getData();

        var_dump($data);

        $pedido = new Pedido();
        $idPedido = $data['idPedido'];
        $cpf = $data['cpf'];
        $idProfissional = $data['idProfissional'];
        $valorOrcamento = $data['valorOrcamento'];
        $idServico = $data['idServico'];
        $valorEntrada = $data['valorEntrada'];
        $valorFinal = $data['valorFinal'];
        $medidasPedido = $data['medidasPedido'];
        $dtPrevIni = $data['dtPrevIni'];
        $dtPagEntrada = $data['dtPagEntrada'];
        $dtIni = $data['dtIni'];
        $dtPrevFim = $data['dtPrevFim'];
        $dtFim = $data['dtFim'];
        $valorTotalFim = $data['valorTotalFim'];
        $dtPagFim = $data['dtPagFim'];
        $tipoPag = $data['tipoPag'];
        $sitPag = $data['sitPag'];
        $dtExpedicao = $data['dtExpedicao'];
        $dtEntrega = $data['dtEntrada'];
        $dtCancelamento = $data['dtCancelamento'];
        $observacao = $data['observacao'];

        $pedido->populate(
            $idPedido,
            $cpf,
            $idProfissional,
            $idServico,
            $valorOrcamento,
            $valorEntrada,
            $valorFinal,
            $medidasPedido,
            $dtPrevIni,
            $dtPagEntrada,
            $dtIni,
            $dtPrevFim,
            $dtFim,
            $valorTotalFim,
            $dtPagFim,
            $tipoPag,
            $sitPag,
            $dtExpedicao,
            $dtEntrega,
            $dtCancelamento,
            $observacao
        );

        $result = $pedido->save();
        echo $result;
    }

    public function put()
    {
        $data = $this->getData();
        $idPedido = $data['idPedido'] ?? 0;

        if ($idPedido > 0) {
            $pedido = new Pedido();
            $cpf = $data['cpf'];
            $idProfissional = $data['idProfissional'];
            $valorOrcamento = $data['valorOrcamento'];
            $idServico = $data['idServico'];
            $valorEntrada = $data['valorEntrada'];
            $valorFinal = $data['valorFinal'];
            $medidasPedido = $data['medidasPedido'];
            $dtPrevIni = $data['dtPrevIni'];
            $dtPagEntrada = $data['dtPagEntrada'];
            $dtIni = $data['dtIni'];
            $dtPrevFim = $data['dtPrevFim'];
            $dtFim = $data['dtFim'];
            $valorTotalFim = $data['valorTotalFim'];
            $dtPagFim = $data['dtPagFim'];
            $tipoPag = $data['tipoPag'];
            $sitPag = $data['sitPag'];
            $dtExpedicao = $data['dtExpedicao'];
            $dtEntrega = $data['dtEntrada'];
            $dtCancelamento = $data['dtCancelamento'];
            $observacao = $data['observacao'];

            $pedido->populate(
                $idPedido,
                $cpf,
                $idProfissional,
                $idServico,
                $valorOrcamento,
                $valorEntrada,
                $valorFinal,
                $medidasPedido,
                $dtPrevIni,
                $dtPagEntrada,
                $dtIni,
                $dtPrevFim,
                $dtFim,
                $valorTotalFim,
                $dtPagFim,
                $tipoPag,
                $sitPag,
                $dtExpedicao,
                $dtEntrega,
                $dtCancelamento,
                $observacao
            );

            $result = $pedido->save();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID do Pedido inválido ou não fornecido.'
            ]);
        }
    }

    public function delete()
    {
        $data = $this->getData();
        $idPedido = $data['idPedido'] ?? 0;

        if ($idPedido > 0) {
            $pedido = new Pedido();
            $result = $pedido->delete();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }

    public function file()
    {
    }
}

new CtrlPedido();
