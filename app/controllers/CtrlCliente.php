
<?php

use models\Cliente;
use core\utils\ControllerHandler;

class CtrlCliente extends ControllerHandler {

    private $cliente = null;

    public function __construct(){
        $this->cliente = new Cliente();
        parent::__construct();
    }

    public function get() {
<<<<<<< HEAD
        echo json_encode($this->cliente->listAll());
    }

    public function post() {
        try {
            $cpf = $this->getParameter('cpf');
            $nome = $this->getParameter('nome');
            $cep = $this->getParameter('cep');
            $endereco = $this->getParameter('endereco');
            $complemento = $this->getParameter('complemento');
            $telefone = $this->getParameter('telefone');
            $email = $this->getParameter('email');
            
            $this->cliente->populate($cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->cliente->save();
        
        if ($result) {
            echo 'Cliente adicionado com sucesso!';
        } else {
            echo 'Falha ao adsicionar cliente. Detalhes no log do servidor.';
        }
    } catch (\Exception $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
    
=======
        print_r($this->cliente->listAll());
    }

    public function post() {        
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->cliente->populate( $cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->cliente->save();
        echo $result;
    }

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
    public function put() {        
        $cpf = $this->getParameter('cpf');
        $nome = $this->getParameter('nome');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->cliente->populate( $cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
        $result = $this->cliente->save();
        echo $result;
    }

    public function delete() {        
        $cpf = $this->getParameter('cpf');
<<<<<<< HEAD
        $this->cliente->setCpf($cpf);
    
=======
        $nome = $this->getParameter('nome');
        $cep = $this->getParameter('cep');
        $endereco = $this->getParameter('endereco');
        $complemento = $this->getParameter('complemento');
        $telefone = $this->getParameter('telefone');
        $email = $this->getParameter('email');
        $this->cliente->populate( $cpf, $nome, $cep, $endereco, $complemento, $telefone, $email);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->cliente->delete();
        echo $result;
    }

    public function file(){

    }
}

new CtrlCliente();
?>