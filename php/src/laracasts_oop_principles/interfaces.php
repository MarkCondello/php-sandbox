<?php

interface Newsletter
{

    public function subscribe($email);
}

class CampaignMonitor implements Newsletter
{
    public function subscribe($email)
    {
        die("subscribing with CampaignMonitor");

    }
}

class Drip implements Newsletter
{
    public function subscribe($email)
    {
        die("subscribing with Drip");
    }
}


class NewsletterSubscriptions
{
    public function store(Newsletter $newsletter )
    {
        //
        $email = 'joe@example.com';
        $newsletter->subscribe($email);
    }
}

$controller = new NewsletterSubscriptions();
$controller->store(new Drip());

/* an interface class ensures that classes implementing it use the methods it contains. Its methods do not contain a body and it can not have properties.
an abstract class ensures that its methods and properties are inherited with the extends keyword. It can have properties and its methods can have a body area.
*/