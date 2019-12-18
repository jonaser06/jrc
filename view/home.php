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
$app->get('/reporteservice/','reporteService');

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
    echo '<script type="text/javascript">
                window.location = "login";
            </script>';
});

#insertar
$app->post('/mantenimiento/','mantenimiento');
$app->post('/updatereporte/','updatereporte');



function mantenimiento(){
    
    $psg = array (
        "PSG_1"=>($_POST['PSG_1']==NULL)?'0':'1',
        "PSG_2"=>($_POST['PSG_2']==NULL)?'0':'1',
        "PSG_3"=>($_POST['PSG_3']==NULL)?'0':'1',
        "PSG_4"=>($_POST['PSG_4']==NULL)?'0':'1',
        "PSG_5"=>($_POST['PSG_5']==NULL)?'0':'1',
        "PSG_6"=>($_POST['PSG_6']==NULL)?'0':'1',
        "PSG_7"=>($_POST['PSG_7']==NULL)?'0':'1'
    );
    $id_psg = maquinasClassController::tableSgController($psg);
    $id_psg = (int)$id_psg->id_SG;

    $pen = array(
        'PEN_1'=>($_POST['PEN_1']==NULL)?'0':'1',
        'PEN_2'=>($_POST['PEN_2']==NULL)?'0':'1',
        'PEN_3'=>($_POST['PEN_3']==NULL)?'0':'1',
        'PEN_4'=>($_POST['PEN_4']==NULL)?'0':'1',
        'PEN_5'=>($_POST['PEN_5']==NULL)?'0':'1',
        'PEN_6'=>($_POST['PEN_6']==NULL)?'0':'1'
    );
    $id_pen = maquinasClassController::tableEnController($pen);
    $id_pen = (int)$id_pen->id_EN;

    $pmd = array(
        'PMD_1'=>($_POST['PMD_1']==NULL)?'0':'1',
        'PMD_2'=>($_POST['PMD_2']==NULL)?'0':'1',
        'PMD_3'=>($_POST['PMD_3']==NULL)?'0':'1',
        'PMD_4'=>($_POST['PMD_4']==NULL)?'0':'1',
        'PMD_5'=>($_POST['PMD_5']==NULL)?'0':'1',
        'PMD_6'=>($_POST['PMD_6']==NULL)?'0':'1',
        'PMD_7'=>($_POST['PMD_7']==NULL)?'0':'1',
        'PMD_8'=>($_POST['PMD_8']==NULL)?'0':'1',
        'PMD_9'=>($_POST['PMD_9']==NULL)?'0':'1',
        'PMD_10'=>($_POST['PMD_10']==NULL)?'0':'1',
        'PMD_11'=>($_POST['PMD_11']==NULL)?'0':'1',
        'PMD_12'=>($_POST['PMD_12']==NULL)?'0':'1',
        'PMD_13'=>($_POST['PMD_13']==NULL)?'0':'1',
        'PMD_14'=>($_POST['PMD_14']==NULL)?'0':'1',
        'PMD_15'=>($_POST['PMD_15']==NULL)?'0':'1',
        'PMD_16'=>($_POST['PMD_16']==NULL)?'0':'1',
        'PMD_17'=>($_POST['PMD_17']==NULL)?'0':'1',
        'PMD_18'=>($_POST['PMD_18']==NULL)?'0':'1',
        'PMD_19'=>($_POST['PMD_19']==NULL)?'0':'1',
        'PMD_20'=>($_POST['PMD_20']==NULL)?'0':'1',
        'PMD_21'=>($_POST['PMD_21']==NULL)?'0':'1',
        'PMD_22'=>($_POST['PMD_22']==NULL)?'0':'1',
        'PMD_23'=>($_POST['PMD_23']==NULL)?'0':'1',
        'PMD_24'=>($_POST['PMD_24']==NULL)?'0':'1',
        'PMD_25'=>($_POST['PMD_25']==NULL)?'0':'1',
        'PMD_26'=>($_POST['PMD_26']==NULL)?'0':'1',
        'PMD_27'=>($_POST['PMD_27']==NULL)?'0':'1'
    );
    $id_pmd = maquinasClassController::tableMdController($pmd);
    $id_pmd = (int)$id_pmd->id_MD;

    $pse = array(
        'PSE_1'=>($_POST['PSE_1']==NULL)?'0':'1',
        'PSE_2'=>($_POST['PSE_2']==NULL)?'0':'1',
        'PSE_3'=>($_POST['PSE_3']==NULL)?'0':'1',
        'PSE_4'=>($_POST['PSE_4']==NULL)?'0':'1',
        'PSE_5'=>($_POST['PSE_5']==NULL)?'0':'1',
        'PSE_6'=>($_POST['PSE_6']==NULL)?'0':'1',
        'PSE_7'=>($_POST['PSE_7']==NULL)?'0':'1'
    );
    $id_pse = maquinasClassController::tableSeController($pse);
    $id_pse = (int)$id_pse->id_SE;

    $psf = array(
        'PSF_1'=>($_POST['PSF_1']==NULL)?'0':'1',
        'PSF_2'=>($_POST['PSF_2']==NULL)?'0':'1',
        'PSF_3'=>($_POST['PSF_3']==NULL)?'0':'1',
        'PSF_4'=>($_POST['PSF_4']==NULL)?'0':'1',
        'PSF_5'=>($_POST['PSF_5']==NULL)?'0':'1',
        'PSF_6'=>($_POST['PSF_6']==NULL)?'0':'1',
        'PSF_7'=>($_POST['PSF_7']==NULL)?'0':'1',
        'PSF_8'=>($_POST['PSF_8']==NULL)?'0':'1',
        'PSF_9'=>($_POST['PSF_9']==NULL)?'0':'1',
        'PSF_10'=>($_POST['PSF_10']==NULL)?'0':'1'
    );
    $id_psf = maquinasClassController::tableSfController($psf);
    $id_psf = (int)$id_psf->id_SF;

    $pch = array(
        'PCH_1'=>($_POST['PCH_1']==NULL)?'0':'1',
        'PCH_2'=>($_POST['PCH_2']==NULL)?'0':'1',
        'PCH_3'=>($_POST['PCH_3']==NULL)?'0':'1',
        'PCH_4'=>($_POST['PCH_4']==NULL)?'0':'1',
        'PCH_5'=>($_POST['PCH_5']==NULL)?'0':'1',
        'PCH_6'=>($_POST['PCH_6']==NULL)?'0':'1'
    );
    $id_pch = maquinasClassController::tableChController($pch);
    $id_pch = (int)$id_pch->id_CH;

    $psh = array(
        'PSH_1'=>($_POST['PSH_1']==NULL)?'0':'1',
        'PSH_2'=>($_POST['PSH_2']==NULL)?'0':'1',
        'PSH_3'=>($_POST['PSH_3']==NULL)?'0':'1',
        'PSH_4'=>($_POST['PSH_4']==NULL)?'0':'1',
        'PSH_5'=>($_POST['PSH_5']==NULL)?'0':'1',
        'PSH_6'=>($_POST['PSH_6']==NULL)?'0':'1',
        'PSH_7'=>($_POST['PSH_7']==NULL)?'0':'1',
        'PSH_8'=>($_POST['PSH_8']==NULL)?'0':'1',
        'PSH_9'=>($_POST['PSH_9']==NULL)?'0':'1',
        'PSH_10'=>($_POST['PSH_10']==NULL)?'0':'1',
        'PSH_11'=>($_POST['PSH_11']==NULL)?'0':'1',
        'PSH_12'=>($_POST['PSH_12']==NULL)?'0':'1',
        'PSH_13'=>($_POST['PSH_13']==NULL)?'0':'1',
        'PSH_14'=>($_POST['PSH_14']==NULL)?'0':'1',
        'PSH_15'=>($_POST['PSH_15']==NULL)?'0':'1',
        'PSH_16'=>($_POST['PSH_16']==NULL)?'0':'1',
        'PSH_17'=>($_POST['PSH_17']==NULL)?'0':'1'
    );
    $id_psh = maquinasClassController::tableShController($psh);
    $id_psh = (int)$id_psh->id_SH;
    
    $pst = array(
        'PST_1'=>($_POST['PST_1']==NULL)?'0':'1',
        'PST_2'=>($_POST['PST_2']==NULL)?'0':'1',
        'PST_3'=>($_POST['PST_3']==NULL)?'0':'1',
        'PST_4'=>($_POST['PST_4']==NULL)?'0':'1',
        'PST_5'=>($_POST['PST_5']==NULL)?'0':'1',
        'PST_6'=>($_POST['PST_6']==NULL)?'0':'1',
        'PST_7'=>($_POST['PST_7']==NULL)?'0':'1',
        'PST_8'=>($_POST['PST_8']==NULL)?'0':'1',
        'PST_9'=>($_POST['PST_9']==NULL)?'0':'1',
        'PST_10'=>($_POST['PST_10']==NULL)?'0':'1',
        'PST_11'=>($_POST['PST_11']==NULL)?'0':'1',
        'PST_12'=>($_POST['PST_12']==NULL)?'0':'1',
        'PST_13'=>($_POST['PST_13']==NULL)?'0':'1',
        'PST_14'=>($_POST['PST_14']==NULL)?'0':'1',
        'PST_15'=>($_POST['PST_15']==NULL)?'0':'1',
        'PST_16'=>($_POST['PST_16']==NULL)?'0':'1',
        'PST_17'=>($_POST['PST_17']==NULL)?'0':'1',
        'PST_18'=>($_POST['PST_18']==NULL)?'0':'1',
        'PST_19'=>($_POST['PST_19']==NULL)?'0':'1',
        'PST_20'=>($_POST['PST_20']==NULL)?'0':'1',
        'PST_21'=>($_POST['PST_21']==NULL)?'0':'1',
        'PST_22'=>($_POST['PST_22']==NULL)?'0':'1'
    );
    $id_pst = maquinasClassController::tableStController($pst);
    $id_pst = (int)$id_pst->id_ST;

    $data = array(
        'id_usuarios'=> $_POST['id_usuarios'],
        'id_maquina'=> $_POST['id_maquina'],
        'id_SG'=> $id_psg,
        'id_MD'=> $id_pmd,
        'id_SH'=> $id_psh,
        'id_SF'=> $id_psf,
        'id_SE'=> $id_pse,
        'id_ST'=> $id_pst,
        'id_CH'=> $id_pch,
        'id_EN'=> $id_pen,
        'turno'=> $_POST['turno'],
        'fecha'=> $_POST['fecha'],
        'mant'=> $_POST['mant'],
        'electricistas'=> $_POST['electricistas'],
        'checklist'=> $_POST['checklist'],
        'trabajos_R'=> $_POST['trabajos_R'],
        'pendientes_M'=> $_POST['pendientes_M']
    );

    $mantenimiento = scoopsClassController::mantenimientoController($data);

    if($mantenimiento){
        echo '<script type="text/javascript">
                    window.location = "r1600g?status=true&message=Parada de mantenimiento realizado correctamente";
                </script>';
    }else{
        echo '<script type="text/javascript">
                    window.location = "r1600g?status=false&message=Ocurrio un error";
                </script>';
    }

    
}

