<?php 
/* --- Object Oriented Programming -- */

/*
  From PHP5 onwards you can write PHP in either a procedural or object oriented way. OOP consists of classes that can hold "properties" and "methods". Objects can be created from classes.
*/
class User {
  protected $name;
  protected $email;
  protected $password;

  public function __construct($name, $email, $password)
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getMessage($msg = 'GGF!')
  {
    return $this->name . ' says ' . $msg;
  }
}

class Employee extends User {
  public $title;
  
  public function __construct($name, $email, $password, $title){
    parent::__construct($name, $email, $password);
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
}

$u1 = new User('Bill', 'bg@goo.com', 'password');
$e2 = new Employee('Goon', 'goon@goo.com', 'bjpassword', 'Lacky');
var_dump($u1);
echo '<br>';
echo $e2->getMessage('Hi...') . '<br><br>';
echo ($e2->getTitle());

?>