<?php

namespace  models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;


class Cliente
{

	private $idCliente;
	private $cpf;
	private $nome;
	private $cep;
	private $endereco;
	private $complemento;
	private $telefone;
	private $email;

	private $tableName  = "hostdeprojetos_vbatelie.cliente";
	private $fieldsName = "idCliente, cpf, nome, cep, endereco, complemento, telefone, email";
	private $fieldKey   = "cpf";
	private $dbquery     = null;

	function __construct()
	{
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate($idCliente, $cpf, $nome, $cep, $endereco, $complemento, $telefone, $email)
	{

		$this->setIdCliente($idCliente);
		$this->setCpf($cpf);
		$this->setNome($nome);
		$this->setCep($cep);
		$this->setEndereco($endereco);
		$this->setComplemento($complemento);
		$this->setTelefone($telefone);
		$this->setEmail($email);
	}

	public function toArray()
	{
		return array(
			'idCliente' => $this->getIdCliente(),
			'cpf' => $this->getCpf(),
			'nome' => $this->getNome(),
			'cep' => $this->getCep(),
			'endereco' => $this->getEndereco(),
			'complemento' => $this->getComplemento(),
			'telefone' => $this->getTelefone(),
			'email' => $this->getEmail()
		);
	}

	public function toJson()
	{
		return (json_encode($this->toArray()));
	}

	public function toString()
	{
		return ("\n\t\t\t" . implode(", ", $this->toArray()));
	}


	public function save()
	{
		if ($this->getIdCliente() == 0) {
			return ($this->dbquery->insert($this->toArray()));
		} else {
			return ($this->dbquery->update($this->toArray()));
		}
	}

	public function listAll()
	{
		$rSet = $this->dbquery->select();
		return ($rSet);
	}

	public function listByFieldKey($value)
	{
		$where = (new Where())->addCondition('AND', $this->fieldKey, '=', $value);
		$rSet = $this->dbquery->selectWhere($where);
		return ($rSet);
	}

	public function delete()
	{
		if ($this->getCpf() != 0) {
			return ($this->dbquery->delete($this->toArray()));
		}
	}

	public function setIdCliente($idCliente)
	{
		$this->idCliente = $idCliente;
	}

	public function getIdCliente()
	{
		return ($this->idCliente);
	}

	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}

	public function getCpf()
	{
		return ($this->cpf);
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getNome()
	{
		return ($this->nome);
	}

	public function setCep($cep)
	{
		$this->cep = $cep;
	}

	public function getCep()
	{
		return ($this->cep);
	}

	public function setEndereco($endereco)
	{
		$this->endereco = $endereco;
	}

	public function getEndereco()
	{
		return ($this->endereco);
	}

	public function setComplemento($complemento)
	{
		$this->complemento = $complemento;
	}

	public function getComplemento()
	{
		return ($this->complemento);
	}

	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}

	public function getTelefone()
	{
		return ($this->telefone);
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return ($this->email);
	}
}
