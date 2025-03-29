<?php 

use Core\App;
use Core\Database;

#$db = App::container()->resolve(Database::class);

$db = App::resolve(Database::class);

$currentUserId = 2;
$id = $_POST['id'];

$query = "select * from notes where id = :id";
$note = $db->query($query,['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("delete from notes where id = :id", [
'id' => $_POST['id']]);

header('location: /products');
exit();