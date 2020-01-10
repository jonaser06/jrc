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
            $_SESSION['nombres']     = $response['data'][0]['nombres'];
            $_SESSION['dni']         = $response['data'][0]['dni'];
            $_SESSION['usuario']     = $response['data'][0]['usuario'];
            $_SESSION['rol']         = $response['data'][0]['rol'];
            $_SESSION['id_maquina']  = $response['data'][0]['id_maquina'];
            return true;
        }else{
            return false;
        }
    }

    public function registroController($data){
        $response = authClassModel::registroModel($data);
        $response = json_decode($response,true);
        return $response;
    }

    public function listUserController($page){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = authClassModel::listUserModel($page);
        echo $response;
        # respuesta
        exit;
    }

    public function updateUserController($data){
        # definiendo el modo de respuesta
        $response = authClassModel::updateUserModel($data);
        return $response;
    }

    public function removeUserController($id){
        # definiendo el modo de respuesta
        $response = authClassModel::removeUserModel($id);
        return $response;
    }

}

?>