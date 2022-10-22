<?php 
class User{
    // set up default props
    public function __construct(){
        echo "Constructor called <br>";
    }

    public function register(){
        echo "User registered! <br>";
    }

    public function login($username, $password){
        $this->auth_user($username, $password);
       // echo $username . " is now logged in! <br>";
    }

    public function auth_user($username, $password){
        echo "User " . $username . " is authenticated! <br>";
    }
    // code that needs to run at the end of the script
    public function __destruct(){
        echo "Destructor called <br>";
    }
}

$myUser = new User;
//$myUser->register();
$myUser->login("Mark", 1234);
?>