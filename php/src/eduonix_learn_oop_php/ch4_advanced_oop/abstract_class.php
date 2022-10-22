<?php 
/* Abstract classes are not meant to be instantiated but instead extended. Abstract classes are not used much but it is worth knowing what they do and how to use them.
Only the extended class can be instantiated, not the abstract class. In this case Duck and Dog are instantiated classes. */
abstract class Animal{
    public $name;
    public $colour;

    public function describe(){
        return $this->name . ' is ' . $this->colour . '<br>';
    }
    abstract public function makesound();
}

class Duck extends Animal{
    public function describe(){
        return parent::describe();
    }
    public function makesound(){
        return "Quack!";
    }
}

class Dog extends Animal{
    public function describe(){
        return parent::describe();
    }
    public function makesound(){
        return "Bark!";
    }
}
//$animals = new Animal(); // Fatal error: Uncaught Error: Cannot instantiate abstract class Animal
$animal = new Duck();
$animal->name = "Ben";
$animal->colour = "Yellow";
echo $animal->describe();
echo $animal->makesound();
echo "<hr>";
$dog = new Dog();
$dog->name = "Ben";
$dog->colour = "Brown";
echo $dog->describe();
echo $dog->makesound();

?>