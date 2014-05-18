<?php

abstract class Controller{
    const AUTO_SHOWVIEW_OFF = 1;
    public  $_config;
    public  $_request;
    public  $_model;
    public  $_view;
    public  $_defaultViewName;
    public  $_viewname = "";
    private $_controllerName;

    public  $_opdata = array();

    public function __construct(){}

    public function index(){}

    public final function setConfig($config){
        $this->_config = $config;
    }
    public final function setRequest($request){
        $this->_request = $request;
    }
    public final function setModel($modelname){
        $this->_model = new $modelname($this->_config);
    }
    public final function setView($controller , $action){
        $this->_view = new lib_view($this->_config);
        $this->_defaultViewName = $controller . "/" . $action;
        $this->_controllerName = $controller;
    }
    public final function setCustomerView($action){
        $this->_viewname = $this->_controllerName . "/" . $action;
    }
    public final function _action($actionName){
        if(!$this->$actionName() == AUTO_SHOWVIEW_OFF){
            Log::write("--inner View Name:" . $this->_viewname);
            $this->showView();
        }
    }
    public final function showView($viewname = NULL , $controllerName = NULL){
        if(empty($controllerName)){
            if(empty($viewname)){
                if($this->_viewname != ""){
                    $viewname = $this->_viewname;
                }else{
                    $viewname = $this->_defaultViewName;    
                }
            }else{
                $viewname = $this->_controllerName . '/' . $viewname;
            }
        }else{
            $viewname = $controllerName . '/' . $viewname;
        }
        
        $this->_view->init( ROOT. '/app/View/' . $viewname .'.php' , $this->_opdata);
        $this->_view->render();
    }

}    

?>