<?php
// Não tá adicionando MAS deve ser burrice minha!

use models\Servico;
use core\utils\ControllerHandler;

class CtrlServico extends ControllerHandler
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        try {
            $idServico = $this->getParameter('idServico') ?? 0;
            if ($idServico == "") {
                $servico = new Servico();
                $resultSet = $servico->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else {
                $servico = new Servico();
                $servico->populate("", "", "", "", "");
                $resultSet = $servico->listByFieldKey($idServico);
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            }
        } catch (\Exception $error) {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID não fornecido.'
            ]);
        }
    }

    public function post()
    {
        $data = $this->getData();

        $servico = new Servico();
        $nome = $data['nome'];
        $idCatalogo = $data['idCatalogo'];
        $descricao = $data['descricao'];
        $preco = $data['preco'];
        $servico->populate("", $nome, $idCatalogo, $descricao, $preco);
        $result = $servico->save();
        echo $result;
    }

    public function put()
    {
        $data = $this->getData();
        $idServico = $data['idServico'] ?? 0;
        if ($idServico > 0) {
            $servico = new Servico();
            $nome = $data['nome'];
            $idCatalogo = $data['idCatalogo'];
            $descricao = $data['descricao'];
            $preco = $data['preco'];
            $servico->populate($idServico, $nome, $idCatalogo, $descricao, $preco);
            $result = $servico->save();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }

    public function delete()
    {
        $data = $this->getData();
        $idServico = $data['idServico'] ?? 0;
        if ($idServico > 0) {
            $servico = new Servico();
            $servico->populate($idServico, "", "", "", "");
            $result = $servico->delete();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }

    function rSetArrayToJson(array $rSet)
    {
        $out = "";
        foreach ($rSet as $line) {
            $out .= "\n\t{";
            foreach ($line as $key => $value) {
                $out .= "\n\t\t\t'" .
                    ($key)
                    . "':'" .
                    ($value)
                    . "',";
            }
            $out = substr($out, 0, strlen($out) - 1);
            $out .=  "\n\t}";
        }
        header("Content-Type: text/html; charset=utf-8");
        return   "[" . $out . "\n]";
    }

    public function file()
    {
    }
}

new CtrlServico();
