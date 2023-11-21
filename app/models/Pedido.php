<?php

namespace models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;

class Pedido
{
	private $idPedido;
	private $cpf;
	private $idProfissional;
	private $valorOrcamento;
	private $idServico;
	private $valorEntrada;
	private $valorFinal;
	private $medidasPedido;
	private $dtPrevIni;
	private $dtPagEntrada;
	private $dtFim;
	private $valorTotalFim;
	private $dtPagFim;
	private $tipoPag;
	private $sitPag;
	private $dtExpedicao;
	private $dtEntrada;
	private $dtCancelamento;
	private $observacao;

	private $tableName  = "hostdeprojetos_vbatelie.catalogo";
	private $fieldsName = "idPedido, cpf, idProfissional, valorOrcamento, idServico, valorEntrada, valorFinal, medidasPedido, dtPrevIni, dtPagEntrada, dtFim, valorTotalFim, dtPagFim, tipoPag, sitPag, dtExpedicao, dtEntrada, dtCancelamento, observacao";
	private $fieldKey = "idPedido";
	private $notNullFields = "cpf, idProfissional, valorOrcamento, idServico, valorEntrada, valorFinal, medidasPedido, dtPrevIni, dtPagEntrada, dtFim, valorTotalFim, dtPagFim, tipoPag, sitPag, dtExpedicao, dtEntrada, dtCancelamento";

	private $dbquery = null;

	function __construct()
	{
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey, $this->notNullFields);
	}

	public function populate(
		$idPedido,
		$cpf,
		$idProfissional,
		$valorOrcamento,
		$idServico,
		$valorEntrada,
		$valorFinal,
		$medidasPedido,
		$dtPrevIni,
		$dtPagEntrada,
		$dtFim,
		$valorTotalFim,
		$dtPagFim,
		$tipoPag,
		$sitPag,
		$dtExpedicao,
		$dtEntrada,
		$dtCancelamento,
		$observacao
	) {
		$this->setIdPedido($idPedido);
		$this->setCpf($cpf);
		$this->setIdProfissional($idProfissional);
		$this->setValorOrcamento($valorOrcamento);
		$this->setIdServico($idServico);
		$this->setValorEntrada($valorEntrada);
		$this->setValorFinal($valorFinal);
		$this->setMedidasPedido($medidasPedido);
		$this->setDtPrevIni($dtPrevIni);
		$this->setDtPagEntrada($dtPagEntrada);
		$this->setDtFim($dtFim);
		$this->setValorTotalFim($valorTotalFim);
		$this->setDtPagFim($dtPagFim);
		$this->setTipoPag($tipoPag);
		$this->setSitPag($sitPag);
		$this->setDtExpedicao($dtExpedicao);
		$this->setDtEntrada($dtEntrada);
		$this->setDtCancelamento($dtCancelamento);
		$this->setObservacao($observacao);
	}

	public function toArray()
	{
		return [
			'idPedido' => $this->getIdPedido(),
			'cpf' => $this->getCpf(),
			'idProfissional' => $this->getIdProfissional(),
			'valorOrcamento' => $this->getValorOrcamento(),
			'idServico' => $this->getIdServico(),
			'valorEntrada' => $this->getValorEntrada(),
			'valorFinal' => $this->getValorFinal(),
			'medidasPedido' => $this->getMedidasPedido(),
			'dtPrevIni' => $this->getDtPrevIni(),
			'dtPagEntrada' => $this->getDtPagEntrada(),
			'dtFim' => $this->getDtFim(),
			'valorTotalFim' => $this->getValorTotalFim(),
			'dtPagFim' => $this->getDtPagFim(),
			'tipoPag' => $this->getTipoPag(),
			'sitPag' => $this->getSitPag(),
			'dtExpedicao' => $this->getDtExpedicao(),
			'dtEntrada' => $this->getDtEntrada(),
			'dtCancelamento' => $this->getDtCancelamento(),
			'observacao' => $this->getObservacao(),
		];
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
	{
		if ($this->getIdPedido() != 0) {
			return ($this->dbquery->delete($this->toArray()));
		}
	}

	public function getIdPedido()
	{
		return $this->idPedido;
	}

	public function setIdPedido($idPedido)
	{
		$this->idPedido = $idPedido;

		return $this;
	}

	public function getCpf()
	{
		return $this->cpf;
	}

	public function setCpf($cpf)
	{
		$this->cpf = $cpf;

		return $this;
	}

	public function getIdProfissional()
	{
		return $this->idProfissional;
	}

	public function setIdProfissional($idProfissional)
	{
		$this->idProfissional = $idProfissional;

		return $this;
	}

	public function getValorOrcamento()
	{
		return $this->valorOrcamento;
	}

	public function setValorOrcamento($valorOrcamento)
	{
		$this->valorOrcamento = $valorOrcamento;

		return $this;
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

	public function getValorEntrada()
	{
		return $this->valorEntrada;
	}

	public function setValorEntrada($valorEntrada)
	{
		$this->valorEntrada = $valorEntrada;

		return $this;
	}

	public function getValorFinal()
	{
		return $this->valorFinal;
	}

	public function setValorFinal($valorFinal)
	{
		$this->valorFinal = $valorFinal;

		return $this;
	}

	public function getMedidasPedido()
	{
		return $this->medidasPedido;
	}

	public function setMedidasPedido($medidasPedido)
	{
		$this->medidasPedido = $medidasPedido;

		return $this;
	}

	public function getDtPrevIni()
	{
		return $this->dtPrevIni;
	}

	public function setDtPrevIni($dtPrevIni)
	{
		$this->dtPrevIni = $dtPrevIni;

		return $this;
	}

	public function getDtPagEntrada()
	{
		return $this->dtPagEntrada;
	}

	public function setDtPagEntrada($dtPagEntrada)
	{
		$this->dtPagEntrada = $dtPagEntrada;

		return $this;
	}

	public function getDtFim()
	{
		return $this->dtFim;
	}

	public function setDtFim($dtFim)
	{
		$this->dtFim = $dtFim;

		return $this;
	}

	public function getValorTotalFim()
	{
		return $this->valorTotalFim;
	}

	public function setValorTotalFim($valorTotalFim)
	{
		$this->valorTotalFim = $valorTotalFim;

		return $this;
	}

	public function getDtPagFim()
	{
		return $this->dtPagFim;
	}

	public function setDtPagFim($dtPagFim)
	{
		$this->dtPagFim = $dtPagFim;

		return $this;
	}

	public function getTipoPag()
	{
		return $this->tipoPag;
	}

	public function setTipoPag($tipoPag)
	{
		$this->tipoPag = $tipoPag;

		return $this;
	}

	public function getSitPag()
	{
		return $this->sitPag;
	}

	public function setSitPag($sitPag)
	{
		$this->sitPag = $sitPag;

		return $this;
	}

	public function getDtExpedicao()
	{
		return $this->dtExpedicao;
	}

	public function setDtExpedicao($dtExpedicao)
	{
		$this->dtExpedicao = $dtExpedicao;

		return $this;
	}

	public function getDtEntrada()
	{
		return $this->dtEntrada;
	}

	public function setDtEntrada($dtEntrada)
	{
		$this->dtEntrada = $dtEntrada;

		return $this;
	}

	public function getDtCancelamento()
	{
		return $this->dtCancelamento;
	}

	public function setDtCancelamento($dtCancelamento)
	{
		$this->dtCancelamento = $dtCancelamento;

		return $this;
	}

	public function getObservacao()
	{
		return $this->observacao;
	}

	public function setObservacao($observacao)
	{
		$this->observacao = $observacao;

		return $this;
	}
}
