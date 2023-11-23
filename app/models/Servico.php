<?php

namespace  models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;


	class Servico {

	private $idServico;
	private $nome;
	private $idCatalogo;
	private $descricao;
	private $preco;

	private $tableName  = "hostdeprojetos_vbatelie.servico";
	private $fieldsName = "idServico, nome, idCatalogo, descricao, preco";
	private $fieldKey   = "idServico";
	private $dbquery     = null;

	function __construct(){
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate( $idServico, $nome, $idCatalogo, $descricao, $preco){

		 $this->setIdServico( $idServico );
		 $this->setNome( $nome );
		 $this->setIdCatalogo( $idCatalogo );
		 $this->setDescricao( $descricao );
		 $this->setPreco( $preco );
	}

	public function toArray(){
		 return array(
			 'idServico' => $this->getIdServico(),
			 'nome' => $this->getNome(),
			 'idCatalogo' => $this->getIdCatalogo(),
			 'descricao' => $this->getDescricao(),
			 'preco' => $this->getPreco()
		);
	}

	public function toJson(){
		return( json_encode( $this->toArray() ));
	}

	public function toString(){
		 return("\n\t\t\t". implode(", ",$this->toArray()));
	}


	public function save() {
		if($this->getIdServico() == 0){
			return( $this->dbquery->insert($this->toArray()));
		}else{
			return( $this->dbquery->update($this->toArray()));
		}
	}

	public function listAll() {
		    $rSet = $this->dbquery->select();
		    return( $rSet );
	}

	public function listByFieldKey( $value ){
		    $where = (new Where())->addCondition('AND', $this->fieldKey , '=', $value);
		    $rSet = $this->dbquery->selectWhere($where);
		    return( $rSet );
	}

	public function delete() {
		if($this->getIdServico() != 0){
			return( $this->dbquery->delete($this->toArray()));
		}
	}

	public function setIdServico( $idServico ){
		 $this->idServico = $idServico;
	}

	public function getIdServico(){
		  return( $this->idServico );
	}

	public function setNome( $nome ){
		 $this->nome = $nome;
	}

	public function getNome(){
		  return( $this->nome );
	}

	public function setIdCatalogo( $idCatalogo ){
		 $this->idCatalogo = $idCatalogo;
	}

	public function getIdCatalogo(){
		  return( $this->idCatalogo );
	}

	public function setDescricao( $descricao ){
		 $this->descricao = $descricao;
	}

	public function getDescricao(){
		  return( $this->descricao );
	}

	public function setPreco( $preco ){
		 $this->preco = $preco;
	}

	public function getPreco(){
		  return( $this->preco );
	}

}


?>