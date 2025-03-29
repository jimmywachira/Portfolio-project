<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

//validate form inputs
$errors = [];++

if (!Validator::email($email)){
    $errors['email']= 'provide a valid email address';
}

if (!Validator::string($password,8,255)){
    $errors['password']= 'provide a password of atleast 8 chars';
}

if(!empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors]);
}

$db = App::container()->resolve(Database::class);

//check if account already exists
$query = "select * from user where email = :email";

$user = $db->query($query,['email' => $email])->find();
#dd($user);
if($user){
    redirect('/login');    
} else{
    $query = "insert into user(email,password) values(:email,:password)";
    $db->query($query,['email' => $email,'password' => password_hash($password, PASSWORD_BCRYPT)]);
}

login(['email' => $email]);

redirect('/notes');