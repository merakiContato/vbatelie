
<?php

use models\Pedidomaterial;
use core\utils\ControllerHandler;

class CtrlPedidomaterial extends ControllerHandler
{

    public function __construct(){
        parent::__construct();
    }

    public function get()
    {
        try {
            $idPedidoMaterial = $this->getParameter('idPedidoMaterial') ?? 0;

            if ($idPedidoMaterial == 0) {
                // Se $idPedidomaterial for 0, significa que é uma requisição para listar todos os materiais
                $pedidoMaterial = new Pedidomaterial();
                $resultSet = $pedidoMaterial->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else {
                // Se $idPedidomaterial for diferente de 0, é uma requisição para obter um Pedidomaterial específico
                $pedidoMaterial = new Pedidomaterial();
                $pedidoMaterial->populate("","","", "", "", "", "");  // Não forneça valores para $titulo e $descricao
                $resultSet = $pedidoMaterial->listByFieldKey($idPedidoMaterial);
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
        $pedidoMaterial = new Pedidomaterial();        
        $idPedidoMaterial = $data['idPedidoMaterial'];
        $idPedido = $data['idPedido'];
        $idMaterial = $data['idMaterial'];
        $dtCompra = $data['dtCompra'];
        $qtd = $data['qtd'];
        $unidadeMedida = $data['unidadeMedida'];
        $preco = $data['preco'];
        $pedidoMaterial->populate( $idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco);
        $result = $pedidoMaterial->save();
        echo $result;
    }

    public function put() {
        $data = $this->getData();
        $idPedidoMaterial = $data['idPedidoMaterial'] ?? 0;
        
        if ($idPedidoMaterial > 0) {
        $pedidoMaterial = new Pedidomaterial();        
        $idPedidoMaterial = $data['idPedidoMaterial'];
        $idPedido = $data['idPedido'];
        $idMaterial = $data['idMaterial'];
        $dtCompra = $data['dtCompra'];
        $qtd = $data['qtd'];
        $unidadeMedida = $data['unidadeMedida'];
        $preco = $data['preco'];
        $pedidoMaterial->setIdPedidomaterial($idPedidoMaterial);
        $pedidoMaterial->populate( $idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco);
        $result = $pedidoMaterial->save();
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
        $idPedidoMaterial = $data['idPedidoMaterial'] ?? 0;
    
        if ($idPedidoMaterial > 0) {
            $pedidoMaterial = new PedidoMaterial(); 
    
            // Chama o método delete() na classe PedidoMaterial
            $result = $pedidoMaterial->delete();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
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

    public function file(){

    }
}

new CtrlPedidomaterial();
?>