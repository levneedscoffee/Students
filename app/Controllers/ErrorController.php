<?php
namespace StudentList\Controllers;

/**
 * Показывает страницу HTTP-ошибки
 */
class ErrorController extends ViewController{

    public function errorAction(){
        $errorCode=isset($_GET['code']) ? strval($_GET['code']) : 404; //нужно ли задавать по-умолчанию 404 или выводить ошибку вызова контроллера?
        $this->viewName='http_error';
        
        //Переменные, используемые в представлении
        $router=$this->router;
        $this->render(compact('router','errorCode'));
    }

}