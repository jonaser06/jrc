<?php

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/','index');
$app->post('/signup/','signup');
$app->post('/login/','login');

function index(){
    include 'modules/inicio.php';
}

function signup(){
    
    $request = \Slim\Slim::getInstance()->request();
    $getbody = json_decode($request->getBody());

    authClassController::signupController($getbody);
    /* var_dump($getbody); */
}

function login(){
    include 'modules/login.php';
}

$app->run();

?>
