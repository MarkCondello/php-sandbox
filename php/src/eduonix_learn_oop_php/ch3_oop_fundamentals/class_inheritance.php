<?php 
class First{
    public $id = 23;
    protected $name = "John Doe";

    public function saySomething($word){
        echo $word . " <br>";
    }
}

class Second extends First{
    protected $name = "Jane Does";

    public function getName(){
        echo $this->name;
    }

}

$second = new Second();
$second->saySomething("Hello You!");
$second->getName();

/* protected accesor allows the props to be used by extended classes, private does not and can only be called on the class it is created in. */
?>