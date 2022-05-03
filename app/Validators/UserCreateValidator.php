<?php

namespace App\Validators;

class UserCreateValidator
{
    public $errors = [];

    public function __construct(object $request)
    {
        $usernameLen = strlen($request->username);

        if($usernameLen < 4 || $usernameLen > 12){
            $this->errors['username'] = "Username invalido!";
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "E-mail invalida!";
        }
        
        if(strlen($request->password) < 8){
            $this->errors['password'] = "Senha invalida!";
        }

    }

}