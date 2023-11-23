
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

    public function post() {        
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

    public function delete() {        
        $idServico = $this->getParameter('idServico');
        $nome = $this->getParameter('nome');
        $idCatalogo = $this->getParameter('idCatalogo');
        $descricao = $this->getParameter('descricao');
        $preco = $this->getParameter('preco');
        $this->servico->populate( $idServico, $nome, $idCatalogo, $descricao, $preco);
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