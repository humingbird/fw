<?php
require_once(WebConf::$home_dir.'common/View.php');

class IndexView extends View{
	
	public function execute($result){
		//display
		$this->assign('test',$result['test']);
		$this->regist($result['template']);
	}	
}
