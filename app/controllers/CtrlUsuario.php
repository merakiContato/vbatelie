
<?php

use models\Usuario;
use core\utils\ControllerHandler;

class CtrlUsuario extends ControllerHandler
{

    private $usuario = null;

    public function __construct()
    {
        $this->usuario = new Usuario();
        parent::__construct();
    }

    public function get()
    {
        echo json_encode($this->usuario->listAll());
    }

    public function post()
    {
        $data = $this->getData();
        $usuario = new Usuario();  


        if (isset($data['action'])) {
            // Verifica a ação desejada
            $action = $data['action'];

            switch ($action) {
                case 'login':
                    $email = $data['email'];
                    $senha = $data['senha'];

                    // Lógica para autenticar o usuário
                    if (Usuario::authenticateUser($email, $senha)) {
                        // Usuário autenticado com sucesso
                        echo json_encode(['success' => true]);
                    } else {
                        // Falha na autenticação
                        http_response_code(400);
                        echo json_encode([
                            'error' => 'Email ou senha inválidos.'
                        ]);
                    }
                    break;

                case 'insert':
                    $idUsuario = $this->getParameter('idUsuario') ?? 0;
                    $idUsuario = (($idUsuario == '') ? 0 : $idUsuario);
                    $senha = $this->getParameter('senha');
                    $nivAcesso = $this->getParameter('nivAcesso');
                    $nome = $this->getParameter('nome');
                    $email = $this->getParameter('email');
                    $usuario->populate($idUsuario, $senha, $nivAcesso, $nome, $email);  // Corrigido para $usuario
                    $result = $usuario->save();  // Corrigido para $usuario
                    echo $result;
                    break;

                default:
                    // Ação não reconhecida
                    http_response_code(400);
                    echo json_encode([
                        'error' => 'Ação não reconhecida.'
                    ]);
                    break;
            }
        } else {
        }
    }


    public function put()
    {
        $idUsuario = $this->getParameter('idUsuario');
        $senha = $this->getParameter('senha');
        $nivAcesso = $this->getParameter('nivAcesso');
        $nome = $this->getParameter('nome');
        $email = $this->getParameter('email');
        $this->usuario->populate($idUsuario, $senha, $nivAcesso, $nome, $email);
        $result = $this->usuario->save();
        echo $result;
    }

<<<<<<< HEAD
    public function delete() {
        $idUsuario = $this->getParameter('idUsuario');
        $this->usuario->setIdUsuario($idUsuario);
    
=======
    public function delete()
    {
        $idUsuario = $this->getParameter('idUsuario');
        $senha = $this->getParameter('senha');
        $nivAcesso = $this->getParameter('nivAcesso');
        $nome = $this->getParameter('nome');
        $email = $this->getParameter('email');
        $this->usuario->populate($idUsuario, $senha, $nivAcesso, $nome, $email);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        $result = $this->usuario->delete();
        echo $result;
    }

    public function file()
    {
    }
}

new CtrlUsuario();
?>