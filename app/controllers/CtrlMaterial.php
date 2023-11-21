
<?php

use models\Material;
use core\utils\ControllerHandler;

class CtrlMaterial extends ControllerHandler
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        try {
            $idMaterial = $this->getParameter('idMaterial') ?? 0;

            if ($idMaterial == 0) {
                // Se $idMaterial for 0, significa que é uma requisição para listar todos os materiais
                $material = new Material();
                $resultSet = $material->listAll();
                echo json_encode($resultSet, JSON_UNESCAPED_UNICODE);
            } else {
                // Se $idMaterial for diferente de 0, é uma requisição para obter um material específico
                $material = new Material();
                $material->populate("", "", "");  // Não forneça valores para $titulo e $descricao
                $resultSet = $material->listByFieldKey($idMaterial);
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
        $material = new Material();
        $idMaterial = $data['idMaterial'];
        $titulo     = $data['titulo'];
        $descricao  = $data['descricao'];
        $material->populate($idMaterial, $titulo, $descricao);
        $result = $material->save();
        echo $result;
    }

    public function put()
    {
        $data = $this->getData();
        $idMaterial = $data['idMaterial'] ?? 0;

        if ($idMaterial > 0) {
            $material = new Material();
            $idMaterial = $data['idMaterial'];
            $titulo = $data['titulo'];
            $descricao = $data['descricao'];
            $material->setIdMaterial($idMaterial);
            $material->populate($idMaterial, $titulo, $descricao);
            $result = $material->save();

            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    }


    /*     public function delete() {
        $data = $this->getData();
        $idMaterial = $data['idMaterial'] ?? 0;
    
        if ($idMaterial > 0) {
            $material = new Material(); 
    
            // Chama o método delete() na classe Material
            $result = $material->delete();
            echo $result;
        } else {
            http_response_code(400);
            echo json_encode([
                'error' => 'ID inválido ou não fornecido.'
            ]);
        }
    } */


    public function delete()
    {
        $data = $this->getData();
        $idMaterial = $data['idMaterial'] ?? 0;

        if ($idMaterial > 0) {
            $material = new Material();

            // Adicione um console.log ou echo para verificar se o ID está correto
            echo "ID do Material a ser excluído: $idMaterial";

            // Chama o método delete() na classe Material
            $result = $material->delete($idMaterial);
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

new CtrlMaterial();
?>