<?php
namespace Quwius\Framework;
abstract class AbstractDomainObject{
	
	abstract function getName();
	abstract function getEmail();
	abstract function getPassword();
}

?>