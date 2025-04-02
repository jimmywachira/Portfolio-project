<?php

use Core\App;
use Core\Database;

// Resolve the Database instance from the application container.
$db = App::resolve(Database::class);

// Define the current user's ID.
$currentUserId = 2;

// Get the ID of the product/note from the query string.
$id = $_GET['id'];

// Prepare the SQL query to find the note by its ID.
$query = "select * from notes where id = :id";

// Execute the query and fetch the note, or abort with a 404 error if not found.
$note = $db->query($query,['id' => $id])->findOrFail();

// Authorize the access: check if the current user owns the note.
authorize($note['user_id'] === $currentUserId); 

// Render the show note view, passing the note data.
view('products/show.view.php',[
        'heading' => 'product',
        'note' => $note]);
