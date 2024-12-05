<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function(){
    $data = require base_path('config.php');
    $config = $data['database'];

    return new Database($config, $config['user'], $config['password']);
});

App::setContainer($container);

