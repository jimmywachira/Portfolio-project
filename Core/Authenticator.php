<?php

namespace Core;
use Core\App;
use Core\Database;
class Authenticator{
    public function attempt($email,$password){
        #check whether credentials matches
        $query = "select * from user where email = :email";
        
        // Execute the query and fetch the first result (if any).
        $user = App::container()->resolve(Database::class)->query($query,['email' => $email])->find();

        // If a user with the email already exists.
        if($user){
            if(password_verify($password,$user['password'])){
                $this->login(['email' => $email]);
                #redirect('/');
                return true;
        }} 
        return false;
    }

    // Log in the newly registered user.
        public function login($user){
            $_SESSION['user'] = [
                'email' => $user['email']
            ];
            session_regenerate_id(true);
        }
    
        // Use the Session class to destroy the current session
    public function logout(){
            Session::destroy();
        }
    }