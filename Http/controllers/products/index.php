<?php 

use Core\App;
use Core\Database;

// Resolve the Database instance from the application container.
$db = App::container()->resolve(Database::class);

// Define the user ID for which to retrieve notes.
$id = 2; // This could be dynamic, e.g., $_SESSION['user']['id'] in a real application.

// Prepare the SQL query to fetch notes for the specified user.
$query = "select * from notes where user_id = :id";

// Execute the query and fetch all matching notes.
$notes = $db->query($query,['id' => $id])->get();

// Render the 'products/index.view.php' view, passing the heading and notes data.
view('products/index.view.php',['heading' => "products",
'notes' => $notes]);
