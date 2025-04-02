<?php

$_SESSION['fname'] = 'jimmy';
$_SESSION['lname'] = 'wachira';

view("index.view.php", 
    ['heading' => "home"]);