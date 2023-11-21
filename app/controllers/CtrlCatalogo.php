<?php
// Tá indo! (retorna dado e insere)

use models\Catalogo;
use core\utils\ControllerHandler;

class CtrlCatalogo extends ControllerHandler
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        try {
            $idCatalogo = $this->getParameter('idCatalogo') ?? 0;
            if ($idCatalogo === "") {
                $catalogo = new Catalogo();
                $resultSet = $catalogo->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else {
                $catalogo = new Catalogo();
                $catalogo->populate("", "", "");
                $resultSet = $catalogo->listByFieldKey($idCatalogo);
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

        $catalogo = new Catalogo();
        $idCatalogo = $data['idCatalogo'];
        $descricao = $data['descricao'];
        $nome = $data['nome'];

        $catalogo->populate($idCatalogo, $descricao, $nome);
        $result = $catalogo->save();
        echo $result;
    }

    public function put()
    {
        $data = $this->getData();
        $idCatalogo = $data['idCatalogo'] ?? 0;
        if ($idCatalogo > 0) {
            $catalogo = new Catalogo();
            $idCatalogo = $data['idCatalogo'];
            $descricao = $data['descricao'];
            $nome = $data['nome'];

            $catalogo->populate($idCatalogo, $descricao, $nome);
            $result = $catalogo->save();
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
        $idCatalogo = $data['idCatalogo'] ?? 0;

        if ($idCatalogo > 0) {
            $catalogo = new Catalogo();

            // Chama o método delete() na classe Catalogo
            $result = $catalogo->delete();
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

new CtrlCatalogo();
