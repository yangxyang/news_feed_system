<?php

class Model
{
    private $mongo = null;
    
    public function __construct() {
        $mongo = new MongoDB();
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
        
        return $this->mongo->tweet();
    }
    
    private function connectToMySQL() {
        //$myfile = fopen("log.txt", "a") ;
        //fwrite($myfile, "connectToMySQL");
        
        $link = mysqli_init();
        $success = mysqli_real_connect(
           $link, 
           'localhost', 
           'root', 
           'mysql', 
           'USER_NEWS_FEED',
           '3306'
        );
        
        if (!$success) {
            //fwrite($myfile, "failed");
            die('MySQL Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
        }
        else{
            //fwrite($myfile, "successful");
        }
        //fclose($myfile);
        return $link;
    }
    
    public function register() {
        //$myfile = fopen("log.txt", "a") ;
        //fwrite($myfile, "register");
        
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
        
        $stmt = $conn->prepare("INSERT INTO userprofile (nickname, firstname, lastname, email, encrp_password, gender, salt) VALUES (?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("sssssss", $username, $firstname, $lastname, $email, $password, $gender, $salt);
        //fwrite($myfile, "prepare statement");
        $stmt->execute();
        //fwrite($myfile, "execute statement");
        $stmt->close();
        $conn->close();
        //fclose($myfile);
    }
    
    public function login() {
        if(! get_magic_quotes_gpc() ) {
            $username = addslashes($_POST['user']);
            $password = addslashes($_POST['pass']);
        } else {
            $username = $_POST['user'];
            $password = $_POST['pass'];
        }
        $conn = $this->connectToMySQL();
        
        $stmt = $conn->prepare("SELECT encrp_password FROM userprofile WHERE nickname = ?;");
        $stmt->bind_param("s", $username);
        
        $stmt->execute();
        
        $stmt->store_result();
        if ($stmt->num_rows() == 0) {
            return 'user_not_found';
        }
        
        $stmt->bind_result($stored_password);
        $stmt->fetch();
        
        if ($stored_password != $password) {
            return 'password_incorrect';
        }
        
        session_start();
        $_SESSION["username"] = $username;
        return 'login_success';
    }
    
    public function logout() {
        if (isset($_SESSION["username"])) {
            session_unset(); 
            session_destroy();
        }
    }
    
} // END class model

?>