<?php
require_once(WebConf::$home_dir.'common/View.php');

class IndexView extends View{
	
	public function indexExecute($result){
		//display
		if(isset($result['test'])){
			$this->assign('test',$result['test']);
		}
		$this->regist($result['template']);
	}

	public function infoExecute($result){
		if(isset($result['info'])){
			$this->regist($result['info']);
		}
		$this->regist($result['template']);
	}
}
