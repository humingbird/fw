<?php
require_once 'Smarty.class.php';

class View{
	public $smarty;
	
	public function __construct($result){
		$this->smarty = new Smarty;
		
		$this->smarty->template_dir = WebConf::$templates_dir;
		$this->smarty->compile_dir = WebConf::$templates_c_dir;
		
		$this->setParams($result);
	}
	
	public function assign($key,$value){
		$this->smarty->assign($key,$value);
	}
	
	public function regist($template){
		$this->smarty->display($template);
	}
	
	public function setParams($result){
		if(is_array($result)){
			foreach($result as $key=>$value){
				if($key != 'template'){
					$this->assign($key,$value);
				}else{
					$this->regist($value.'/'.$value.'.php');
				}
			}
		}
	}
}
