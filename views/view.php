<?php

class View
{
    
    public function __construct() {

    }
    
    public function showDefault() {
        //include "views/index.html";
        include "views/templates/header".TEMPLATE_FILE_ENDING;  
        if (isset($_SESSION["username"])) {
            include "views/templates/login_logged".TEMPLATE_FILE_ENDING;
        }
        else {
            include "views/templates/login_unlogged".TEMPLATE_FILE_ENDING;
        }  
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