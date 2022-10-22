<?php

class Video
{

}

class User
{
    public function download(Video $video)
    {
        if(! $this->subscribed()){
            throw new  Exception('You must be subscribed to download videos');
        }
        echo "Here is youre download";
    }

    public function subscribed(){
        return false;
    }
}


class UserDownloadsController{
    public function show(){
         try {
            (new User)->download(new Video);

        } catch (Exception $e) {
            echo "Unauthorised" . $e;
        }
    }
}

(new UserDownloadsController())->show();

//predefined exceptions - Invalid
function add($one, $two)
{
    if (!is_float($one) || !is_float($two)) {
        throw new InvalidArgumentException("Please provide a number");
    }

    return $one + $two;
}

try {
    //echo add(2,'two');
} catch (InvalidArgumentException $e) {
    echo 'Duh daaa. ' . $e;
}
