<?php

require 'vendor/autoload.php';

class MongoDB
{    
    public function __construct() {

    }
    
    public function tweet() {
        if (!isset($_SESSION["username"])) {
            return;
        }
        if(! get_magic_quotes_gpc() ) {
            $message = addslashes($_POST['message']);
        } else {
            $message = $_POST['message'];
        }
        $username = $_SESSION["username"];
    }
    
    private function connect() {
        try
        {
            $client = new MongoDB\Client("mongodb://localhost:27017");
            return $client;
        }
        catch ( MongoConnectionException $e )
        {
            echo '<p>Couldn\'t connect to mongodb, is the "mongo" process running?</p>';
            exit();
        }
    }
    
    public function insertTweet($message, $username) {
        $db = $this->connect();
        return 'success';
    }
    
    
} // END class mongodb

?>