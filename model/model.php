<?php

class Model
{
    // Since we don't have any data, we actually wouldn't need a model.
    
    public function __construct() {

    }
    
    private function getAPIResponse($path) {
        return file_get_contents('http://testapi.interush.net/chikuu/' . $path);
    }
    
    public function getCelebrities($language) {
        $json = $this->getAPIResponse('celebs/' . $language);
        return json_decode($json);
    }
    
    public function getTweets($language, $celebrity) {
        $json = $this->getAPIResponse('tweets/' . $celebrity . '/' . $language);
        return json_decode($json);
    }
    
    private function connectToMySQL() {
        $link = mysqli_init();
        $success = mysqli_real_connect(
           $link, 
           'localhost', 
           'root', 
           'root', 
           'USER_NEWS_FEED',
           '3306'
        );
        
        if (!$success) {
            die('MySQL Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
        }
        
        return $link;
    }
    
    public function register() {
        if(! get_magic_quotes_gpc() ) {
            $username = addslashes($_POST['username']);
            $firstname = addslashes($_POST['firstname']);
            $lastname = addslashes($_POST['lastname']);
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
        } else {
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        }
        
        $conn = $this->connectToMySQL();
        
        $gender = 'm';
        $salt = 'abc';
        
        $stmt = $conn->prepare("INSERT INTO userprofile (nickname, firstname, lastname, email, encrp_password, gender, salt) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssscs", $username, $firstname, $lastname, $email, $password, $gender, $salt);
        
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
    }
    
} // END class model

?>