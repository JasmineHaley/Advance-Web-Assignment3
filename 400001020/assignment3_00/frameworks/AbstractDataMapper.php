<?php
namespace Quwius\Framework;
abstract class AbstractDataMapper {
	
	protected $pdo;

	public function __construct(){
		$servername = "localhost";
		$username = "root";
		$password = " ";
		$dbname = "mooc";
		$reg = Registry :: instance(); 
		$this->pdo = $reg->getPdo();
		
	}

	public function find( $email){
		$this->select()->execute([$email]);
		$row = $this->select()->fetch();
		$this->select()->closeCursor();

		if(!is_array($row)){
			return null;
		}
		if(!isset($row['email'])){
			return null;
		}

		$object = $this->createObject($row);
		return $object;
	}

	public function createObject(array $raw): DomainObject{
		return $this->doCreateObject($raw);
	}

	public function insert(DomainObject $object){
		$this->doInsert($object);
		
	}

	abstract protected function update(DomainObject $obj);
	abstract protected function doCreateObject(array $raw): DomainObject;
	abstract protected function doInsert(DomainObject $obj);
	abstract protected function select(): \PDOStatement;


}