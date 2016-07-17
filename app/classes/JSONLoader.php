<?php
/*
*
*/
 class JSONLoader{

	//Чтение JSON-файла
	private function readJSON($filename){
		//Подключаем конфиг
		$filename=Util::getAbsolutePath($filename);
		if(!file_exists($filename)){
			throw new ConfigException("Файла $filename не существует");
		}
		//JSON->Array
		$array=file_get_contents($filename,FILE_IGNORE_NEW_LINES);
		$array=json_decode($array,true);
		
		if ($array!=NULL) {
			return $array;
		}
		else{
			throw new ConfigException("Ошибка в $filename");
		}
		
	}

	//Чтение JSON-конфига
	function getConfig(){
		return $this->readJSON('config.json');
	}

	//Чтение JSON-роутера
	function getRouter(){
		return $this->readJSON('router.json');
	}


}