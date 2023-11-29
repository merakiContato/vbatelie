
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
                    $idUsuario = Usuario::authenticateUser($email, $senha);

                    if ($idUsuario !== false) {
                        // Usuário autenticado com sucesso
                        echo json_encode(['idUsuario' => $idUsuario]);
                    } else {
                        // Falha na autenticação
                        http_response_code(400);
                        echo json_encode([
                            'error' => 'Email ou senha inválidos.'
                        ]);

                        // Adicione mensagens de log para debug
                        error_log('Falha na autenticação para o email: ' . $email);
                    }
                    break;

                case 'insert':
                    $idUsuario = $this->getParameter('idUsuario') ?? 0;
                    $idUsuario = (($idUsuario == '') ? 0 : $idUsuario);
                    $senha = $this->getParameter('senha');
                    $nivAcesso = $this->getParameter('nivAcesso');
                    $nome = $this->getParameter('nome');
                    $email = $this->getParameter('email');
                    $usuario->populate($idUsuario, $senha, $nivAcesso, $nome, $email);
                    $result = $usuario->save();
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

    public function delete()
    {
        $idUsuario = $this->getParameter('idUsuario');
        $this->usuario->setIdUsuario($idUsuario);

        $result = $this->usuario->delete();
        echo $result;
    }

    public function file()
    {
    }
}

new CtrlUsuario();
?>