function updatereporte(){

    $hora = (int)$_POST['horaacumulada']+(int)$_POST['hora'];
    $equipotrabajo = $_POST['equipotrabajo'];
    consultasClassController::reporteDiarioController($hora, $equipotrabajo);
    $data = array(
        "iniciojornada"=>$_POST['iniciojornada'],
        "horaacumulada"=>$_POST['horaacumulada'],
        "finjornada"=>$_POST['finjornada'],
        "hora"=>$_POST['hora'],
        "equipotrabajo"=>$_POST['equipotrabajo'],
        "descripcion"=>$_POST['descripcion'],
        "nrofallas"=>$_POST['nrofallas'],
        "paradatotal"=>$_POST['paradatotal']
    );
    $reporte = consultasClassController::setreporteController($data);
    
    if($reporte){
        echo '<script type="text/javascript">
                window.location = "r1600g?status=true&message=Reporte Diario realizado correctamente";
            </script>';
    }
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
        $user = meClassController::meController($_SESSION['id_usuarios']);
        $maquina = meClassController::maquinaController($user->id_maquina);
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
        if($_SESSION['id_usuarios']== 1){ 
            include 'modules/head.php';
            include 'modules/menu.php';
            include 'modules/superadministrador.php';
            include 'modules/footer.php';
         }else{
            echo '<script type="text/javascript">
                    window.location = "login";
                </script>';
         }
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
        if($_SESSION['id_usuarios']== 2){
            include 'modules/head.php';
            include 'modules/menu.php';
            include 'modules/administrador.php';
            include 'modules/footer.php';
        }else{
            echo '<script type="text/javascript">
                  window.location = "login";
              </script>';      
        }
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
        #notificacion
        if($_GET['status']=='true'){
            echo '<script>
                    toastr.success("'.$_GET['message'].'", "Estado");
                  </script>';
        }
        if($_GET['status']=='false'){
        echo '<script>
                toastr.error("'.$_GET['message'].'", "Estado");
                </script>';
        }
    }else{
      echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
    }
}

