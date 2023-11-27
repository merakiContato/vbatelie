
<?php

use models\Servico;
use core\utils\ControllerHandler;

class CtrlServico extends ControllerHandler {

    private $servico = null;

    public function __construct(){
        $this->servico = new Servico();
        parent::__construct();
    }

    public function get() {
        echo json_encode($this->servico->listAll());
    }

<<<<<<< HEAD
    public function post() {   
        var_dump($_POST);     
=======
    public function post() {        
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $idServico = $this->getParameter('idServico')??0;
        $idServico = (( $idServico == '') ? 0 : $idServico);
        $nome = $this->getParameter('nome');
        $idCatalogo = $this->getParameter('idCatalogo');
        $descricao = $this->getParameter('descricao');
        $preco = $this->getParameter('preco');
        $this->servico->populate( $idServico, $nome, $idCatalogo, $descricao, $preco);
        $result = $this->servico->save();
        echo $result;
    }

    public function put() {        
        $idServico = $this->getParameter('idServico');
        $nome = $this->getParameter('nome');
        $idCatalogo = $this->getParameter('idCatalogo');
        $descricao = $this->getParameter('descricao');
        $preco = $this->getParameter('preco');
        $this->servico->populate( $idServico, $nome, $idCatalogo, $descricao, $preco);
        $result = $this->servico->save();
        echo $result;
    }

<<<<<<< HEAD
    public function delete() {
        $idServico = $this->getParameter('idServico');
        $this->servico->setIdServico($idServico);
    
=======
    public function delete() {        
        $idServico = $this->getParameter('idServico');
        $nome = $this->getParameter('nome');
        $idCatalogo = $this->getParameter('idCatalogo');
        $descricao = $this->getParameter('descricao');
        $preco = $this->getParameter('preco');
        $this->servico->populate( $idServico, $nome, $idCatalogo, $descricao, $preco);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->servico->delete();
        echo $result;
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
?>