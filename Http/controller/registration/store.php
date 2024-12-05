<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Authenticator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(!Validator::string($name, 3, 20)){
    $errors['name'] = 'Please enter a Name';
}

if(!Validator::email($email)){
        $errors['email'] = 'Please enter a Valid Email';
}

if(!Validator::string($password, 7, 255)){
    $errors['password'] = 'Password must be atleast 7 and mote character';
}

if(!empty($errors)){

    return view('registration/create.view.php', [
        'errors' => $errors
    ]); 
    
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->fetch();

if($user){ 

    $errors['userExist'] = 'User Already Exist';

    return view('registration/create.view.php', [
        'errors' => $errors
    ]);

    exit();

}else{

    $db->query('insert into users(name, email, password) values(:name ,:email, :password)',[
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $auth = new Authenticator();

    $auth->login($user);

    header('location: /');
    exit();
    
}



