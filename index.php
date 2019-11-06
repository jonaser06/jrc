<?php
/* vendor */
require_once './vendor/autoload.php';

/* requires */
require_once './controller/home.controller.php';

require_once './model/home.model.php';

$index = new homeController();
$index->index();

?>