<?php
namespace Quwius\Framework;
class FrontController extends AbstractFrontController{
   
    

    public static function run(){
	$instance = new FrontController();
	$instance->init();
	 $instance->handleRequest();
	}

   public function init(){
	//$this->reg->getApplicationHelper()->init();
	 }
    protected function handleRequest(){
			$context = new CommandContext();
		
			
				$handler = RequestHandlerFactory :: makeRequestHandler();
  
			
			if($handler->execute($context)===false){
				//add error message
			}


	} 
}

?>
