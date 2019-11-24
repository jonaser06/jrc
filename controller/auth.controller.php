<?php

class authClassController{

    public function signupController($getbody){
        
        header('Content-Type: application/json');
        $response = authClassModel::authModel($getbody);

        echo $response;
        
        /* echo '{"username":"Jonathan"}';*/
        
        exit;
    }

}

?>