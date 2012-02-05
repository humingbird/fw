<?php
/*
 * Log
 */
class Log{
	protected $levels = array(
		0 => 'FATAL',
		1 => 'ERROR',
		2 => 'WARN',
		3 => 'INFO',
		4 => 'DEBUG'
	);
	
	protected $directory;
	
	//コンストラクタ
	public function __construct($directory, $level = 4){
		$this->setDirectory($directory);
		$this->setLevel($level);
	}
	
	public function setDirectory($directory){
		$path = HOME_DIR.$directory;
		if( file_exists($path) ){
			$this->directory = $path;
		}else{
			$this->directory = false;
		}
	}
	
	public function getDirectory(){
		return $this->directory;
	}
	
	public function setLevel($level){
		$l = (int)$level;
		if($l >= 0 && $l <= 4){
			$this->level = $l;
		}else{
			throw new InvalidArgumentException('Invalid Log Level.');
		}
	}
	
	public function getLevel(){
		return $this->level;
	}
	
	//debug
	public function debug($data){
		$this->log($data,4);
	}
	
	//info
	public function info($data){
		$this->log($data,3);
	}
	
	public function warn($data){
		$this->log($data, 2);
	}
	
	public function error($data){
		$this->log($data, 1);
	}
	
	public function fatal($data){
		$this->log($data, 0);
	}
	
	public function getFile(){
		return $this->getDirectory().strftime('%Y%m%d').'.log';
	}
	
	protected function log($data,$level){
		$dir = $this->getDirectory();
		if( $dir == false){
			throw new RuntimeException("Log directory '$dir' invalid.");
		}
		if($level <= $this->getLevel()){
			$this->write(sprintf("[%s] %s - %s\n", $this->levels[$level],date('c'),(string)$data));
		}
	}
	protected function write( $data ){
		file_put_contents($this->getFile(), $data, FILE_APPEND |LOCK_EX);
	}
}
