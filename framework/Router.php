<?php
require_once'loadconf.php';
loadconf('web.conf.php');

//autoload
spl_autoload_register(array('Controller','autoload'));

class Controller{
	public $log;
	
	public function __construct(){
		$path = explode('/',$_SERVER['REQUEST_URI']);
		//先頭と末尾の空欄を切り取る
		array_shift($path);
		array_pop($path);
		
		//Actionクラスの呼び出し
		$result = $this->getAction($path);
	}
	
	public static function autoload($class){
		if(preg_match('/.*Action$/', $class)){
			$file = WebConf::$home_dir.'action/'.$class.'.php';
		}else if(preg_match('/.*View$/', $class)){
			$file = WebConf::$home_dir.'view/'.$class.'.php';
		}
		if(file_exists($file)){
			require_once $file;
		}
	}
	
	//Actionクラスの呼び出し
	private function getAction($path){
		if(count($path) == 1){
			$instance = new IndexAction;
		}else{
			$class_name = ucfirst($path[1]).'Action';
			$instance = new  $class_name;
		}
		//パラメータがあったら、先に取得
		$params = $this->setParams($path);
		//メソッドの選択
		if(!$path[2]){
			$result = $instance->index($params);
		}else{
			$result = $instance->$path[2]($params);
		}
		return $result;
	}
	
	private function setParams($path){
		$params = array();
		//pathのパラメータ３つ目以降をまとめて取得
		if(count($path) > 3){
			$num = 3;
			while($path[$num]){
				$params[] = $path[$num];
				$num ++;
			}
		}
		return $params;
	}
}