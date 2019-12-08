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
$app->get('/mecanico/','mecanico');
$app->get('/administrador/','administrador');
$app->get('/superadministrador/','superadministrador');
$app->post('/validasesion/','validasesion');
$app->get('/validasesion/','validasesion');
$app->get('/r1600g/','r1600g');
$app->get('/mt2010/','mt2010');
$app->get('/requerimientos/','requerimientos');
$app->get('/scoops/','scoops');
$app->get('/registro/','registro');
$app->get('/registro-s/','registros');
$app->get('/reporteproblema/','reporteproblema');
$app->get('/reportediario/','reportediario');
$app->get('/adminmt2010/','adminmt2010');
$app->get('/reporteadmin/','reporteadmin');
$app->get('/asignacion/','asignacion');
$app->get('/pm/','pm');
$app->notFound(function () use ($app) {
    echo 'esta pagina no existe'; 
});

#insertar
$app->post('/mantenimiento/','mantenimiento');



function mantenimiento(){
    $data = array(
        'equipo'=> $_POST['equipo'],
        'fecha'=> $_POST['fecha'],
        'turno'=> $_POST['turno'],
        'horometro'=> $_POST['horometro'],
        'mant'=> $_POST['mant'],
        'checklist'=> $_POST['checklist'],
        'data'=> $_POST['electricista']
    );

    $seguridad = array (
        "PSG_1"=>($_POST['PSG_1']==NULL)?'0':'1',
        "PSG_2"=>($_POST['PSG_2']==NULL)?'0':'1',
        "PSG_3"=>($_POST['PSG_3']==NULL)?'0':'1',
        "PSG_4"=>($_POST['PSG_4']==NULL)?'0':'1',
        "PSG_5"=>($_POST['PSG_5']==NULL)?'0':'1',
        "PSG_6"=>($_POST['PSG_6']==NULL)?'0':'1',
        "PSG_7"=>($_POST['PSG_7']==NULL)?'0':'1',
    );

    var_dump($seguridad);
}

function pm(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        $user = meClassController::meController($_SESSION['id_usuarios']);
        $maquina = meClassController::maquinaController($user->id_maquina);
        $pm = meClassController::pmController();
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/pm.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function asignacion(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/asignamaquina.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}


function reporteadmin(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/reporteadmin.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function adminmt2010(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/adminmt2010.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function reportediario(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/reportediario.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function registros(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/registro-s.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}
function registro(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/registro.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}
function scoops(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/scoops.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function superadministrador(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/superadministrador.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function administrador(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/administrador.php';
        include 'modules/footer.php';
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}
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
        $user = meClassController::meController($_SESSION['id_usuarios']);
        $maquina = meClassController::maquinaController($user->id_maquina);
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

function mecanico(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/mecanico.php';
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

    if($_SESSION['rol']=='mecanico'){
        $rol = 'mecanico';
    }
    if($_SESSION['rol']=='administrador'){
        $rol = 'administrador';
    }
    if($_SESSION['rol']=='super administrador'){
        $rol = 'superadministrador';
    }
    if($status){
        echo '<script type="text/javascript">
                    window.location = "'.$rol.'";
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
                }, 0);
                </script>';
    }else{
        echo '<script type="text/javascript">
                    window.location = "login";
                </script>';
    }
}
function reporteproblema(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        include 'modules/head.php';
        include 'modules/menu.php';
        include 'modules/reporteproblema.php';
        include 'modules/footer.php';
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
