<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

// Retrieve the email and password from the POST request.
$email = $_POST['email'];
$password = $_POST['password'];

// Create a new LoginForm instance for validation.
$form = new LoginForm();

// Validate the form inputs (email and password).
if ($form->validate($email, $password)) {
    // If the form is valid, attempt to authenticate the user.
    $auth = new Authenticator();
    if ($auth->attempt($email, $password)) {
        // If authentication is successful, redirect to the products page.
        redirect('/products');
    }
} else {
    // If the form is invalid (validation failed), add a generic error message.
    $form->error('errors', "no matching acc for tht email and password");
}

// Flash the errors to the session so they can be displayed on the login form.
Session::flash('errors', $form->errors());

// Redirect back to the login page.
return redirect('/login');
