<?php
class Action{
	
	//viewのクラスを呼び出す
	public function execute($result){
		$path = explode('.', $result["template"]);
		
		if(!$path[0]){
			$instance = new IndexView;
		}else{
			$class_name = ucfirst($path[0]).'View';
			$instance = new $class_name;
			
			$instance->indexExecute($result);
		}
	}
}
