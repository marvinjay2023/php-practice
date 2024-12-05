<?php 

use Core\Authenticator;

use Http\Form\LoginForm;



$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);


$auth = new Authenticator();

$signIn = $auth->attemp($attributes['email'], $attributes['password']);

if(!$signIn){

    $form->error(
        'email', 
        'No Matching Account Found for That email address and password')
        ->throw();


}

redirect('/');





 

 


