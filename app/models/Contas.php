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
	private $dbquery     = null;

	function __construct()
	{
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
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

<<<<<<< HEAD
	// Relatório financeiro antigo!
	/* function relatorioPeriodo ($dataIni, $dataFim) {
		$dataIni = \stripcslashes($dataIni);
		$dataIni = \DateTime::createFromFormat('d/m/Y', $dataIni)->format("Y-m-d");
		
		$dataFim = \stripcslashes($dataFim);
		$dataFim = \DateTime::createFromFormat('d/m/Y', $dataFim)->format("Y-m-d");
		
		$sql = "
=======
	/* function relatorioPeriodo ($dataIni, $dataFim) {
	    $dataIni = \stripcslashes($dataIni);
	    $dataIni = \DateTime::createFromFormat('d/m/Y', $dataIni)->format("Y-m-d");
	    
	    $dataFim = \stripcslashes($dataFim);
	    $dataFim = \DateTime::createFromFormat('d/m/Y', $dataFim)->format("Y-m-d");
	    
	    $sql = "
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
            SELECT  tipo, (sum(preco)*-1) as valorTotal 
            FROM    contas
            WHERE   dtPag between '".$dataIni."' and '".$dataFim."'
            GROUP   BY tipo;
        "; 
<<<<<<< HEAD
		return ( $this->dbquery->getConn()->query($sql)->fetchAll(\PDO::FETCH_ASSOC));
=======
	    return ( $this->dbquery->getConn()->query($sql)->fetchAll(\PDO::FETCH_ASSOC));
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
	} */

	public function relatorioPeriodo($mes, $ano)
	{
		$ano = \intval($ano); // Converte o ano para inteiro

		$sql = "
        SELECT tipo, preco * 1 as valor
        FROM contas
        WHERE mes = '{$mes}' AND ano = '{$ano}';
    ";

		try {
			$result = $this->dbquery->getConn()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

			// Log após a execução bem-sucedida da consulta SQL
			error_log('Consulta SQL executada com sucesso.');

			return $result;
		} catch (\PDOException $e) {
			// Log em caso de erro na execução da consulta SQL
			error_log('Erro ao executar a consulta SQL: ' . $e->getMessage());
			return [];
		}
	}

<<<<<<< HEAD
=======


>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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


	public function relatorioFinanceiro()
	{
		$where = new Where();
		$where->addCondition("AND", 'mes', '=', $this->mes);
		$where->addCondition("AND", 'ano', '=', $this->ano);
		$rSet = $this->dbquery->selectFiltered($where);
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
