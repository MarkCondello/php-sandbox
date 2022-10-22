<?php

//class TennisMatch
//{
//    public function score()
//    {
//    }
//
//    protected function hasWinner()
//    {
//    }
//
//    protected function hasAdvantage()
//    {
//    }
//
//    protected function inDeuce()
//    {
//    }
//}

class Person {
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function job(){
        return "FED.";
    }

    private function thingsThatIWontShare(){
        return "I see the pandemic as a positive change to the World. It will force us to review what we think is necessary while thinning out the population of the weak, unhealthy and old. I have imposter syndrome as well...";
    }

    public function getSecrets(){
        return $this->thingsThatIWontShare();
    }

}

$bob = new Person('Bob');
echo $bob->job();
echo $bob->getSecrets();