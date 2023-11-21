<?php

namespace  models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;


class Profissional
{

	private $idProfissional;
	private $idUsuario;
	private $nome;
	private $cargo;
	private $hrTrabalho;
	private $cpf;
	private $cep;
	private $endereco;
	private $complemento;
	private $telefone;
	private $email;

	private $tableName  = "hostdeprojetos_vbatelie.profissional";
	private $fieldsName = "idProfissional, idUsuario, nome, cargo, hrTrabalho, cpf, cep, endereco, complemento, telefone, email";
	private $fieldKey   = "idProfissional";
	private $notNullFields = "idUsuario, nome, cargo, hrTrabalho, cpf, cep, endereco, complemento, telefone, email";
	private $dbquery     = null;

	function __construct()
	{
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey, $this->notNullFields);
	}

	function populate($idProfissional, $idUsuario, $nome, $cargo, $hrTrabalho, $cpf, $cep, $endereco, $complemento, $telefone, $email)
	{

		$this->setIdProfissional($idProfissional);
		$this->setIdUsuario($idUsuario);
		$this->setNome($nome);
		$this->setCargo($cargo);
		$this->setHrTrabalho($hrTrabalho);
		$this->setCpf($cpf);
		$this->setCep($cep);
		$this->setEndereco($endereco);
		$this->setComplemento($complemento);
		$this->setTelefone($telefone);
		$this->setEmail($email);
	}

	public function toArray()
	{
		return array(
			'idProfissional' => $this->getIdProfissional(),
			'idUsuario' => $this->getIdUsuario(),
			'nome' => $this->getNome(),
			'cargo' => $this->getCargo(),
			'hrTrabalho' => $this->getHrTrabalho(),
			'cpf' => $this->getCpf(),
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
		if ($this->getIdProfissional() == 0) {
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
		if ($this->getIdProfissional() != 0) {
			return ($this->dbquery->delete($this->toArray()));
		}
	}

	public function setIdProfissional($idProfissional)
	{
		$this->idProfissional = $idProfissional;
	}

	public function getIdProfissional()
	{
		return ($this->idProfissional);
	}

	public function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;
	}

	public function getIdUsuario()
	{
		return ($this->idUsuario);
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getNome()
	{
		return ($this->nome);
	}

	public function setCargo($cargo)
	{
		$this->cargo = $cargo;
	}

	public function getCargo()
	{
		return ($this->cargo);
	}

	public function setHrTrabalho($hrTrabalho)
	{
		$this->hrTrabalho = $hrTrabalho;
	}

	public function getHrTrabalho()
	{
		return ($this->hrTrabalho);
	}

	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}

	public function getCpf()
	{
		return ($this->cpf);
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
