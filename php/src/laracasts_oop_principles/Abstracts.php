<?php

abstract class AchievementType
{
    public function name()
    {
        $class = (new ReflectionClass($this))->getShortName();
        return trim(preg_replace('/[A-Z]/', ' $0', $class));
    }

    public function icon()
    {
        return strtolower( str_replace(' ', '-', $this->name()) ) . '.png';
    }

    //forces all extended classes to include the qualifier methodjiollloi
    abstract public function qualifier($user);
}

class FirstThousandPoints extends AchievementType
{
    public function qualifier($user)
    {
        // TODO: Implement qualifier() method.
    }
}

class FirstBestAnswer extends AchievementType
{
    public function qualifier($user)
    {
        // TODO: Implement qualifier() method.
    }
}

print_r((new FirstBestAnswer())->icon());

/*
an abstract class ensures that its methods and properties are inherited with the extends keyword. It can have properties and its methods can have a body area.
an interface class ensures that classes implementing it use the methods it contains. Its methods do not contain a body and it can not have properties.
*/