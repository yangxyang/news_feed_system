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
        $action = isset($_POST['user']) ? $_POST['user'] : 'default';
        switch($action) {

            case 'default':
                $html = $this->view->showDefault();
                break;
            default:
                $myfile = fopen("log.txt", "a") ;
                $result = $this->model->login();
                $html = $this->view->showDefault();
                fwrite($myfile, $html);
                fclose($myfile);
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