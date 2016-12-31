<?php

class View
{
    
    public function __construct() {

    }
    
    public function showDefault() {
        include "views/index.html";
    }
    
    public function showCelebrities($celebrities) {
        include "views/templates/celebrities".TEMPLATE_FILE_ENDING;
    }
    
    public function showTweets($tweets) {
        include "views/templates/tweets".TEMPLATE_FILE_ENDING;
    }
    
} // END class view

?>