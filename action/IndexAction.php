<?php

class IndexAction{
	public function index($params){
		$result['test'] = "index(何も指定しない場合)ページ";
		$result['template'] = 'index.html';
		return $result;
	}
	
	public function info($params){
		$result['test'] = "infoパラメータを与えたページ";
		$result['template'] = 'infomation.html';
		return $result;
	}
}
