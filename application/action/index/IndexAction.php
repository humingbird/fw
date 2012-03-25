<?php
require_once(WebConf::$home_dir."common/Action.php");

class IndexAction extends Action{

	public function index($params){
		//resultに要素を入れる
		$result['test'] = "index(何も指定しない場合)ページ";
		$result['template'] = 'index.html';

		//assignする作業だけする
		$this->execute($result);
	}
	
	public function info($params){
		$result['info'] = "infoパラメータを与えたページ";
		$result['template'] = 'infomation.html';
		//assignする作業だけする
		$this->execute($result);
	}
}
