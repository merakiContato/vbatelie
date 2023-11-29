
<?php

use models\Cliente;
use core\utils\ControllerHandler;

class CtrlCliente extends ControllerHandler
{

    private $cliente = null;

    public function __construct()
    {
        $this->cliente = new Cliente();
        parent::__construct();
    }

    public function get()
    {
        echo json_encode($this->cliente->listAll());
    }

    public function post()
    {

        $idCliente = $this->getParameter('idCliente') ?? 0;
        $idCliente = (($idCliente == '') ? 0 : $idCliente);
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->cliente->populate($idCliente, $cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->cliente->save();
        echo $result;
    }

    public function put()
    {
        $idCliente = $this->getParameter('idCliente');
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->cliente->populate($idCliente, $cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->cliente->save();
        echo $result;
    }

    public function delete()
    {
        $cpf = $this->getParameter('cpf');
        $this->cliente->setCpf($cpf);

        $result = $this->cliente->delete();
        echo $result;
    }

    public function file()
    {
    }
}

new CtrlCliente();
?>