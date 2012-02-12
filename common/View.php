<?php
require_once 'Smarty.class.php';

class View{
	public $smarty;
	public function __construct(){
		$this->smarty = new Smarty;
		
		$this->smarty->template_dir = WebConf::$templates_dir;
		$this->smarty->compile_dir = WebConf::$templates_c_dir;
	}
	
	public function assign($key,$value){
		$this->smarty->assign($key,$value);
	}
	
	public function regist($template){
		$this->smarty->display($template);
	}
}
