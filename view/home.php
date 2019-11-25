<?php
/* 
** Proyecto : jrc
** Autor : Jonathan Narvaez
*/

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
#endpoints de servicios
$app->post('/signup/','signup');
$app->post('/signin/','signin');

#endpints de vistas
$app->get('/','index');
$app->get('/login/','login');
$app->get('/logout/','logout');
$app->get('/inicio/','inicio');
$app->post('/validasesion/','validasesion');
$app->get('/validasesion/','validasesion');
$app->get('/r1600g/','r1600g');
$app->get('/mt2010/','mt2010');
$app->get('/requerimientos/','requerimientos');

function requerimientos(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/requerimientos.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function mt2010(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/mt2010.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function r1600g(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/r1600g.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function index(){
    session_start();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        echo '<script type="text/javascript">
                  window.location = "inicio";
              </script>';
    }else{
    echo '<script type="text/javascript">
                window.location = "login";
            </script>';
    }
}

function login(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        echo '<script type="text/javascript">
                  window.location = "inicio";
              </script>';
    }else{
        include 'modules/login.php';
    }
}

function inicio(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/inicio.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function validasesion(){
    $data = array(
        'usuario' => $_POST['usuario'],
        'password' => $_POST['password']
    );
    $status = authClassController::loginController($data);

    if($status){
        echo '<script type="text/javascript">
                    window.location = "inicio";
                </script>';
    }else{
        echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function logout(){
    session_start();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        session_destroy();
        echo '<script type="text/javascript">
                setTimeout(function(){
                    window.location = "login";
                }, 1000);
                </script>';
    }else{
        echo '<script type="text/javascript">
                    window.location = "login";
                </script>';
    }
}

#servicios
function signup(){
    $request = \Slim\Slim::getInstance()->request();
    $getbody = json_decode($request->getBody());
    authClassController::signupController($getbody);
}

function signin(){
    $request = \Slim\Slim::getInstance()->request();
    $getbody = json_decode($request->getBody());
    authClassController::signinController($getbody);
}

#vistas


$app->run();

?>
