<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm{
protected $errors = []; 
public function validate($email,$password){
    
    if (!Validator::email($email)){
        $this->errors['email']= 'provide a valid email address';
    }

    if (!Validator::string($password,1,8)){
        $this->errors['password']= 'wrong password';
    }
    return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field,$message){
        $this->errors[$field] = $message;
    }
}