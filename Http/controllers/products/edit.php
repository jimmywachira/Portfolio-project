<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId =2;
$id = $_GET['id'];

$query = "select * from products where id = :id";
$note = $db->query($query,['id' => $id])->findOrFail();

authorize($note['user_id'] === $currentUserId); 

view('/products/edit.view.php',[
    'heading' => "edit products",
    'errors' => [],
    'note' => $note
    ]);