<?php

namespace  models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;


	class Servcontratado {

	private $idServContratado;
	private $cpf;
	private $nome;
	private $telefone;
	private $cep;
	private $endereco;
	private $complemento;
	private $email;
	private $idPedido;
	private $idServico;
	private $pagServ;
	private $dtPagServ;

	private $tableName  = "hostdeprojetos_vbatelie.servcontratado";
	private $fieldsName = "idServContratado, cpf, nome, telefone, cep, endereco, complemento, email, idPedido, idServico, pagServ, dtPagServ";
	private $fieldKey   = "idServContratado";
	private $notNullFields = "idServContratado, cpf, nome, telefone, cep, endereco, complemento, email, idPedido, idServico, pagServ, dtPagServ";
	private $dbquery     = null;

	function __construct(){
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey, $this->notNullFields);
	}

	function populate( $idServContratado, $cpf, $nome, $telefone, $cep, $endereco, $complemento, $email, $idPedido, $idServico, $pagServ, $dtPagServ){

		 $this->setIdServContratado( $idServContratado );
		 $this->setCpf( $cpf );
		 $this->setNome( $nome );
		 $this->setTelefone( $telefone );
		 $this->setCep( $cep );
		 $this->setEndereco( $endereco );
		 $this->setComplemento( $complemento );
		 $this->setEmail( $email );
		 $this->setIdPedido( $idPedido );
		 $this->setIdServico( $idServico );
		 $this->setPagServ( $pagServ );
		 $this->setDtPagServ( $dtPagServ );
	}

	public function toArray(){
		 return array(
			 'idServContratado' => $this->getIdServContratado(),
			 'cpf' => $this->getCpf(),
			 'nome' => $this->getNome(),
			 'telefone' => $this->getTelefone(),
			 'cep' => $this->getCep(),
			 'endereco' => $this->getEndereco(),
			 'complemento' => $this->getComplemento(),
			 'email' => $this->getEmail(),
			 'idPedido' => $this->getIdPedido(),
			 'idServico' => $this->getIdServico(),
			 'pagServ' => $this->getPagServ(),
			 'dtPagServ' => $this->getDtPagServ()
		);
	}

	public function toJson(){
		return( json_encode( $this->toArray() ));
	}

	public function toString(){
		 return("\n\t\t\t". implode(", ",$this->toArray()));
	}


	public function save() {
		if($this->getIdServContratado() == 0){
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
		if($this->getIdServContratado() != 0){
			return( $this->dbquery->delete($this->toArray()));
		}
	}

	public function setIdServContratado( $idServContratado ){
		 $this->idServContratado = $idServContratado;
	}

	public function getIdServContratado(){
		  return( $this->idServContratado );
	}

	public function setCpf( $cpf ){
		 $this->cpf = $cpf;
	}

	public function getCpf(){
		  return( $this->cpf );
	}

	public function setNome( $nome ){
		 $this->nome = $nome;
	}

	public function getNome(){
		  return( $this->nome );
	}

	public function setTelefone( $telefone ){
		 $this->telefone = $telefone;
	}

	public function getTelefone(){
		  return( $this->telefone );
	}

	public function setCep( $cep ){
		 $this->cep = $cep;
	}

	public function getCep(){
		  return( $this->cep );
	}

	public function setEndereco( $endereco ){
		 $this->endereco = $endereco;
	}

	public function getEndereco(){
		  return( $this->endereco );
	}

	public function setComplemento( $complemento ){
		 $this->complemento = $complemento;
	}

	public function getComplemento(){
		  return( $this->complemento );
	}

	public function setEmail( $email ){
		 $this->email = $email;
	}

	public function getEmail(){
		  return( $this->email );
	}

	public function setIdPedido( $idPedido ){
		 $this->idPedido = $idPedido;
	}

	public function getIdPedido(){
		  return( $this->idPedido );
	}

	public function setIdServico( $idServico ){
		 $this->idServico = $idServico;
	}

	public function getIdServico(){
		  return( $this->idServico );
	}

	public function setPagServ( $pagServ ){
		 $this->pagServ = $pagServ;
	}

	public function getPagServ(){
		  return( $this->pagServ );
	}

	public function setDtPagServ( $dtPagServ ){
		 $this->dtPagServ = $dtPagServ;
	}

	public function getDtPagServ(){
		  return( $this->dtPagServ );
	}

}


?>