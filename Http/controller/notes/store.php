<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

if(!Validator::string($_POST['body'], 1, 50)){
        $errors['body'] = '50 Character Required';
}

if(!empty($errors)){

    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]); 
    
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 6
]);

header('location: /notes');
die();

