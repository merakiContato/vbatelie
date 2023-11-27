<?php

namespace  models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;


class Usuario
{

	private $idUsuario;
	private $senha;
	private $nivAcesso;
	private $nome;
	private $email;

	private $tableName  = "hostdeprojetos_vbatelie.usuario";
	private $fieldsName = "idUsuario, senha, nivAcesso, nome, email";
	private $fieldKey   = "idUsuario";
	private $dbquery     = null;

	function __construct()
	{
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate($idUsuario, $senha, $nivAcesso, $nome, $email)
	{

		$this->setIdUsuario($idUsuario);
		$this->setSenha($senha);
		$this->setNivAcesso($nivAcesso);
		$this->setNome($nome);
		$this->setEmail($email);
	}

	public function toArray()
	{
		return array(
			'idUsuario' => $this->getIdUsuario(),
			'senha' => $this->getSenha(),
			'nivAcesso' => $this->getNivAcesso(),
			'nome' => $this->getNome(),
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
		if ($this->getIdUsuario() == 0) {
			$this->configurarSenha($this->getSenha());
			return $this->dbquery->insert($this->toArray());
		} else {
			return $this->dbquery->update($this->toArray());
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
<<<<<<< HEAD
{
    if ($this->getIdUsuario() != 0) {
        return( $this->dbquery->delete($this->toArray()));
    }
}	
=======
	{
		if ($this->getIdUsuario() != 0) {
			return ($this->dbquery->delete($this->toArray()));
		}
	}



>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465

	public function configurarSenha($senha)
	{
		$this->senha = password_hash($senha, PASSWORD_DEFAULT);
	}

	public function verificarSenha($senha)
	{
		return password_verify($senha, $this->senha);
	}

	public static function authenticateUser($email, $senha)
	{
		$usuario = new Usuario();
		$result = $usuario->listByField('email', $email); // Utiliza um novo método listByField

		if (!empty($result)) {
			$userData = $result[0];
			$hashedPassword = isset($userData['senha']) ? $userData['senha'] : '';

			error_log('Email digitado: ' . $email);
			error_log('Senha digitada: ' . $senha);
			error_log('Hash armazenado: ' . $hashedPassword);

			if (!empty($hashedPassword) && $usuario->verificarSenha($senha)) {
				return true; // Autenticação bem-sucedida
			} else {
				error_log('A senha fornecida não coincide com o hash armazenado.');
			}
		} else {
			error_log('Usuário não encontrado para o e-mail fornecido.');
		}

		return false; // Autenticação falhou
	}


	public function listByField($field, $value)
{
    $where = (new Where())->addCondition('AND', $field, '=', $value);
    $result = $this->dbquery->selectWhere($where);

    if (!empty($result)) {
        $userData = $result[0];
        $this->populate($userData['idUsuario'], $userData['senha'], $userData['nivAcesso'], $userData['nome'], $userData['email']);
    }

    return $result;
}



	public function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;
	}

	public function getIdUsuario()
	{
		return ($this->idUsuario);
	}

	public function setSenha($senha)
	{
		$this->senha = $senha;
	}

	public function getSenha()
	{
		return ($this->senha);
	}

	public function setNivAcesso($nivAcesso)
	{
		$this->nivAcesso = $nivAcesso;
	}

	public function getNivAcesso()
	{
		return ($this->nivAcesso);
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getNome()
	{
		return ($this->nome);
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
