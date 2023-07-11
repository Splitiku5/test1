<?php 

namespace Test\Validator;

class Validator
{
    static function isValidEmail(string $email) : bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    static function isValidText(string $text) :bool
    {
        if($text === '')
        {
            return false;
        }
        return true;
    }
}