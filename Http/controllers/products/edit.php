<?php

use Core\App;
use Core\Database;

// Resolve the Database instance from the application container.
$db = App::resolve(Database::class);

// Define the current user's ID.
$currentUserId =2;

// Get the ID of the product to be edited from the query string.
$id = $_GET['id'];

// Prepare the SQL query to find the product by its ID.
$query = "select * from products where id = :id";

// Execute the query and fetch the product, or abort with a 404 error if not found.
$note = $db->query($query,['id' => $id])->findOrFail();

// Authorize the edit: check if the current user owns the product.
authorize($note['user_id'] === $currentUserId); 

// Render the edit product view, passing the product data and an empty errors array.
view('/products/edit.view.php',[
    'heading' => "edit products",
    'errors' => [],
    'note' => $note
    ]);
