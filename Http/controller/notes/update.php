<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$currentUser = 6;

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = :id', 
    ['id' => $_POST['id']
])->findOrFail();


authorize($note['user_id'] === $currentUser);


$errors = [];

if(!Validator::string($_POST['body'], 1, 50)){
    $errors['body'] = '50 Character Required';
}

if(count($errors)){
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]); 
}

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /notes');
die;