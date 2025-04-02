<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

#var_dump('i have been posted');
$email = $_POST['email'];
$password = $_POST['password'];

//validate form inputs
$form = new LoginForm();

if($form->validate($email,$password)){
    $auth = new Authenticator();
    if($auth->attempt($email,$password)){
        redirect('/products');
}}
else{
    $form->error('errors' , "no matching acc for tht email and password");
}

#return view('session/create.view.php', ['errors' => $form->errors()]);

#$_SESSION['_flash']['errors'] = $form->errors();

Session::flash('errors', $form->errors());

return redirect('/login');