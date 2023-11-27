<?php

namespace  models;

use core\database\DBQuery;
use core\utils\Sanitize;
use core\database\Where;


<<<<<<< HEAD
class Pedidomaterial
{
=======
	class Pedidomaterial {
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465

	private $idPedidoMaterial;
	private $idPedido;
	private $idMaterial;
	private $dtCompra;
	private $qtd;
	private $unidadeMedida;
	private $preco;

	private $tableName  = "hostdeprojetos_vbatelie.pedidomaterial";
	private $fieldsName = "idPedidoMaterial, idPedido, idMaterial, dtCompra, qtd, unidadeMedida, preco";
	private $fieldKey   = "idPedidoMaterial";
	private $dbquery     = null;

<<<<<<< HEAD
	function __construct()
	{
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate($idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco)
	{

		$this->setIdPedidoMaterial($idPedidoMaterial);
		$this->setIdPedido($idPedido);
		$this->setIdMaterial($idMaterial);
		$this->setDtCompra($dtCompra);
		$this->setQtd($qtd);
		$this->setUnidadeMedida($unidadeMedida);
		$this->setPreco($preco);
	}

	public function toArray()
	{
		return array(
			'idPedidoMaterial' => $this->getIdPedidoMaterial(),
			'idPedido' => $this->getIdPedido(),
			'idMaterial' => $this->getIdMaterial(),
			'dtCompra' => $this->getDtCompra(),
			'qtd' => $this->getQtd(),
			'unidadeMedida' => $this->getUnidadeMedida(),
			'preco' => $this->getPreco()
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
		if ($this->getIdPedidoMaterial() == 0) {
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
		if ($this->getIdPedidoMaterial() != 0) {
			return ($this->dbquery->delete($this->toArray()));
		}
	}

	public function setIdPedidoMaterial($idPedidoMaterial)
	{
		$this->idPedidoMaterial = $idPedidoMaterial;
	}

	public function getIdPedidoMaterial()
	{
		return ($this->idPedidoMaterial);
	}

	public function setIdPedido($idPedido)
	{
		$this->idPedido = $idPedido;
	}

	public function getIdPedido()
	{
		return ($this->idPedido);
	}

	public function setIdMaterial($idMaterial)
	{
		$this->idMaterial = $idMaterial;
	}

	public function getIdMaterial()
	{
		return ($this->idMaterial);
	}

	public function setDtCompra($dtCompra)
	{
		$this->dtCompra = $dtCompra;
	}

	public function getDtCompra()
	{
		return ($this->dtCompra);
	}

	public function setQtd($qtd)
	{
		$this->qtd = $qtd;
	}

	public function getQtd()
	{
		return ($this->qtd);
	}

	public function setUnidadeMedida($unidadeMedida)
	{
		$this->unidadeMedida = $unidadeMedida;
	}

	public function getUnidadeMedida()
	{
		return ($this->unidadeMedida);
	}

	public function setPreco($preco)
	{
		$this->preco = $preco;
	}

	public function getPreco()
	{
		return ($this->preco);
	}
}
=======
	function __construct(){
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate( $idPedidoMaterial, $idPedido, $idMaterial, $dtCompra, $qtd, $unidadeMedida, $preco){

		 $this->setIdPedidoMaterial( $idPedidoMaterial );
		 $this->setIdPedido( $idPedido );
		 $this->setIdMaterial( $idMaterial );
		 $this->setDtCompra( $dtCompra );
		 $this->setQtd( $qtd );
		 $this->setUnidadeMedida( $unidadeMedida );
		 $this->setPreco( $preco );
	}

	public function toArray(){
		 return array(
			 'idPedidoMaterial' => $this->getIdPedidoMaterial(),
			 'idPedido' => $this->getIdPedido(),
			 'idMaterial' => $this->getIdMaterial(),
			 'dtCompra' => $this->getDtCompra(),
			 'qtd' => $this->getQtd(),
			 'unidadeMedida' => $this->getUnidadeMedida(),
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
		if($this->getIdPedidoMaterial() == 0){
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
		if($this->getIdPedidoMaterial() != 0){
			return( $this->dbquery->delete($this->toArray()));
		}
	}

	public function setIdPedidoMaterial( $idPedidoMaterial ){
		 $this->idPedidoMaterial = $idPedidoMaterial;
	}

	public function getIdPedidoMaterial(){
		  return( $this->idPedidoMaterial );
	}

	public function setIdPedido( $idPedido ){
		 $this->idPedido = $idPedido;
	}

	public function getIdPedido(){
		  return( $this->idPedido );
	}

	public function setIdMaterial( $idMaterial ){
		 $this->idMaterial = $idMaterial;
	}

	public function getIdMaterial(){
		  return( $this->idMaterial );
	}

	public function setDtCompra( $dtCompra ){
		 $this->dtCompra = $dtCompra;
	}

	public function getDtCompra(){
		  return( $this->dtCompra );
	}

	public function setQtd( $qtd ){
		 $this->qtd = $qtd;
	}

	public function getQtd(){
		  return( $this->qtd );
	}

	public function setUnidadeMedida( $unidadeMedida ){
		 $this->unidadeMedida = $unidadeMedida;
	}

	public function getUnidadeMedida(){
		  return( $this->unidadeMedida );
	}

	public function setPreco( $preco ){
		 $this->preco = $preco;
	}

	public function getPreco(){
		  return( $this->preco );
	}

}


?>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
