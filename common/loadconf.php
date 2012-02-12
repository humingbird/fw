<?php

require_once(getenv("CONF")."env.conf.php");

function loadconf($filename){
	$conf_dir = getenv("CONF");
	$file = $conf_dir.$filename;
	
	if(file_exists($file)){
		require_once($file);
	}
	
	if(EnvConf::$env = 'defalut'){
		require_once $conf_dir.'default.conf.php';
	}

}
