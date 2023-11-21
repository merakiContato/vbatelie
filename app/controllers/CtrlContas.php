
<?php

// Esse arquivo manipula operações CRUD dessa tabela.

use models\Contas; // Chamando a classe.
use core\utils\ControllerHandler; // Chamando essa classe "ControllerHandler";

class CtrlContas extends ControllerHandler // Criando uma class para essa control. Essa classe extrai algumas coisas dessa outra classe chamada "ControllerHandler".
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get() // Método GET. Trata requisições GET. ListAll. Select * from contas.
    {
        try {
            $idContas = $this->getParameter('idContas') ?? 0;
            if ($idContas ==  "") { // Se não for fornecido nenhum parâmetro "idContas", ele vai listar todos os registros da tabela "contas" com esse "listAll".
                $contas = new Contas();
                $resultSet = $contas->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else { // Se ele achar esse "idContas" ele retorna as informações referentes a esse campo.
                $contas = new Contas();
                $contas->populate("", "", "", "", "", "", "", "", ""); // Arrumei aqui!
                $resultSet = $contas->listByFieldKey($idContas); // Arrumei aqui!
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
        $contas = new Contas();

        if (isset($data['action'])) {
            // Verifica a ação desejada
            $action = $data['action'];

            switch ($action) {
                case 'calcularSomaContas':
                    $mesSelecionado = $data['mes'] ?? '';

                    // Adicione a linha a seguir para definir o cabeçalho
                    header('Content-Type: application/json');

                    $resultado = $contas->calcularSomaContas($mesSelecionado);

                    // Adicione logs para depuração
                    error_log("Resultado: " . json_encode($resultado));

                    if (empty($resultado)) {
                        $response = ['error' => 'Nenhum dado disponível'];
                    } else {
                        $response = ['success' => true, 'soma' => $resultado];
                    }

                    // Antes de enviar a resposta
                    error_log("Resposta JSON do servidor: " . json_encode($response));

                    // Enviar a resposta
                    echo json_encode($response);

                    exit;
                    break;

                case 'insert':
                    $idContas = $data['idContas'];
                    $mes = $data['mes'];
                    $ano = $data['ano'];
                    $idPedidoMaterial = $data['idPedidoMaterial'];
                    $idServContratado = $data['idServContratado'];
                    $tipo = $data['tipo'];
                    $preco = $data['preco'];
                    $dtPag = $data['dtPag'];
                    $sitPag = $data['sitPag'];
                    $contas->populate($idContas, $mes, $ano, $idPedidoMaterial, $idServContratado, $tipo, $preco, $dtPag, $sitPag);
                    $result = $contas->save();
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







    public function put() // Método PUT. Usado para requisições PUT. Usado para atualizar um registro existente na tabela "contas".
    {
        $data = $this->getData();
        $idContas = $data['idContas'] ?? 0; // O "idContas" fornecido é válido? Ele existe?
        if ($idContas > 0) {
            $contas = new Contas();
            $idContas = $data['idContas'];
            $mes = $data['mes'];
            $ano = $data['ano'];
            $idPedidoMaterial = $data['idPedidoMaterial'];
            $idServContratado = $data['idServContratado'];
            $tipo = $data['tipo'];
            $preco = $data['preco'];
            $dtPag = $data['dtPag'];
            $sitPag = $data['sitPag'];
            $contas->populate($idContas, $mes, $ano, $idPedidoMaterial, $idServContratado, $tipo, $preco, $dtPag, $sitPag);
            $result = $contas->save();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }

    public function delete() // MUDEI AQUI! Método DELETE. Requisições DELETE usadas para excluir um registro da tabela "contas".
    {
        $data = $this->getData();
        $idContas = $data['idContas'] ?? 0;
        if ($idContas > 0) {
            $contas = new Contas();
            $idContas = $data['idContas'];
            $mes = $data['mes'];
            $ano = $data['ano'];
            $idPedidoMaterial = $data['idPedidoMaterial'];
            $idServContratado = $data['idServContratado'];
            $tipo = $data['tipo'];
            $preco = $data['preco'];
            $dtPag = $data['dtPag'];
            $sitPag = $data['sitPag'];
            $contas->populate($idContas, $mes, $ano, $idPedidoMaterial, $idServContratado, $tipo, $preco, $dtPag, $sitPag);
            $result = $contas->delete();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }

    public function file() // VAZIO!
    {
    }
}

new CtrlContas();
?>