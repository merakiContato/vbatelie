
<?php

use models\Pedido;
use core\utils\ControllerHandler;

<<<<<<< HEAD
class CtrlPedido extends ControllerHandler
{

    private $pedido = null;

    public function __construct()
    {
=======
class CtrlPedido extends ControllerHandler {

    private $estadosCivis = null;

    public function __construct(){
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $this->pedido = new Pedido();
        parent::__construct();
    }

<<<<<<< HEAD
    public function get()
    {
        echo json_encode($this->pedido->listAll());
    }

    public function post()
    {
        var_dump($_POST);
        $idPedido = $this->getParameter('idPedido') ?? 0;
        $idPedido = (($idPedido == '') ? 0 : $idPedido);
=======
    public function get() {
        print_r($this->pedido->listAll());
    }

    public function post() {        
        $idPedido = $this->getParameter('idPedido');
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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
<<<<<<< HEAD
        $this->pedido->populate($idPedido, $cpf, $idProfissional, $idServico, $valorOrcamento, $valorEntrada, $valorFinal, $medidasPedido, $dtPrevIni, $dtPagEntrada, $dtIni, $dtPrevFim, $dtFim, $valorTotalFim, $dtPagFim, $tipoPag, $sitPag, $dtExpedicao, $dtEntrega, $dtCancelamento, $observacao);
=======
        $this->pedido->populate( $idPedido, $cpf, $idProfissional, $idServico, $valorOrcamento, $valorEntrada, $valorFinal, $medidasPedido, $dtPrevIni, $dtPagEntrada, $dtIni, $dtPrevFim, $dtFim, $valorTotalFim, $dtPagFim, $tipoPag, $sitPag, $dtExpedicao, $dtEntrega, $dtCancelamento, $observacao);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->pedido->save();
        echo $result;
    }

<<<<<<< HEAD
    public function put()
    {
=======
    public function put() {        
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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
<<<<<<< HEAD
        $this->pedido->populate($idPedido, $cpf, $idProfissional, $idServico, $valorOrcamento, $valorEntrada, $valorFinal, $medidasPedido, $dtPrevIni, $dtPagEntrada, $dtIni, $dtPrevFim, $dtFim, $valorTotalFim, $dtPagFim, $tipoPag, $sitPag, $dtExpedicao, $dtEntrega, $dtCancelamento, $observacao);
=======
        $this->pedido->populate( $idPedido, $cpf, $idProfissional, $idServico, $valorOrcamento, $valorEntrada, $valorFinal, $medidasPedido, $dtPrevIni, $dtPagEntrada, $dtIni, $dtPrevFim, $dtFim, $valorTotalFim, $dtPagFim, $tipoPag, $sitPag, $dtExpedicao, $dtEntrega, $dtCancelamento, $observacao);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->pedido->save();
        echo $result;
    }

<<<<<<< HEAD
    public function delete()
    {
        $idPedido = $this->getParameter('idPedido');
        $this->pedido->setIdPedido($idPedido);

=======
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
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->pedido->delete();
        echo $result;
    }

<<<<<<< HEAD
    public function file()
    {
=======
    public function file(){

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
    }
}

new CtrlPedido();
?>