<?php

namespace Core;
use Core\App;
use Core\Database;
class Authenticator{
    public function attempt($email,$password){
        #check whether credentials matches
        $query = "select * from user where email = :email";
        
        $user = App::container()->resolve(Database::class)->query($query,['email' => $email])->find();

        if($user){
            if(password_verify($password,$user['password'])){
                $this->login(['email' => $email]);
                #redirect('/');
                return true;
        }} 
        return false;
    }

        public function login($user){
            $_SESSION['user'] = [
                'email' => $user['email']
            ];
            session_regenerate_id(true);
        }
    
        
    public function logout(){
            Session::destroy();
        }
    }