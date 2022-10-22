<?php 
class Post{
    private $name;

    public function __set($name, $value){
        //echo "Setting " . $name . " to <strong>" . $value . "</strong><br>";
        $this->name = $value;
    }

    public function __get($name){
        echo "Getting {$name} = <strong>" . $this->name . "</strong><br>";
    }

    public function __isset($value){
        echo "Is " . $value . " set?<br>";
        return isset($value);
    }
}

$post = new Post;
$post->name = "Postman!";
$post->name;

$isset = isset($post->name);
echo  $isset ? "True" : "False";
?>