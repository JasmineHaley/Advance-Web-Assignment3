<?php
namespace Quwius\Framework;
class DomainObject extends AbstractDomainObject{
	protected $name;
	protected $email;
	protected $password;

	public function __construct($name,$email,$pass){
		$this->name = $name;
		$this->password=$pass;
		$this->email=$email;
	}
	public function getName(){
		return $this->name;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->password;
	}
}

?>