<?php
//namespace Apps\handlers;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\DataMapper;
use Quwius\Framework\DomainObject;

class LoginModel extends Observable_Model {
	
	public function findAll():array{
    $conn=$this->makeConnection();
	$sql= "SELECT * FROM users ";
	$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$users[]=$row["name"];
		}
 		
 		
 		return $users;
	}

	public function findRecord(string $id):array{
		$data = new DataMapper();
		$obj=$data->find($id);
		//var_dump($obj->getName());
		if(empty($obj)){
			return [];
		}
		return ['name'=> $obj->getName(), 'email'=> $obj->getEmail(),'password'=>$obj->getPassword()];
		
}

}
?>