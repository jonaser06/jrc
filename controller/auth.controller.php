<?php
/* 
** Proyecto : jrc
** Autor : Jonathan Narvaez
*/
class authClassController{

    public function signupController($getbody){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = authClassModel::authModel($getbody);
        # respuesta
        echo $response;
        exit;

    }

    public function signinController($getbody){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = authClassModel::signinModel($getbody);
        # respuesta
        echo $response;
        exit;
    }

    public function loginController($data){
        $response = authClassModel::loginModel($data);
        $response = json_decode($response,true);
        if($response['status']){
            $_SESSION['id_usuarios'] = $response['data'][0]['id_usuarios'];
            $_SESSION['nombres']     = $response['data'][0]['id_usuarios'];
            $_SESSION['dni']         = $response['data'][0]['id_usuarios'];
            $_SESSION['usuario']     = $response['data'][0]['id_usuarios'];
            $_SESSION['rol']         = $response['data'][0]['id_usuarios'];
        }
        return true;
    }

}

?>