<?php
namespace Quwius\Framework;
class Configuration {
 
 public function __construct(){
    if (file_exists('config.php')) {
      require 'config.php';
   }
 }

	/*public function getInstance(){
  		 return new Configuration();
	}*/
}
?>