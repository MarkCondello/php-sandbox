<?php 
class Foo{
    final public function sayHelloWorld(){
        echo "Hello World <br>";
    }
}

/* the final keyword states that a class, method or property can not over written by extended classes.
Final classes can not be extended.
eg final class Foo{
     final public function sayHello(){
        echo "Hello World";
    }
}
*/
?>