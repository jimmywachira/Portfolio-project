<?php

use Core\Response;
function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    #die();
}
  
function urlIs($value){
    return $_SERVER["REQUEST_URI"] === $value;
}

function redirect($path){
    header("location: {$path}");
    exit();
}

function authorize($condition, $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}

function base_path($path){
    return BASE_PATH . $path;
}

function abort($code = 404){
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function view($path,$attributes = []){
    extract ($attributes);
    require base_path('views/') . $path;
}
function logout(){
    $_SESSION = [];

    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

function login($user){
    $_SESSION['user'] = [
        'email' => $user['email']
    ];}