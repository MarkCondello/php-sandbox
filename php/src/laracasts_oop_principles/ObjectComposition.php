<?php

class Subscription
{
    protected Gateway $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function create()
    {
    }

    public function cancel()
    {
        //api request
        //find stripe customer
        //find stripe subscription by customer
    }

    public function invoice()
    {
    }

    public function swap($newPlan)
    {

    }

//    private function findStripeCustomer(){}
//    private function findStripeSubscriptionByCustomer(){}
}

interface Gateway {
    public function findCustomer();
    public function findSubscriptionByCustomer();
}

class StripeGateway implements Gateway
{
    public function findCustomer()
    {
    }
    public function findSubscriptionByCustomer()
    {
    }
}

class BrainTreeGateway implements Gateway
{
    public function findCustomer()
    {
    }
    public function findSubscriptionByCustomer()
    {
    }
}

new Subscription(new StripeGateway());
new Subscription(new BrainTreeGateway());

/* Object composition is basically abstracting out details of a class to their respective Objects so that it is more modular and flexible to re-use.
In this example we use an Interface which allows the extension of Gateway which can be used by any billing provider.