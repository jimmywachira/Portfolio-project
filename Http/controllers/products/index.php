<?php 

use Core\App;
use Core\Database;

$db = App::container()->resolve(Database::class);

$id = 2 ; #$_GET['id'];
$query = "select * from notes where user_id = :id";

$notes = $db->query($query,['id' => $id])->get();

view('products/index.view.php',['heading' => "products",
'notes' => $notes]);