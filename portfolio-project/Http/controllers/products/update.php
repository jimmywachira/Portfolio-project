<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 2;

$query = "select * from notes where id = :id";
$note = $db->query($query,['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if(! Validator::string($_POST['body'], 1, 500)){
    $errors['body'] = 'a body of nt more than 500 chars is required';
    }

if(count($errors)){
    return view('/product/edit.view.php',[
            'heading' => "edit product",
            'errors'=> $errors,
            'note' => $note
            ]);
    }

$query = "update notes set title = :title,price = :price,phone_number = :phone_number, body = :body, user_id = :user_id where id = :id ";

$db->query($query,['title' => $_POST['title'],'price' => $_POST['price'],'phone_number' => $_POST['phone_number'],'body' => $_POST['body'],'id' => $_POST['id'],'user_id' => $currentUserId]);

redirect("/products");