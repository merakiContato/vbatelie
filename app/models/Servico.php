<?php

namespace models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;

class Servico
{
	private $idServico;
	private $nome;
	private $idCatalogo;
	private $descricao;
	private $preco;

	private $tableName  = "hostdeprojetos_vbatelie.contas";
	private $fieldsName = "idServico, nome, idCatalogo, descricao, preco";
	private $fieldKey = "idServico";
	private $notNullFields = "nome, idCatalogo, descricao, preco";
	private $dbquery = null;

	public function __construct()
	{
		$this->dbquery = new DBQuery(
			$this->tableName,
			$this->fieldsName,
			$this->fieldKey,
			$this->notNullFields
		);
	}

	public function populate($idServico, $nome, $idCatalogo, $descricao, $preco)
	{
		$this->setIdServico($idServico);
		$this->setNome($nome);
		$this->setIdCatalogo($idCatalogo);
		$this->setDescricao($descricao);
		$this->setPreco($preco);
	}

	public function save()
	{
		if ($this->getIdServico() == 0) {
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

	public function delete()
	{
		if ($this->getIdServico() != 0) {
			return $this->dbquery->delete($this->toArray());
		}
	}

	public function toArray()
	{
		return array(
			'idServico' => $this->getIdServico(),
			'nome' => $this->getNome(),
			'idCatalogo' => $this->getIdCatalogo(),
			'descricao' => $this->getDescricao(),
			'preco' => $this->getPreco()
		);
	}

	public function getIdServico()
	{
		return $this->idServico;
	}

	public function setIdServico($idServico)
	{
		$this->idServico = $idServico;

		return $this;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;

		return $this;
	}

	public function getIdCatalogo()
	{
		return $this->idCatalogo;
	}

	public function setIdCatalogo($idCatalogo)
	{
		$this->idCatalogo = $idCatalogo;

		return $this;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;

		return $this;
	}

	public function getPreco()
	{
		return $this->preco;
	}

	public function setPreco($preco)
	{
		$this->preco = $preco;

		return $this;
	}
}
