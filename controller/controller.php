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
        $action = isset($_GET['action']) ? $_GET['action'] : 'default';
        switch($action) {
            case 'tweets':
                //if(!$this->isJSONRequest())
                //    break;
                $tweets = $this->model->getTweets($_GET['language'], $_GET['celebrity']);
                $html = $this->view->showTweets($tweets);
            break;

            case 'celebrities':
               // if(!$this->isJSONRequest())
              //      break;
                $celebrities = $this->model->getCelebrities($_GET['language']);
                $html = $this->view->showCelebrities($celebrities);
            break;

            case 'index':
            default:
                $html = $this->view->showDefault();
            break;
        }
        return $html;
    }
} // END class controller

?>