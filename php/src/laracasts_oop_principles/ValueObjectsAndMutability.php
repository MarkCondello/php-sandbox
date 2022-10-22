<?php


class Age {
    //public $age;
    private $age;
    public function __construct($age)
    {
        if ($age < 0 || $age > 120){
            throw new InvalidArgumentException("That makes no sense");
        }
        $this->age = $age;
    }

    public function increment(){
        //immutable method, creates a new copy of the current object to update from
       return new self($this->age++);
    }

    public function get(){
       return $this->age;
    }
}
function register(string $name, Age $age){

}

$age =  new Age(33);
$olderage = $age->increment();
echo $age->get() . '<br>';
echo $olderage->get() . '<br>';

//$age->age = 500;
register('John Doe', $age);