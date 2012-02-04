<?php

//autoload
spl_autoload_register(array('Index','autoload'));

/**
 * 
 */
class Index {
	function __construct() {
		$this->index();
	}
	
	public static function autoload($class){
			$file = HOME_DIR.'controller/include/'.$class.'.php';
		if(file_exists($file)){
			require $file;
		}
	}
	
	public function index(){
		$path = explode('/',$_SERVER['PHP_SELF']);
		$class_name = ucfirst(basename($path[2],'.php')).'Controller';
		$exec = new $class_name;
		
		return $exec;

	}
	
}

?>