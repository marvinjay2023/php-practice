<?php 

use Core\App;
use Core\Database;

$currentUser = 6;

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = :id', 
    ['id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUser);

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]); 



 

