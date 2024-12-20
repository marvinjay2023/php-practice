<?php

use Core\App;
use Core\Database;

$currentUser = 6;

$db = App::container()->resolve(Database::class);

$note = $db->query('select * from notes where id = :id', 
    ['id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUser);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();



 

