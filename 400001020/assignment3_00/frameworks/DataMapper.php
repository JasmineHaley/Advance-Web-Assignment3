<?php
namespace Quwius\Framework;
class DataMapper extends AbstractDataMapper {
    private $selectStmt;
    private $updateStmt;
    private $insertStmt;

    public function __construct(){
        parent::__construct();
        $this->selectStmt = $this->pdo->prepare("SELECT * FROM users WHERE email=?" );
        $this->updateStmt = $this->pdo->prepare( "UPDATE users SET name=? , email=?, password=? WHERE email=?");
        $this->insertStmt = $this->pdo->prepare( "INSERT INTO users (name,email,password) VALUES( ? , ?, ?)"); 


    }
  
    protected function doCreateObject(array $raw): DomainObject
    {
        $obj = new DomainObject($raw['name'],$raw['email'], $raw['password'] );
        return $obj;
    }
    protected function doInsert(DomainObject $object)
    {
        $values = [$object->getName(), $object->getEmail(),$object->getPassword()];
        $this->insertStmt->execute($values); 
        $id = $this->pdo->lastInsertId(); 
        //$object->setEmail($email);
}
    public function update(DomainObject $object)
    {
        $values = [ $object->getName(), $object->getEmail(), $object->getPassword()];

        $this->updateStmt->execute($values); 
    }
    public function select(): \PDOStatement
    {
        return $this->selectStmt; 
    }
}
?>