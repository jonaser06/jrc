<?php
class consultasClassController{

    public static function reporteDiarioController($ho, $eq){

        $update = consultasClassModel::reportediarioModel($ho, $eq);

    }

    public static function getreporteController(){

        $get = consultasClassModel::getreporteModel();

        return $get;

    }

    public static function setreporteController($data){
        
        $set = consultasClassModel::setreporteModel($data);

        return $set;

    }

    public static function setRepPromController($data){

        $user = $data['nameUser']; 
        $incidente = $data['inc'];
        $fecha = $data['fecha'];
        $hora = $data['hora'];
        
        $para   = 'jonaser06@gmail.com';
        $titulo = 'Nuevo Problema reportado!';
        ob_start();
        include "template-email.php";
        $mensaje = ob_get_contents();
        ob_end_clean();

        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";   
        $cabeceras .= 'From: JRC <mail@servidormail.com>' . "\r\n";

        mail($para, $titulo, $mensaje, $cabeceras);
        
        $set = consultasClassModel::setRepPromModel($data);

        return $set;

    }

    public static function reporteController($page){

        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::reporteModel($page);
        # respuesta
        echo $response;
        exit;

    }

    public static function reporteFechaController($de, $hasta, $page){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::reporteFechaModel($de, $hasta, $page);
        # respuesta
        echo $response;
        exit;
    }

    public static function reporteScoopsController($equipo, $page){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::reporteScoopsModel($equipo, $page);
        # respuesta
        echo $response;
        exit;
    }

    public static function reporteFechaScoops($de, $hasta, $equipo, $page){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::reporteScoopsFechaModel($de, $hasta, $equipo, $page);
        # respuesta
        echo $response;
        exit;
    }

    public static function indicadorController($month, $years, $page){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::indicadorModel($month, $years, $page);
        # respuesta
        echo $response;
        exit;
    }

    public static function operacionController($years){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::operacionModel($years);
        # respuesta
        echo $response;
        exit;
    }
    public static function imboxRequestController($page){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::imboxRequestModel($page);
        # respuesta
        echo $response;
        exit;
    }
}
?>