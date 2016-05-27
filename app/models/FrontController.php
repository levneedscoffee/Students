<?php
/**
 * Главный контроллер
 * Решает, какой подконтроллер использовать и какие виды показывать
 *
 *
 * Вероятно, подконтроллер возвращает нужное представление, а маршрутизатор его вызывает
**/
class FrontController{
	function Start(){

		//Подключаем конфиг
		$config=config();
		
		//////
		//Авторизация
		
		if (isset($_COOKIE['hash'])){
			$db=new DataBase($config['db']);
			$table=new StudentDataGateway($db->connection());
				
			$authorized=$table->getStudentByHash($_COOKIE['hash']);
			
			if ($authorized){
				//Для вида
				$userName=$authorized['user'];
				$userSName=$authorized['suser'];
				$userEmail=$authorized['email'];
			}
			//$authorized=true; //костыльчик
		}
		else{
			$authorized=false;
		}
		
		//Роутер
		$router=new Router();
		$module=$router->getModule();
		var_dump($authorized);
		var_dump($module);
		//Подключаем файл ассоциаций адреса и контроллеров с представлениями
		$routing=router();
		var_dump($routing);
		
		//Определяем нужный контроллер и представление
		if(array_key_exists($module,$routing)){
			if ( ($routing[$module]['show']=='all') or
				 (  ($routing[$module]['show']=='guest') and !$authorized  ) or
					(($routing[$module]['show']=='member') and $authorized)

			){
				$controller=$routing[$module]['controller'];
				$view=$routing[$module]['view'];					
			}
			else{
				$controller=$routing['403']['controller'];
				$view=$routing['403']['view'];				
			}
		}
		else{
			$controller=$routing['404']['controller'];
			$view=$routing['404']['view'];
		}

		
		//Подключаем контроллер
		if (!empty($controller)){
			include($config['path']['controllers'].$controller.'.php');
		}

		//Подключаем вид
		if (!empty($view)){
			include($config['path']['views'].$view.'.php');
		}

	}
}