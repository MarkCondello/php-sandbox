<?php 
    spl_autoload_register(function($class_name){
        //loads in all classes in the same directory
        include $class_name . '.php';
    });

    $foo = new Foo();
    $bar = new Bar();

    $foo->sayHelloWorld();
   // $bar->sayHelloWorld();  
    $bar->sayHello();
    /*spl_autoload_register will allow PHP to load in all classes in a folder instead of requiring classes like this:
    include 'foo.php';
    include 'bar.php';
*/
?>