<?php

class View
{
    
    public function __construct() {

    }
    
    public function showDefault() { 
        if (isset($_SESSION["username"])) {
            return $this->showLoggedIn();
        }
        else {
            return $this->showLoggedOut();
        }  
    }
    
    private function showLoggedIn() {
        include "views/templates/header".TEMPLATE_FILE_ENDING;  
        include "views/templates/login_logged".TEMPLATE_FILE_ENDING;
        include "views/templates/main".TEMPLATE_FILE_ENDING;
    }
    
    private function showLoggedOut() {
        include "views/templates/header".TEMPLATE_FILE_ENDING;  
        include "views/templates/login_unlogged".TEMPLATE_FILE_ENDING;
        include "views/templates/main".TEMPLATE_FILE_ENDING;
    }
    
    public function showRegistration() {
        include "views/register.html";
    }
    
    public function showCelebrities($celebrities) {
        include "views/templates/celebrities".TEMPLATE_FILE_ENDING;
    }
    
    public function showTweets($tweets) {
        include "views/templates/tweets".TEMPLATE_FILE_ENDING;
    }
    
} // END class view

?>