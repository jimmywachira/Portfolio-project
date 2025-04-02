<?php

use Core\App;
use Core\Validator;
use Core\Database;

// Resolve the Database instance from the application container.
$db = App::resolve(Database::class);

// Initialize an empty array to store validation errors.
$errors = [];

// Validate the 'body' field: Check if it's a string with a length between 1 and 500 characters.
if(!Validator::string($_POST['body'], 1, 500)){
    // If the validation fails, add an error message to the $errors array.
    $errors['body'] = 'a body of nt more than 500 chars is required';
}

// Check if there are any errors in the $errors array.
if(!empty($errors)){
    // If there are errors, render the 'products/create.view.php' view and pass the errors.
    // This will display the form again with the error messages.
    return view('/products/create.view.php',[
        'heading' => "create products",
        'errors' => $errors // Pass the errors array to the view.
    ]);
}

// If there are no validation errors, proceed with database insertion.
if(empty($errors)){

    // Prepare the SQL query to insert a new note into the 'notes' table.
    $query = "insert into notes(title,price,phone_number,body,user_id) values(:title,:price,:phone_number,:body,:user_id)";

    // Execute the query with the provided data.
    // 'user_id' is hardcoded to 2 in this example.
    $db->query($query,['title' => $_POST['title'],'price' => $_POST['price'],'phone_number' => $_POST['phone_number'],'body' => $_POST['body'],'user_id'=>2]);

}

// Redirect the user to the '/products' page after successful insertion.
redirect('/products');
