<?php

class Collection
{
    protected $items;

    public function __construct(Array $items)
    {
        $this->items = $items;
    }

    public function sum($key)
    {
         if(key_exists($key, $this->items[0])):
           return array_reduce($this->items, function($carry, $item) use ($key){
                return $carry += $item->$key;
        }, 0);
        else :
            throw new Exception("The key value $key does not exist");
        endif;
    }
}

class VideosCollection extends Collection
{
    public function length()
    {
        return $this->sum('length');
    }
}

class Videos
{
    public $title;
    public $length;

    public function __construct($title, $length)
    {
        $this->title = $title;
        $this->length = $length;
    }
}

$videos = new VideosCollection([
            new Videos('Texas Chansaw Massacre', 160),
            new Videos('The Crow', 120),
            new Videos('Fight Club', 140),
        ]
    );

echo "Total Video Collection Length: " . $videos->length() . " minutes<br>";


class CoffeeMaker
{
    public function brew()
    {
        var_dump('Brewing coffeee.');
    }
}

class SpecialtyCoffeeMaker extends CoffeeMaker
{
    public function brewLate()
    {
        var_dump("Brewing a cafe late.");
    }
}

//(new SpecialtyCoffeeMaker())->brew();
//(new SpecialtyCoffeeMaker())->brewLate();