function index(){
    session_start();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){

        if($_SESSION['id_usuarios'] == 1 ){ $url = 'superadministrador'; }
        if($_SESSION['id_usuarios'] == 2 ){ $url = 'administrador'; }
        if($_SESSION['id_usuarios'] == 3 ){ $url = 'mecanico'; }

        echo '<script type="text/javascript">
                  window.location = "'.$url.'";
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
        if($_SESSION['id_usuarios'] == 1 ){ $url = 'superadministrador'; }
        if($_SESSION['id_usuarios'] == 2 ){ $url = 'administrador'; }
        if($_SESSION['id_usuarios'] == 3 ){ $url = 'mecanico'; }

        echo '<script type="text/javascript">
                  window.location = "'.$url.'";
              </script>';
    }else{
        include 'modules/login.php';
    }
}

function mecanico(){
    session_start();
    $dir = rutasClass::rutas();
    if(isset($_SESSION['id_usuarios']) && isset($_SESSION['nombres']) && isset($_SESSION['dni']) && isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
        if($_SESSION['id_usuarios'] == 3 ){
            include 'modules/head.php';
            include 'modules/menu.php';
            include 'modules/mecanico.php';
            include 'modules/footer.php';
        }else{
            echo '<script type="text/javascript">
                  window.location = "login";
              </script>';
        }
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
function reporteService(){
    $request = \Slim\Slim::getInstance()->request();
    $getbody = json_decode($request->getBody());
    if(isset($_GET['de']) && isset($_GET['hasta'])){
        $de = $_GET['de'];
        $hasta = $_GET['hasta'];
        consultasClassController::reporteFechaController($de, $hasta);
    }else{
        consultasClassController::reporteController();
    }

}

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

$app->run();

?>
