<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

if(!Validator::string($_POST['body'], 1, 500)){
        $errors['body'] = 'a body of nt more than 500 chars is required';
    }

if(!empty($errors)){
        return view('/products/create.view.php',[
            'heading' => "create products",
            ]);
    }

if(empty($errors)){

        $query = "insert into notes(title,price,phone_number,body,user_id) values(:title,:price,:phone_number,:body,:user_id)";

        $db->query($query,['title' => $_POST['title'],'price' => $_POST['price'],'phone_number' => $_POST['phone_number'],'body' => $_POST['body'],'user_id'=>2]);

    }

redirect('/products');