<?php

use models\Cliente;
use core\utils\ControllerHandler;

class CtrlCliente extends ControllerHandler
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        try {
            $cpf = $this->getParameter('cpf') ?? 0;

            if ($cpf == 0) {
                $cliente = new Cliente();
                $resultSet = $cliente->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else {
                $cliente = new Cliente();
                $resultSet = $cliente->listByFieldKey($cpf);
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            }
        } catch (\Exception $error) {
            http_response_code(400);
            echo json_encode([
                'error' => 'CPF não fornecido.'
            ]);
        }
    }

    public function post()
    {
        $data = $this->getData();
        $cliente = new Cliente;
        $cpf = $data['cpf'];
        $nome = $data['nome'];
        $cep = $data['cep'];
        $endereco = $data['endereco'];
        $complemento = $data['complemento'];
        $telefone = $data['telefone'];
        $email = $data['email'];
        $cliente->populate($cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
        $result = $cliente->save();
        echo $result;
    }

    public function put()
    {
        $data = $this->getData();
        $cpf = $data['cpf'] ?? 0;

        if ($cpf != 0) {
            $cliente = new Cliente();
            $cpf = $data['cpf'];
            $nome = $data['nome'];
            $cep = $data['cep'];
            $endereco = $data['endereco'];
            $complemento = $data['complemento'];
            $telefone = $data['telefone'];
            $email = $data['email'];
            $cliente->populate($cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
            $result = $cliente->save();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'CPF inválido ou não fornecido.'
            ]);
        }
    }

    public function delete()
    {
        $data = $this->getData();
        $cpf = $data['cpf'] ?? 0;

        if ($cpf > 0) {
            $cliente = new Cliente();
            $result = $cliente->delete();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'CPF inválido ou não fornecido.'
            ]);
        }
    }

    public function file()
    {
    }
}

new CtrlCliente();
