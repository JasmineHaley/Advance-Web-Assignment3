<?php

use Quwius\Framework\Observable_Model;
use Quwius\Framework\InsertTrait;
use Quwius\Framework\DataMapper;
use Quwius\Framework\DomainObject;
//require'autoloader.php';
class SignUpModel extends Observable_Model {
	
	public function insert (array $values){
		
		$name = $values["name"];
		$email=$values["email"];
		$password= password_hash($values["password"],PASSWORD_DEFAULT);
		
		$obj = new DomainObject($name,$email,$password);
	
		$data = new DataMapper();
		$data->insert($obj);
		
	}
	
	public function findAll():array{
		$json=json_decode($this->loadData('users'),true);
		$users=[];
		for($i = 0; $i < (count($json)-1);$i++){
			$users[$i]= $json[$i]["name"];
 		}
 		
 		return $users;
 		
	}
	
	public function findRecord(string $id):array{
		
  		return [];
	}

}
?>