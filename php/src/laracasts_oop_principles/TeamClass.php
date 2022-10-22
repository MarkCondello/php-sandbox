<?php 

//find the nouns to create a class
class Team{

    protected $name;
    protected $members = [];
    protected $options = [];

    public function __construct($name, $members = [], $options = []){
        $this->name = $name;
        $this->members = $members;
        $this->options = $options;
    }

    //the public static method grabs the default params from the constructor using destructuring
    //public static method provides a nice readable way to create an object
    public static function start(...$args){
        //returning a new Team instance
        return new static(...$args);
    }

    public function name(){
        return $this->name;
    }

    public function members(){
        return $this->members;
    }

    public function add($member){
        $this->members[] = $member;
    }

    public function cancel(){}
    public function manager(){}
}

class Member {
    protected $name;
    protected $personality;

    public function __construct($name, $personality = ""){
        $this->name = $name;
        $this->personality = $personality;
    }
    public static function create(...$args){
        return new static(...$args);
    } 
}

$dcode = Team::start("DCode Group", [Member::create("Andrew", "Positive, pro-active"), new Member("Alex", "Opinionated, intelligent"), new Member("Lee", "Reserved and resistant."), new Member("Sam", "Confident, Honest"), new Member("Luke", "Childish and outspoken")], [
    'skillset' => 'custom software, laravel, squarespace',
    'team-size' => 6,
]);
print_r($dcode);
echo "<br><hr>";

//$newTeam = new Team("New team");
$newTeam = Team::start("New Team", [Member::create("Mark", "Reserved and hard-working"), Member::create("Tyler", "Optimistic")]);
echo "<pre>";
print_r($newTeam->members());
echo "</pre>";

//$bombers = new Team("Bombers", [ Member::create("Whoosha"), new Member("Hurls")]) ;
//echo $bombers->name( ) . '<br>';
//$bombers->add(new Member("Anothony McDonal Tippungwhutti"));
//$bombers->add(new Member("Joe joe"));
//$members = $bombers->members();
//print_r($members)  ;
?>