<?php
namespace StudentList\Controllers;
abstract class Controller{

    protected $c; //контейнер


    function __construct($container){
        $this->c=$container;
    }

}