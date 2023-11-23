
<?php

use models\Pedido;
use core\utils\ControllerHandler;

class CtrlPedido extends ControllerHandler {

    private $estadosCivis = null;

    public function __construct(){
        $this->pedido = new Pedido();
        parent::__construct();
    }

    public function get() {
        print_r($this->pedido->listAll());
    }

    public function post() {        
        $idPedido = $this->getParameter('idPedido');
        $cpf = $this->getParameter('cpf');
        $idProfissional = $this->getParameter('idProfissional');
        $idServico = $this->getParameter('idServico');
        $valorOrcamento = $this->getParameter('valorOrcamento');
        $valorEntrada = $this->getParameter('valorEntrada');
        $valorFinal = $this->getParameter('valorFinal');
        $medidasPedido = $this->getParameter('medidasPedido');
        $dtPrevIni = $this->getParameter('dtPrevIni');
        $dtPagEntrada = $this->getParameter('dtPagEntrada');
        $dtIni = $this->getParameter('dtIni');
        $dtPrevFim = $this->getParameter('dtPrevFim');
        $dtFim = $this->getParameter('dtFim');
        $valorTotalFim = $this->getParameter('valorTotalFim');
        $dtPagFim = $this->getParameter('dtPagFim');
        $tipoPag = $this->getParameter('tipoPag');
        $sitPag = $this->getParameter('sitPag');
        $dtExpedicao = $this->getParameter('dtExpedicao');
        $dtEntrega = $this->getParameter('dtEntrega');
        $dtCancelamento = $this->getParameter('dtCancelamento');
        $observacao = $this->getParameter('observacao');
        $this->pedido->populate( $idPedido, $cpf, $idProfissional, $idServico, $valorOrcamento, $valorEntrada, $valorFinal, $medidasPedido, $dtPrevIni, $dtPagEntrada, $dtIni, $dtPrevFim, $dtFim, $valorTotalFim, $dtPagFim, $tipoPag, $sitPag, $dtExpedicao, $dtEntrega, $dtCancelamento, $observacao);
        $result = $this->pedido->save();
        echo $result;
    }

    public function put() {        
        $idPedido = $this->getParameter('idPedido');
        $cpf = $this->getParameter('cpf');
        $idProfissional = $this->getParameter('idProfissional');
        $idServico = $this->getParameter('idServico');
        $valorOrcamento = $this->getParameter('valorOrcamento');
        $valorEntrada = $this->getParameter('valorEntrada');
        $valorFinal = $this->getParameter('valorFinal');
        $medidasPedido = $this->getParameter('medidasPedido');
        $dtPrevIni = $this->getParameter('dtPrevIni');
        $dtPagEntrada = $this->getParameter('dtPagEntrada');
        $dtIni = $this->getParameter('dtIni');
        $dtPrevFim = $this->getParameter('dtPrevFim');
        $dtFim = $this->getParameter('dtFim');
        $valorTotalFim = $this->getParameter('valorTotalFim');
        $dtPagFim = $this->getParameter('dtPagFim');
        $tipoPag = $this->getParameter('tipoPag');
        $sitPag = $this->getParameter('sitPag');
        $dtExpedicao = $this->getParameter('dtExpedicao');
        $dtEntrega = $this->getParameter('dtEntrega');
        $dtCancelamento = $this->getParameter('dtCancelamento');
        $observacao = $this->getParameter('observacao');
        $this->pedido->populate( $idPedido, $cpf, $idProfissional, $idServico, $valorOrcamento, $valorEntrada, $valorFinal, $medidasPedido, $dtPrevIni, $dtPagEntrada, $dtIni, $dtPrevFim, $dtFim, $valorTotalFim, $dtPagFim, $tipoPag, $sitPag, $dtExpedicao, $dtEntrega, $dtCancelamento, $observacao);
        $result = $this->pedido->save();
        echo $result;
    }

    public function delete() {        
        $idPedido = $this->getParameter('idPedido');
        $cpf = $this->getParameter('cpf');
        $idProfissional = $this->getParameter('idProfissional');
        $idServico = $this->getParameter('idServico');
        $valorOrcamento = $this->getParameter('valorOrcamento');
        $valorEntrada = $this->getParameter('valorEntrada');
        $valorFinal = $this->getParameter('valorFinal');
        $medidasPedido = $this->getParameter('medidasPedido');
        $dtPrevIni = $this->getParameter('dtPrevIni');
        $dtPagEntrada = $this->getParameter('dtPagEntrada');
        $dtIni = $this->getParameter('dtIni');
        $dtPrevFim = $this->getParameter('dtPrevFim');
        $dtFim = $this->getParameter('dtFim');
        $valorTotalFim = $this->getParameter('valorTotalFim');
        $dtPagFim = $this->getParameter('dtPagFim');
        $tipoPag = $this->getParameter('tipoPag');
        $sitPag = $this->getParameter('sitPag');
        $dtExpedicao = $this->getParameter('dtExpedicao');
        $dtEntrega = $this->getParameter('dtEntrega');
        $dtCancelamento = $this->getParameter('dtCancelamento');
        $observacao = $this->getParameter('observacao');
        $this->pedido->populate( $idPedido, $cpf, $idProfissional, $idServico, $valorOrcamento, $valorEntrada, $valorFinal, $medidasPedido, $dtPrevIni, $dtPagEntrada, $dtIni, $dtPrevFim, $dtFim, $valorTotalFim, $dtPagFim, $tipoPag, $sitPag, $dtExpedicao, $dtEntrega, $dtCancelamento, $observacao);
        $result = $this->pedido->delete();
        echo $result;
    }

    public function file(){

    }
}

new CtrlPedido();
?>