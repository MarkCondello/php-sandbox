<?php 
class User{
    public $id = 666;
    private $username;
    public $email;
    public $password;

    // set up default props
    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
        echo "Constructor called <br>";
    }

    public function register(){
        echo "User registered! <br>";
    }

    public function login(){
   
        $this->auth_user();
       // echo $username . " is now logged in! <br>";
    }

    public function auth_user(){
        echo "User " . $this->username . " is authenticated with id=" . $this->id ." and password= ".$this->password."! <br>";
    }
    // code that needs to run at the end of the script
    public function __destruct(){
        //echo "Destructor called <br>";
    }
}

$myUser = new User("Markamus", 1234);
//$myUser->register();
$myUser->login();
//echo $myUser->username . " LOADED PUBLICLY<br>"; // Throws an error, private prop
?>