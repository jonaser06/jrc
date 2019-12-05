<?php
# compositor
require_once './vendor/autoload.php';

# controladores
require_once './controller/home.controller.php';
require_once './controller/auth.controller.php';
# modelos
require_once './model/home.model.php';
require_once './model/auth.model.php';

require_once './model/rutas.php';
$index = new homeController();
$index->index();



?>
