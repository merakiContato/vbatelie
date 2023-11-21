<?php

namespace  models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;


class Contas
{

	private $idContas;
	private $mes;
	private $ano;
	private $idPedidoMaterial;
	private $idServContratado;
	private $tipo;
	private $preco;
	private $dtPag;
	private $sitPag;

	private $tableName  = "hostdeprojetos_vbatelie.contas";
	private $fieldsName = "idContas, mes, ano, idPedidoMaterial, idServContratado, tipo, preco, dtPag, sitPag";
	private $fieldKey   = "idContas";
	private $notNullFields = "mes, ano, idPedidoMaterial, idServContratado, tipo, preco, dtPag, sitPag";
	private $dbquery     = null;

	function __construct()
	{
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey, $this->notNullFields);
	}

	function populate($idContas, $mes, $ano, $idPedidoMaterial, $idServContratado, $tipo, $preco, $dtPag, $sitPag)
	{

		$this->setIdContas($idContas);
		$this->setMes($mes);
		$this->setAno($ano);
		$this->setIdPedidoMaterial($idPedidoMaterial);
		$this->setIdServContratado($idServContratado);
		$this->setTipo($tipo);
		$this->setPreco($preco);
		$this->setDtPag($dtPag);
		$this->setSitPag($sitPag);
	}

	public function toArray()
	{
		return array(
			'idContas' => $this->getIdContas(),
			'mes' => $this->getMes(),
			'ano' => $this->getAno(),
			'idPedidoMaterial' => $this->getIdPedidoMaterial(),
			'idServContratado' => $this->getIdServContratado(),
			'tipo' => $this->getTipo(),
			'preco' => $this->getPreco(),
			'dtPag' => $this->getDtPag(),
			'sitPag' => $this->getSitPag()
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
		if ($this->getIdContas() == 0) {
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
		if ($this->getIdContas() != 0) {
			return ($this->dbquery->delete($this->toArray()));
		}
	}


	public function calcularSomaContas($mes)
	{
		if ($mes !== '') {
			return $this->calcularSomaContasBanco($mes);
		} else {
			return ['error' => 'Por favor, selecione um mês.'];
		}
	}

	public function calcularSomaContasBanco($mes)
	{
		error_log("Início da função calcularSomaContasBanco");

		if (!empty($mes)) {
			$contas = new Contas();

			$where = (new Where())->addCondition('AND', 'mes', '=', "'{$mes}'");


			$resultado = $contas->listAll($where);

			$soma = array_sum(array_column($resultado, 'preco'));

			// Retorne um JSON válido
			return json_encode(['success' => true, 'soma' => $soma]);
		} else {
			// Retorne um JSON válido, mesmo que a resposta seja negativa
			return json_encode(['error' => 'Por favor, selecione um mês.']);
		}

		error_log("Fim da função calcularSomaContasBanco");
	}






	public function setIdContas($idContas)
	{
		$this->idContas = $idContas;
	}

	public function getIdContas()
	{
		return ($this->idContas);
	}

	public function setMes($mes)
	{
		$this->mes = $mes;
	}

	public function getMes()
	{
		return ($this->mes);
	}

	public function setAno($ano)
	{
		$this->ano = $ano;
	}

	public function getAno()
	{
		return ($this->ano);
	}

	public function setIdPedidoMaterial($idPedidoMaterial)
	{
		$this->idPedidoMaterial = $idPedidoMaterial;
	}

	public function getIdPedidoMaterial()
	{
		return ($this->idPedidoMaterial);
	}

	public function setIdServContratado($idServContratado)
	{
		$this->idServContratado = $idServContratado;
	}

	public function getIdServContratado()
	{
		return ($this->idServContratado);
	}

	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}

	public function getTipo()
	{
		return ($this->tipo);
	}

	public function setPreco($preco)
	{
		$this->preco = $preco;
	}

	public function getPreco()
	{
		return ($this->preco);
	}

	public function setDtPag($dtPag)
	{
		$this->dtPag = $dtPag;
	}

	public function getDtPag()
	{
		return ($this->dtPag);
	}

	public function setSitPag($sitPag)
	{
		$this->sitPag = $sitPag;
	}

	public function getSitPag()
	{
		return ($this->sitPag);
	}
}
