
<?php

use models\Profissional;
use core\utils\ControllerHandler;

class CtrlProfissional extends ControllerHandler
{

    public function __construct(){
        parent::__construct();
    }

    public function get()
    {
        try {
            $idProfissional = $this->getParameter('idProfissional') ?? 0;

            if ($idProfissional == 0) {
                // Se $idProfissional for 0, significa que é uma requisição para listar todos os materiais
                $profissional = new Profissional();
                $resultSet = $profissional->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else {
                // Se $idProfissional for diferente de 0, é uma requisição para obter um Profissional específico
                $profissional = new Profissional();
                $profissional->populate("","","", "", "", "", "", "", "", "", "");  // Não forneça valores para $titulo e $descricao
                $resultSet = $profissional->listByFieldKey($idProfissional);
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
        $profissional = new Profissional();        
        $idProfissional = $data['idProfissional'];
        $idUsuario = $data['idUsuario'];
        $nome = $data['nome'];
        $cargo = $data['cargo'];
        $hrTrabalho = $data['hrTrabalho'];
        $cpf = $data['cpf'];
        $cep = $data['cep'];
        $endereco = $data['endereco'];
        $complemento = $data['complemento'];
        $telefone = $data['telefone'];
        $email = $data['email'];
        $profissional->populate( $idProfissional, $idUsuario, $nome, $cargo, $hrTrabalho, $cpf, $cep, $endereco, $complemento, $telefone, $email);
        $result = $profissional->save();
        echo $result;
    }

    public function put() {
        $data = $this->getData();
        $idProfissional = $data['idProfissional'] ?? 0;
        
        if ($idProfissional > 0) {
        $profissional = new Profissional();        
        $idProfissional = $data['idProfissional'];
        $idUsuario = $data['idUsuario'];
        $nome = $data['nome'];
        $cargo = $data['cargo'];
        $hrTrabalho = $data['hrTrabalho'];
        $cpf = $data['cpf'];
        $cep = $data['cep'];
        $endereco = $data['endereco'];
        $complemento = $data['complemento'];
        $telefone = $data['telefone'];
        $email = $data['email'];
        $profissional->setIdProfissional($idProfissional);
        $profissional->populate( $idProfissional, $idUsuario, $nome, $cargo, $hrTrabalho, $cpf, $cep, $endereco, $complemento, $telefone, $email);
        $result = $profissional->save();
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
        $idProfissional = $data['idProfissional'] ?? 0;
    
        if ($idProfissional > 0) {
            $profissional = new Profissional(); 
    
            // Chama o método delete() na classe Profissional
            $result = $profissional->delete();
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

new CtrlProfissional();
?>