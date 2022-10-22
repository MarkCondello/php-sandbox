<?php 
Class User{
    private $id = 666;
    private $username;
    protected $email = "foo@con.com";
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
        echo "Constructor called <br>" ;
    }
    // __set magic method allows the updating of private properties
    public function __set($prop, $args){
        echo "Prop: " . $prop . "<br>";
        if($args["id"]):
            echo "Setting " . $this->username . ' to Id: ' .  $args["id"] . "<br>";
            $this->id = $args["id"];
        endif;

        if($args["username"]):
            echo "Setting " . $this->username . ' to username: ' . $args["username"] . "<br>";
            $this->username = $args["username"];
        endif;  
    }
    public function __get($name){
        echo "Getting " . $this->$name  .  " {$name} value <br>";

    }
    public function __isset($property){
        echo "Is " . $property . " set?<br>";
        return isset($this->$property);
    }
    public function register(){
        echo "User registered <br>" ;
    }
    public function login(){
        $this->auth_user();
        //echo $this->username . " is now logged in.<br>";
    }
    public function auth_user(){
        echo "<br/>".$this->username . " is authenticated with id: " . $this->id . ".<br>";
    }
    public function __destruct(){
        //echo "Destructor called";
    }
}

$User = new User("Mark Condello", 123);

$User->id = array("id" => 666, "username" => "Markamillion") ; // uses the __set magic method to update id private property
echo $User->username; // uses __get magic method to get users id private property
echo $User->password;
echo $User->email;

/* 
$idSet = isset($User->id); // we can use isset() method along with the magic method __isset() to check if a property is set
echo "ID is set: ". (boolval($idSet) ? "TRUE" : "FALSE");
//$User->register();
$User->login();   */

//echo $User->username; // not accessible
//var_dump(isset($User->id));
/* Class NewUser extends User{
    public function getEmail(){
        echo $this->email . " is registered.";
     }
};

$NewUser = new NewUser("MarkamusArelius", 567);
echo "<hr>";
$NewUser->auth_user();
$NewUser->password;
$NewUser->getEmail(); */
?>