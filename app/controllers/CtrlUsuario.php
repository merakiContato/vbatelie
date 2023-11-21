<?php

use models\Usuario;
use core\utils\ControllerHandler;

class CtrlUsuario extends ControllerHandler
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        try {
            $idUsuario = $this->getParameter('idUsuario') ?? 0;

            if ($idUsuario == 0) {
                // Se $idUsuario for 0, significa que é uma requisição para listar todos os usuários
                $usuario = new Usuario();
                $resultSet = $usuario->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else {
                // Se $idUsuario for diferente de 0, é uma requisição para obter um usuário específico
                $usuario = new Usuario();
                $resultSet = $usuario->listByFieldKey($idUsuario);
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            }
        } catch (\Exception $error) {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID não fornecido.'
            ]);
        }
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
                    $senha = $data['senha'];
                    $nivAcesso = $data['nivAcesso'];
                    $nome = $data['nome'];
                    $email = $data['email'];

                    // Lógica para salvar o usuário
                    $usuario->populate(null, $senha, $nivAcesso, $nome, $email); // null para indicar novo usuário
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
            // Lógica para outras funcionalidades do método post
            // ...
        }
    }





    public function put()
    {
        $data = $this->getData();
        $idUsuario = $data['idUsuario'] ?? 0;

        if ($idUsuario > 0) {
            $usuario = new Usuario();
            $senha = $data['senha'];
            $nivAcesso = $data['nivAcesso'];
            $nome = $data['nome'];
            $email = $data['email'];

            $usuario->setIdUsuario($idUsuario);
            $usuario->populate($idUsuario, $senha, $nivAcesso, $nome, $email);
            $result = $usuario->save();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }

    public function delete()
    {
        $data = $this->getData();
        $idUsuario = $data['idUsuario'] ?? 0;

        if ($idUsuario > 0) {
            $usuario = new Usuario();

            // Chama o método delete() na classe Usuario
            $usuario->setIdUsuario($idUsuario);
            $result = $usuario->delete();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }

    public function file()
    {
    }
}

new CtrlUsuario();
