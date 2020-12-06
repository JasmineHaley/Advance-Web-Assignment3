<?php
namespace Quwius\Framework;
class RequestHandlerFactory implements RequestHandlerFactory_Interface{
	
	
	public static function makeRequestHandler(): AbstractCommandPageController{
	
		$parsed_url = parse_url($_SERVER['REQUEST_URI']);
			
			if (!isset($parsed_url['query'])){
				$parsed_url['query'] = 'index';
			}
		
		$class = "Apps\\handlers\\" . UCFirst(strtolower($parsed_url['query'])) . "Controller";
		if (! class_exists($class)) {
			throw new CommandNotFoundException("no '$class' class located");
		}
		$cmd = new $class(); // the receiver can go here
		return $cmd;
	}

	
}
?>