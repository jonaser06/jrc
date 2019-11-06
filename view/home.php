<?php
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/','index');

function index(){
    include 'modules/inicio.php';
}


$app->run();

?>