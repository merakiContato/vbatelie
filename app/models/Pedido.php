<?php

namespace  models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;


class Pedido
{

	private $idPedido;
	private $cpf;
	private $idProfissional;
	private $idServico;
	private $valorOrcamento;
	private $valorEntrada;
	private $valorFinal;
	private $medidasPedido;
	private $dtPrevIni;
	private $dtPagEntrada;
	private $dtIni;
	private $dtPrevFim;
	private $dtFim;
	private $valorTotalFim;
	private $dtPagFim;
	private $tipoPag;
	private $sitPag;
	private $dtExpedicao;
	private $dtEntrega;
	private $dtCancelamento;
	private $observacao;

	private $tableName  = "hostdeprojetos_vbatelie.pedido";
	private $fieldsName = "idPedido, cpf, idProfissional, idServico, valorOrcamento, valorEntrada, valorFinal, medidasPedido, dtPrevIni, dtPagEntrada, dtIni, dtPrevFim, dtFim, valorTotalFim, dtPagFim, tipoPag, sitPag, dtExpedicao, dtEntrega, dtCancelamento, observacao";
	private $fieldKey   = "idPedido";
	private $dbquery     = null;

	function __construct()
	{
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate($idPedido, $cpf, $idProfissional, $idServico, $valorOrcamento, $valorEntrada, $valorFinal, $medidasPedido, $dtPrevIni, $dtPagEntrada, $dtIni, $dtPrevFim, $dtFim, $valorTotalFim, $dtPagFim, $tipoPag, $sitPag, $dtExpedicao, $dtEntrega, $dtCancelamento, $observacao)
	{
		$this->setIdPedido($idPedido);
		$this->setCpf($cpf);
		$this->setIdProfissional($idProfissional);
		$this->setIdServico($idServico);
		$this->setValorOrcamento($valorOrcamento);
		$this->setValorEntrada($valorEntrada);
		$this->setValorFinal($valorFinal);
		$this->setMedidasPedido($medidasPedido);
		$this->setDtPrevIni($dtPrevIni);
		$this->setDtPagEntrada($dtPagEntrada);
		$this->setDtIni($dtIni);
		$this->setDtPrevFim($dtPrevFim);
		$this->setDtFim($dtFim);
		$this->setValorTotalFim($valorTotalFim);
		$this->setDtPagFim($dtPagFim);
		$this->setTipoPag($tipoPag);
		$this->setSitPag($sitPag);
		$this->setDtExpedicao($dtExpedicao);
		$this->setDtEntrega($dtEntrega);
		$this->setDtCancelamento($dtCancelamento);
		$this->setObservacao($observacao);
	}

	public function toArray()
	{
		return array(
			'idPedido' => $this->getIdPedido(),
			'cpf' => $this->getCpf(),
			'idProfissional' => $this->getIdProfissional(),
			'idServico' => $this->getIdServico(),
			'valorOrcamento' => $this->getValorOrcamento(),
			'valorEntrada' => $this->getValorEntrada(),
			'valorFinal' => $this->getValorFinal(),
			'medidasPedido' => $this->getMedidasPedido(),
			'dtPrevIni' => $this->getDtPrevIni(),
			'dtPagEntrada' => $this->getDtPagEntrada(),
			'dtIni' => $this->getDtIni(),
			'dtPrevFim' => $this->getDtPrevFim(),
			'dtFim' => $this->getDtFim(),
			'valorTotalFim' => $this->getValorTotalFim(),
			'dtPagFim' => $this->getDtPagFim(),
			'tipoPag' => $this->getTipoPag(),
			'sitPag' => $this->getSitPag(),
			'dtExpedicao' => $this->getDtExpedicao(),
			'dtEntrega' => $this->getDtEntrega(),
			'dtCancelamento' => $this->getDtCancelamento(),
			'observacao' => $this->getObservacao()
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
		if ($this->getIdPedido() == 0) {
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
		if ($this->getIdPedido() != 0) {
			return ($this->dbquery->delete($this->toArray()));
		}
	}

	public function setIdPedido($idPedido)
	{
		$this->idPedido = $idPedido;
	}

	public function getIdPedido()
	{
		return ($this->idPedido);
	}

	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}

	public function getCpf()
	{
		return ($this->cpf);
	}

	public function setIdProfissional($idProfissional)
	{
		$this->idProfissional = $idProfissional;
	}

	public function getIdProfissional()
	{
		return ($this->idProfissional);
	}

	public function setIdServico($idServico)
	{
		$this->idServico = $idServico;
	}

	public function getIdServico()
	{
		return ($this->idServico);
	}

	public function setValorOrcamento($valorOrcamento)
	{
		$this->valorOrcamento = $valorOrcamento;
	}

	public function getValorOrcamento()
	{
		return ($this->valorOrcamento);
	}

	public function setValorEntrada($valorEntrada)
	{
		$this->valorEntrada = $valorEntrada;
	}

	public function getValorEntrada()
	{
		return ($this->valorEntrada);
	}

	public function setValorFinal($valorFinal)
	{
		$this->valorFinal = $valorFinal;
	}

	public function getValorFinal()
	{
		return ($this->valorFinal);
	}

	public function setMedidasPedido($medidasPedido)
	{
		$this->medidasPedido = $medidasPedido;
	}

	public function getMedidasPedido()
	{
		return ($this->medidasPedido);
	}

	public function setDtPrevIni($dtPrevIni)
	{
		$this->dtPrevIni = $dtPrevIni;
	}

	public function getDtPrevIni()
	{
		return ($this->dtPrevIni);
	}

	public function setDtPagEntrada($dtPagEntrada)
	{
		$this->dtPagEntrada = $dtPagEntrada;
	}

	public function getDtPagEntrada()
	{
		return ($this->dtPagEntrada);
	}

	public function setDtIni($dtIni)
	{
		$this->dtIni = $dtIni;
	}

	public function getDtIni()
	{
		return ($this->dtIni);
	}

	public function setDtPrevFim($dtPrevFim)
	{
		$this->dtPrevFim = $dtPrevFim;
	}

	public function getDtPrevFim()
	{
		return ($this->dtPrevFim);
	}

	public function setDtFim($dtFim)
	{
		$this->dtFim = $dtFim;
	}

	public function getDtFim()
	{
		return ($this->dtFim);
	}

	public function setValorTotalFim($valorTotalFim)
	{
		$this->valorTotalFim = $valorTotalFim;
	}

	public function getValorTotalFim()
	{
		return ($this->valorTotalFim);
	}

	public function setDtPagFim($dtPagFim)
	{
		$this->dtPagFim = $dtPagFim;
	}

	public function getDtPagFim()
	{
		return ($this->dtPagFim);
	}

	public function setTipoPag($tipoPag)
	{
		$this->tipoPag = $tipoPag;
	}

	public function getTipoPag()
	{
		return ($this->tipoPag);
	}

	public function setSitPag($sitPag)
	{
		$this->sitPag = $sitPag;
	}

	public function getSitPag()
	{
		return ($this->sitPag);
	}

	public function setDtExpedicao($dtExpedicao)
	{
		$this->dtExpedicao = $dtExpedicao;
	}

	public function getDtExpedicao()
	{
		return ($this->dtExpedicao);
	}

	public function setDtEntrega($dtEntrega)
	{
		$this->dtEntrega = $dtEntrega;
	}

	public function getDtEntrega()
	{
		return ($this->dtEntrega);
	}

	public function setDtCancelamento($dtCancelamento)
	{
		$this->dtCancelamento = $dtCancelamento;
	}

	public function getDtCancelamento()
	{
		return ($this->dtCancelamento);
	}

	public function setObservacao($observacao)
	{
		$this->observacao = $observacao;
	}

	public function getObservacao()
	{
		return ($this->observacao);
	}
}
