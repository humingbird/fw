<?php

//autoload
spl_autoload_register(array('Controller','autoload'));

class Controller{
	public $log;
	
	public function __construct(){
	}
	
	public static function autoload($class){
		$file = HOME_DIR.'controller/'.$class.'.php';
		if(file_exists($file)){
			require $file;
		}
	}
	
	public function getLog(){
		if( !isset($this->log) ){
			$this->log = new Log('log/',4);
		}
		return $this->log;
	}
}