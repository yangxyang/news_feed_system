<?php

class Controller {
    private $view = null;
    private $model = null;
    
    public function __construct($view, $model) {
        $this->view = $view;
        $this->model = $model;
    }

    /*
    final private static function isJSONRequest() {
        return $_SERVER["CONTENT_TYPE"] == "application/json; charset=utf-8";
    }
    */
    
    public function display() {
        $html = null;
        $action = isset($_POST['action']) ? $_POST['action'] : 'default';  
                
        switch($action) {
            case 'login':
                $result = $this->model->login();
                $html = $this->view->showDefault();
                break;
            case 'new_post':
                $this->model->tweet();
                $html = $this->view->showDefault();
                break;
            case 'logout':
                $this->model->logout();
                $html = $this->view->showDefault();
                break;
            case 'default':
            default:
                $html = $this->model->tweet();//print_r(get_loaded_extensions()); //$this->view->showDefault();
        }
        return $html;
    }
    
    public function displayRegistration() {
        //$myfile = fopen("log.txt", "a") ;
        //fwrite($myfile, "displayRegistration");
        $html = null;
        $action = isset($_POST['username']) ? $_POST['username'] : 'default';
        switch($action) {
            case 'default':
                //fwrite($myfile, "username not found");
                $html = $this->view->showRegistration();
                break;
            default:
                //fwrite($myfile, "username found");
                $this->model->register();
                //$html = $this->view->showDefault();
        }
        //fclose($myfile);
        return $html;
    }
} // END class controller

?>