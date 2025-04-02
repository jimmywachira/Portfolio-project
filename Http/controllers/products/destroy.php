<?php

use Core\App;
use Core\Database;

#$db = App::container()->resolve(Database::class); // This line is commented out and not used.

// Resolve the Database instance from the application container.
$db = App::resolve(Database::class);

// Define the current user's ID.
$currentUserId = 2;

// Get the ID of the note to be deleted from the POST request.
$id = $_POST['id'];

// Prepare the SQL query to find the note by its ID.
$query = "select * from notes where id = :id";

// Execute the query and fetch the note, or abort with a 404 error if not found.
$note = $db->query($query,['id' => $_POST['id']])->findOrFail();

// Authorize the deletion: check if the current user owns the note.
authorize($note['user_id'] === $currentUserId);

// Prepare and execute the SQL query to delete the note.
$db->query("delete from notes where id = :id", [
'id' => $_POST['id']]);

// Redirect the user to the products listing page after successful deletion.
header('location: /products');
exit();
