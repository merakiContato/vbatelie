<?php

namespace models;

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
	private $notNullFields = "senha, nivAcesso, nome, email";
	private $dbquery     = null;

	public function __construct()
	{
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey, $this->notNullFields);
	}

	public function populate($idUsuario, $senha, $nivAcesso, $nome, $email)
	{
		$this->setIdUsuario($idUsuario);
		$this->setSenha($senha);
		$this->setNivAcesso($nivAcesso);
		$this->setNome($nome);
		$this->setEmail($email);
	}

	public function toArray()
	{
		return [
			'idUsuario' => $this->getIdUsuario(),
			'senha' => $this->getSenha(),
			'nivAcesso' => $this->getNivAcesso(),
			'nome' => $this->getNome(),
			'email' => $this->getEmail()
		];
	}

	public function gerarSalt()
	{
		return bin2hex(random_bytes(32)); // Gera um salt aleatório
	}

	public function configurarSenha($senha)
	{
		$this->senha = password_hash($senha, PASSWORD_DEFAULT);
	}

	public function verificarSenha($senha)
	{
		return password_verify($senha, $this->senha);
	}


	public function save()
	{
		if ($this->getIdUsuario() == 0) {
			return $this->dbquery->insert($this->toArray());
		} else {
			return $this->dbquery->update($this->toArray());
		}
	}

	/* 	// Função para autenticar o usuário
	public static function authenticateUser($email, $senha)
	{
		$usuario = new Usuario();
		$result = $usuario->listByFieldKey($email);

		if (!empty($result)) {
			// Verifica se a senha fornecida coincide com o hash armazenado no banco de dados
			$hashedPassword = $result[0]['senha']; // Assumindo que 'senha' é o campo no banco de dados
			if (password_verify($senha, $hashedPassword)) {
				return true; // Autenticação bem-sucedida
			}
		}

		return false; // Autenticação falhou
	} */


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
		if ($this->getIdUsuario() != 0) {
			return $this->dbquery->delete($this->toArray());
		}
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

			if (!empty($hashedPassword) && password_verify($senha, $hashedPassword)) {
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
		return $this->dbquery->selectWhere($where);
	}


	public function getIdUsuario()
	{
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function setSenha($senha)
	{
		$this->configurarSenha($senha);
	}

	public function getNivAcesso()
	{
		return $this->nivAcesso;
	}

	public function setNivAcesso($nivAcesso)
	{
		$this->nivAcesso = $nivAcesso;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}
}
