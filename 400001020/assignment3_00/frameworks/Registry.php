<?php
namespace Quwius\Framework;

class Registry{
	private static $instance=null; 
	private $values = [];
    protected $session = null;
    protected $validate = null;
    protected $config = null;
    protected $pdo = null;
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

    public function getSession(){
    	if (is_null($this->session)) { 
			$this->session = new SessionManager();
		}
		return $this->session;

    }
    public function getConfig(){
    	if (is_null($this->config)) { 
			$this->config = new Configuration();
		}
		return $this->config;

    }
   public function getPdo(){
   		if (is_null($this->pdo)) { 
			$this->pdo = new \PDO('mysql:host=localhost;port=3306;dbname=mooc','root',"");
		}
		return $this->pdo;
   }

     public function getValidate(){
    	if (is_null($this->validate)) { 
			$this->validate = new Validator();
		}
		return $this->validate;

    }
    public function set(string $key, $value){
		$this->values[$key] = $value; 
	}


}

?>