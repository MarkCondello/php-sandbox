<?php 
class People {
    public $person1 = "Mike D";
    public $person2 = "Shelly B";
    public $person3 = "Geoff G";

    //props below not iterable outside of class
    protected $person4 = "John";
    private $person5 = "Jen";

    public function iterateObject(){
        echo "<p>Inside the class all property types are exposed</p>";
        foreach($this as $key => $value){
            echo  "$key => $value\n";
        }
        echo "<hr>";
    }  
}

$people = new People();
$people->iterateObject();
echo "<p>Outside the class only public property are exposed</p>";

foreach($people as $key=>$value){
    print "$key => $value\n";
}

/* iterating over an object will expose all the private and protect properties while inside the class. Like the example above;
Iterating outside the object as seen directly above will not expose the private and protected properties.*/
?>