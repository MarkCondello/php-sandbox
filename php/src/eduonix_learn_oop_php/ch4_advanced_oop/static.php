<?php 

Class User{
    public $username;
    public static $minPassLength = 5;

    public static function validationPassword($password){
        if(strlen($password) >= self::$minPassLength){
            return true;
        } else {
            return false;
        }
    }
}

echo "Min password length: " . User::$minPassLength . "<br>";
$isMinLength = User::validationPassword(12345);
if($isMinLength):
    echo "Valid pw";
else:
    echo "invalid pw";
endif;
;

/*static can not be instantiated
anything defined as static can only be accessed with the self:: keyword which is static binding
we do not access method or properties by instantiating eg:
$newUser = new User;
$newUser->validatePassword
Instead we use the Classname :: property or method

:: scope resolution operator
*/