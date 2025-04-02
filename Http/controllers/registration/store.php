<?php

use Core\Validator;
use Core\App;
use Core\Database;

// Retrieve email and password from the POST request.
$email = $_POST['email'];
$password = $_POST['password'];

// Initialize an empty array to store validation errors.
$errors = [];

// Validate the email address.
if (!Validator::email($email)) {
    // If the email is invalid, add an error message to the errors array.
    $errors['email'] = 'provide a valid email address';
}

// Validate the password.
if (!Validator::string($password, 8, 255)) {
    // If the password is too short or too long, add an error message to the errors array.
    $errors['password'] = 'provide a password of atleast 8 chars';
}

// Check if there are any validation errors.
if (!empty($errors)) {
    // If there are errors, return the registration form view with the errors.
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// Resolve the Database instance from the application container.
$db = App::container()->resolve(Database::class);

// Check if a user with the given email already exists.
$query = "select * from user where email = :email";

// Execute the query and fetch the first result (if any).
$user = $db->query($query, ['email' => $email])->find();
#dd($user); // This line was likely used for debugging and can be removed.

// If a user with the email already exists.
if ($user) {
    // Redirect the user to the login page.
    redirect('/login');
} else {
    // If the user does not exist, insert a new user record into the database.
    $query = "insert into user(email,password) values(:email,:password)";
    // Hash the password before storing it in the database.
    $db->query($query, ['email' => $email, 'password' => password_hash($password, PASSWORD_BCRYPT)]);
}

// Log in the newly registered user.
login(['email' => $email]);

// Redirect the user to the notes page.
redirect('/notes');
