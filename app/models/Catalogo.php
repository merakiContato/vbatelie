<?php

namespace  models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;


	class Catalogo {

	private $idCatalogo;
	private $descricao;
	private $nome;

	private $tableName  = "hostdeprojetos_vbatelie.catalogo";
	private $fieldsName = "idCatalogo, descricao, nome";
	private $fieldKey   = "idCatalogo";
	private $dbquery     = null;

	function __construct(){
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate( $idCatalogo, $descricao, $nome){

		 $this->setIdCatalogo( $idCatalogo );
		 $this->setDescricao( $descricao );
		 $this->setNome( $nome );
	}

	public function toArray(){
		 return array(
			 'idCatalogo' => $this->getIdCatalogo(),
			 'descricao' => $this->getDescricao(),
			 'nome' => $this->getNome()
		);
	}

	public function toJson(){
		return( json_encode( $this->toArray() ));
	}

	public function toString(){
		 return("\n\t\t\t". implode(", ",$this->toArray()));
	}


	public function save() {
		if($this->getIdCatalogo() == 0){
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
		if($this->getIdCatalogo() != 0){
			return( $this->dbquery->delete($this->toArray()));
		}
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

	public function setNome( $nome ){
		 $this->nome = $nome;
	}

	public function getNome(){
		  return( $this->nome );
	}

}


?>