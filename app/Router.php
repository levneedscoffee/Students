<?php
namespace StudentList;
/**
 * Роутер
 * Разбирает URL
 *
**/
class Router{
	protected $list;
	protected $isAuthorized;
	protected $controllerName;
	//protected $viewName;
	
	function __construct($list,$isAuthorized){
		$this->list=$list;
		$this->isAuthorized=$isAuthorized;
	}
	
	public function getModule(){
		$parsedUrl=parse_url($_SERVER['REQUEST_URI']);
		$explodePath=explode('/', $parsedUrl['path']);
		$module=$explodePath[count($explodePath)-1];

		if($module==''){
			$module='main';
		}
		
		return $module;
		
	}

	static function url($url){
		$explodePath = explode('/', $_SERVER['REQUEST_URI']);
		$explodePath[count($explodePath)-1]=$url;
		return implode('/', $explodePath);
	}


	public function getControllerName(){
		if (empty($this->controllerName)) {
			//Получаем текущий модуль
			$module=$this->getModule();
			//Читаем зависимости названий контроллеров и представлений от url из JSON-файла
			$list=$this->list;
			//Определяем нужный контроллер и представление
			if(array_key_exists($module,$list)){
				if ( ($list[$module]['show']=='all') or
					 (  ($list[$module]['show']=='guest') and !$this->isAuthorized  ) or
						(($list[$module]['show']=='member') and $this->isAuthorized)
				){
					$this->controllerName=$list[$module]['controller'];	
				}
				else{
					include(Util::getAbsolutePath('/public/error_pages/403.php'));
					exit;
				}
			}
			else{
				include(Util::getAbsolutePath('/public/error_pages/404.php'));
				exit;
			}
		
		}

		return $this->controllerName;
	}
}