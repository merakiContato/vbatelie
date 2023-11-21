<?php

namespace models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;

class Material
{
    private $idMaterial;
    private $titulo;
    private $descricao;

    private $tableName  = "hostdeprojetos_vbatelie.material";
    private $fieldsName = "idMaterial, titulo, descricao";
    private $fieldKey   = "idMaterial";
    private $notNullFields = "titulo, descricao";
    private $dbquery     = null;

    public function __construct()
    {
        $this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey, $this->notNullFields);
    }

    public function populate($idMaterial, $titulo, $descricao) //mesmo o idMaterial sendo auto_increment, precisa estar no populate
    {
        $this->setIdMaterial($idMaterial);
        $this->setTitulo($titulo);
        $this->setDescricao($descricao);
    }

    public function toArray()
    {
        return array(
            'idMaterial' => $this->getIdMaterial(),
            'titulo' => $this->getTitulo(),
            'descricao' => $this->getDescricao()
        );
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function toString()
    {
        return "\n\t\t\t" . implode(", ", $this->toArray());
    }

    public function save()
    {
        if ($this->getIdMaterial() == 0) {
            return $this->dbquery->insert($this->toArray());
        } else {
            return $this->dbquery->update($this->toArray());
        }
    }

    public function listAll()
    {
        $rSet = $this->dbquery->select();
        return $rSet;
    }

    public function listByFieldKey($value)
    {
        $where = (new Where())->addCondition('AND', $this->fieldKey, '=', $value);
        $rSet = $this->dbquery->selectWhere($where);
        return $rSet;
    }

    /*     public function delete()
    {
        if ($this->getIdMaterial() != 0) {
            return $this->dbquery->delete($this->toArray());
        }
    } */

    public function delete()
    {
        if ($this->getIdMaterial() != 0) {
            $idMaterial = $this->getIdMaterial();
            return $this->dbquery->delete($idMaterial);
        }
    }

    public function setIdMaterial($idMaterial)
    {
        $this->idMaterial = $idMaterial;
    }

    public function getIdMaterial()
    {
        return $this->idMaterial;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
}
