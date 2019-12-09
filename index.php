<?php
# compositor
require_once './vendor/autoload.php';

# controladores
require_once './controller/home.controller.php';
require_once './controller/auth.controller.php';
require_once './controller/me.controller.php';
require_once './controller/scoops.controller.php';
require_once './controller/maquinas.controller.php';
# modelos
require_once './model/home.model.php';
require_once './model/auth.model.php';
require_once './model/me.model.php';
require_once './model/scoops.model.php';
require_once './model/maquinas.model.php';

require_once './model/rutas.php';
$index = new homeController();
$index->index();


?>
