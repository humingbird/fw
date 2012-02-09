<?php

//autoload
spl_autoload_register(array('Controller','autoload'));

class Controller{
	public $log;
	public $path;
	
	public function __construct(){
		$this->path = explode('/',$_SERVER['PATH_INFO']);
	}
	
	public static function autoload($class){
		$file = HOME_DIR.'controller/'.$class.'.php';
		if(file_exists($file)){
			require $file;
		}
	}
	
	public function getLog(){
		if( !isset($this->log) ){
			if(strcmp('',$this->path)==0){
				$this->log = new Log('log/index',4);
			}else{
				$this->log = new Log('log/'.$path[1],4);
			}
		}
		return $this->log;
	}
}