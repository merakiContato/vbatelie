
<?php

use models\Servcontratado;
use core\utils\ControllerHandler;

class CtrlServcontratado extends ControllerHandler
{

    public function __construct(){
        parent::__construct();
    }

    public function get()
    {
        try {
            $idServcontratado = $this->getParameter('idServcontratado') ?? 0;

            if ($idServcontratado == 0) {
                // Se $idServcontratado for 0, significa que é uma requisição para listar todos os materiais
                $servcontratado = new Servcontratado();
                $resultSet = $servcontratado->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else {
                // Se $idServcontratado for diferente de 0, é uma requisição para obter um Servcontratado específico
                $servcontratado = new Servcontratado();
                $servcontratado->populate("","","", "", "", "", "", "", "", "", "", "");  // Não forneça valores para $titulo e $descricao
                $resultSet = $servcontratado->listByFieldKey($idServcontratado);
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            }
        } catch (\Exception $error) {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID não fornecido.'
            ]);
        }
    }

    public function post() {
        $data = $this->getData();
        $servcontratado = new Servcontratado();        
        $idServContratado = $data['idServContratado'];
        $cpf = $data['cpf'];
        $nome = $data['nome'];
        $telefone = $data['telefone'];
        $cep = $data['cep'];
        $endereco = $data['endereco'];
        $complemento = $data['complemento'];
        $email = $data['email'];
        $idPedido = $data['idPedido'];
        $idServico = $data['idServico'];
        $pagServ = $data['pagServ'];
        $dtPagServ = $data['dtPagServ'];
        $servcontratado->populate( $idServContratado, $cpf, $nome, $telefone, $cep, $endereco, $complemento, $email, $idPedido, $idServico, $pagServ, $dtPagServ);
        $result = $servcontratado->save();
        echo $result;
    }

    public function put() {
        $data = $this->getData();
        $idServcontratado = $data['idServcontratado'] ?? 0;
        
        if ($idServcontratado > 0) {
        $servcontratado = new Servcontratado();        
        $idServContratado = $data['idServContratado'];
        $cpf = $data['cpf'];
        $nome = $data['nome'];
        $telefone = $data['telefone'];
        $cep = $data['cep'];
        $endereco = $data['endereco'];
        $complemento = $data['complemento'];
        $email = $data['email'];
        $idPedido = $data['idPedido'];
        $idServico = $data['idServico'];
        $pagServ = $data['pagServ'];
        $dtPagServ = $data['dtPagServ'];
        $servcontratado->setIdServcontratado($idServcontratado);
        $servcontratado->populate( $idServContratado, $cpf, $nome, $telefone, $cep, $endereco, $complemento, $email, $idPedido, $idServico, $pagServ, $dtPagServ);
        $result = $servcontratado->save();
        echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }

    public function delete() {
        $data = $this->getData();
        $idServcontratado = $data['idServcontratado'] ?? 0;
    
        if ($idServcontratado > 0) {
            $servcontratado = new Servcontratado(); 
    
            // Chama o método delete() na classe Servcontratado
            $result = $servcontratado->delete();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }


    public function file(){

    }
}

new CtrlServcontratado();
?>