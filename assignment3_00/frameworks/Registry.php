<?php
namespace Quwius\Framework;

class Registry{
	private static $instance=null; 
	private $values = [];
    
    public static function instance(): self{
		if (is_null(self::$instance)) { 
			self::$instance = new self();
		}

        return self::$instance;
    }
   
    public function get(string $key){
		if (isset($this->values[$key])) {
			return $this->values[$key];
		}
        return null;
    }
    public function set(string $key, $value){
		$this->values[$key] = $value; 
	}

}

?>