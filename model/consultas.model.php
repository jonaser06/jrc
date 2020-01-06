<?php

require_once 'config.php';

class consultasClassModel{

    public static function reportediarioModel($ho, $eq){
        try {
            $db        =   getDB();
            $sql       =   "UPDATE maquinas
                            SET horas_acumuladas = :hora
                            WHERE nombre= :nombre ";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("hora", $ho, PDO::PARAM_STR);
            $stmt->bindParam("nombre", $eq, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            //throw $th;
        }
    }

    public static function reporteModel($page){
        
        try {
            #obtener total de paginas
            $db        =   getDB();
            $sql       =   "SELECT * FROM reporte";
            $stmt      =    $db->prepare($sql);
            $stmt->execute();
            $total     =   $stmt->rowCount();
            $forPage   = 10;
            $pagination =   ceil($total/$forPage);
            $current   = ((int)$page-1)*$forPage;
            if($page <= $pagination){
                #resultados por paginas
                $db        =   getDB();
                $sql       =   "SELECT * FROM reporte LIMIT :currentpage,:forpage";
                $stmt      =    $db->prepare($sql);
                $stmt->bindParam("currentpage", $current, PDO::PARAM_INT);
                $stmt->bindParam("forpage", $forPage, PDO::PARAM_INT);
                $stmt->execute();
                $mainCount =    $stmt->rowCount();
                $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
                #controls
                $next_page    = ( (int)$page + 1 ) <= ( $pagination ) ? ( (int)$page + 1 ) : 'false';
                $previus_page = ( (int)$page - 1 ) <= 0 ? 'false' : ( (int)$page - 1 ) ;
                return '{
                            "status":"true", 
                            "message":"Find One",
                            "current_page":"'.$page.'", 
                            "next_page":"'.$next_page.'" ,
                            "previus_page":"'.$previus_page.'" ,
                            "pagination":"'.$pagination.'" ,
                            "data": '.json_encode($userData).'
                        }';
            }else{
                return '{"status":false, "message":"No found","data":[]}';
            }
            
        } catch (PDOException $e) {
            return '{"status":false, "message":'.$e.'}';
        }
    }

    public static function reporteFechaModel($de, $hasta, $page){
        try {
            #obtener total de paginas
            $db        =   getDB();
            $sql       =   "SELECT * FROM reporte WHERE inicio_jornada >= :de  AND fin_jornada <= :hasta";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("de", $de,PDO::PARAM_STR);
            $stmt->bindParam("hasta", $hasta,PDO::PARAM_STR);
            $stmt->execute();
            $total     =   $stmt->rowCount();
            $forPage   = 10;
            $pagination =   ceil($total/$forPage);
            $current   = ((int)$page-1)*$forPage;
            if($page <= $pagination){
                #resultados por paginas
                $db        =   getDB();
                $sql       =   "SELECT * FROM reporte WHERE inicio_jornada >= :de  AND fin_jornada <= :hasta LIMIT :currentpage,:forpage";
                $stmt      =    $db->prepare($sql);
                $stmt->bindParam("de", $de,PDO::PARAM_STR);
                $stmt->bindParam("hasta", $hasta,PDO::PARAM_STR);
                $stmt->bindParam("currentpage", $current, PDO::PARAM_INT);
                $stmt->bindParam("forpage", $forPage, PDO::PARAM_INT);
                $stmt->execute();
                $mainCount =    $stmt->rowCount();
                $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
                #controls
                $next_page    = ( (int)$page + 1 ) <= ( $pagination ) ? ( (int)$page + 1 ) : 'false';
                $previus_page = ( (int)$page - 1 ) <= 0 ? 'false' : ( (int)$page - 1 ) ;
                return '{
                            "status":"true", 
                            "message":"Find One",
                            "current_page":"'.$page.'", 
                            "next_page":"'.$next_page.'" ,
                            "previus_page":"'.$previus_page.'" ,
                            "pagination":"'.$pagination.'" ,
                            "data": '.json_encode($userData).'
                        }';
            }else{
                return '{"status":false, "message":"No found","data":[]}';
            }
            
        } catch (PDOException $e) {
            return '{"status":false, "message":'.$e.'}';
        }
    }

    public static function getreporteModel(){
        try {
            $db        =   getDB();
            $sql       =   "SELECT * FROM mantenimiento";
            $stmt      =    $db->prepare($sql);
            $stmt->execute();
            $mainCount =    $stmt->rowCount();
            $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
            return json_encode($userData);
            
        } catch (PDOException $e) {
            //throw $th;
        }
    }

    public static function setreporteModel($data){        
        $iniciojornada = $data['iniciojornada'];
        $finjornada = $data['finjornada'];
        $horaacumulada = $data['horaacumulada'];
        $hora = $data['hora'];
        $equipotrabajo = $data['equipotrabajo'];
        $descripcion = $data['descripcion'];
        $nrofallas = $data['nrofallas'];
        $paradatotal = $data['paradatotal'];
        $homp = $data['homp'];
        $inspect = $data['inspect'];
        $prevent = $data['prevent'];
        $otrosacci = $data['otrosacci'];
        $repcorrect = $data['repcorrect'];
        try {
            $db        =   getDB();
            $sql       =   "INSERT INTO reporte (inicio_jornada, fin_jornada, hora_acumulada, hora, equipo_trabajo, descripcion, fallas_equipo, tiempo_parada, homp, inspecc, mantto_prev, horas_calend, horas_prog, otrosacci, repcorrect)
                            VALUES (:inicio_jornada, :fin_jornada, :hora_acumulada, :hora, :equipo_trabajo, :descripcion, :fallas_equipo, :tiempo_parada, :homp, :inspecc, :mantto_prev, '24', '20', :otrosacci, :repcorrect)";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("inicio_jornada", $iniciojornada,PDO::PARAM_STR);
            $stmt->bindParam("fin_jornada", $finjornada,PDO::PARAM_STR);
            $stmt->bindParam("hora_acumulada", $horaacumulada,PDO::PARAM_STR);
            $stmt->bindParam("hora", $hora,PDO::PARAM_STR);
            $stmt->bindParam("equipo_trabajo", $equipotrabajo,PDO::PARAM_STR);
            $stmt->bindParam("descripcion", $descripcion,PDO::PARAM_STR);
            $stmt->bindParam("fallas_equipo", $nrofallas,PDO::PARAM_STR);
            $stmt->bindParam("tiempo_parada", $paradatotal,PDO::PARAM_STR);
            $stmt->bindParam("homp", $homp,PDO::PARAM_STR);
            $stmt->bindParam("inspecc", $inspect,PDO::PARAM_STR);
            $stmt->bindParam("mantto_prev", $prevent,PDO::PARAM_STR);
            $stmt->bindParam("otrosacci", $otrosacci,PDO::PARAM_STR);
            $stmt->bindParam("repcorrect", $repcorrect,PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            return true;
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function reporteScoopsFechaModel($de, $hasta, $equipo, $page){
        try {
            #obtener total de paginas
            $db        =   getDB();
            $sql       =   "SELECT * FROM reporte WHERE inicio_jornada >= :de  AND fin_jornada <= :hasta AND equipo_trabajo = :equipo";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("de", $de,PDO::PARAM_STR);
            $stmt->bindParam("hasta", $hasta,PDO::PARAM_STR);
            $stmt->bindParam("equipo", $equipo,PDO::PARAM_STR);
            $stmt->execute();
            $total     =   $stmt->rowCount();
            $forPage   = 10;
            $pagination =   ceil($total/$forPage);
            $current   = ((int)$page-1)*$forPage;
            if($page <= $pagination){
                #resultados por paginas
                $db        =   getDB();
                $sql       =   "SELECT * FROM reporte WHERE inicio_jornada >= :de  AND fin_jornada <= :hasta AND equipo_trabajo = :equipo LIMIT :currentpage,:forpage";
                $stmt      =    $db->prepare($sql);
                $stmt->bindParam("de", $de,PDO::PARAM_STR);
                $stmt->bindParam("hasta", $hasta,PDO::PARAM_STR);
                $stmt->bindParam("equipo", $equipo,PDO::PARAM_STR);
                $stmt->bindParam("currentpage", $current, PDO::PARAM_INT);
                $stmt->bindParam("forpage", $forPage, PDO::PARAM_INT);
                $stmt->execute();
                $mainCount =    $stmt->rowCount();
                $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
                #controls
                $next_page    = ( (int)$page + 1 ) <= ( $pagination ) ? ( (int)$page + 1 ) : 'false';
                $previus_page = ( (int)$page - 1 ) <= 0 ? 'false' : ( (int)$page - 1 ) ;
                return '{
                            "status":"true", 
                            "message":"Find One",
                            "current_page":"'.$page.'", 
                            "next_page":"'.$next_page.'" ,
                            "previus_page":"'.$previus_page.'" ,
                            "pagination":"'.$pagination.'" ,
                            "data": '.json_encode($userData).'
                        }';
            }else{
                return '{"status":false, "message":"No found","data":[]}';
            }
            
        } catch (PDOException $e) {
            return '{"status":false, "message":'.$e.'}';
        }
    }
    
    public static function reporteScoopsModel($equipo, $page){
        try {
            #obtener total de paginas
            $db        =   getDB();
            $sql       =   "SELECT * FROM reporte WHERE equipo_trabajo = :equipo";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("equipo", $equipo,PDO::PARAM_STR);
            $stmt->execute();
            $total     =   $stmt->rowCount();
            $forPage   = 10;
            $pagination =   ceil($total/$forPage);
            $current   = ((int)$page-1)*$forPage;
            if($page <= $pagination){
                #resultados por paginas
                $db        =   getDB();
                $sql       =   "SELECT * FROM reporte WHERE equipo_trabajo = :equipo LIMIT :currentpage,:forpage";
                $stmt      =    $db->prepare($sql);
                $stmt->bindParam("equipo", $equipo,PDO::PARAM_STR);
                $stmt->bindParam("currentpage", $current, PDO::PARAM_INT);
                $stmt->bindParam("forpage", $forPage, PDO::PARAM_INT);
                $stmt->execute();
                $mainCount =    $stmt->rowCount();
                $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
                #controls
                $next_page    = ( (int)$page + 1 ) <= ( $pagination ) ? ( (int)$page + 1 ) : 'false';
                $previus_page = ( (int)$page - 1 ) <= 0 ? 'false' : ( (int)$page - 1 ) ;
                return '{
                            "status":"true", 
                            "message":"Find One",
                            "current_page":"'.$page.'", 
                            "next_page":"'.$next_page.'" ,
                            "previus_page":"'.$previus_page.'" ,
                            "pagination":"'.$pagination.'" ,
                            "data": '.json_encode($userData).'
                        }';
            }else{
                return '{"status":false, "message":"No found","data":[]}';
            }
            
        } catch (PDOException $e) {
            return '{"status":false, "message":'.$e.'}';
        }
    }

    public static function indicadorModel($month, $years, $page){
        try {
            #obtener total de paginas
            $db        =   getDB();
            $sql       =   "SELECT * FROM reporte WHERE MONTH(inicio_jornada) = :mes AND YEAR(inicio_jornada) = :years ";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("mes", $month,PDO::PARAM_STR);
            $stmt->bindParam("years", $years,PDO::PARAM_STR);
            $stmt->execute();
            $total     =   $stmt->rowCount();
            $forPage   = 10;
            $pagination =   ceil($total/$forPage);
            $current   = ((int)$page-1)*$forPage;
            if($page <= $pagination){
                #resultados por paginas
                $db        =   getDB();
                $sql       =   "SELECT * FROM reporte WHERE MONTH(inicio_jornada) = :mes AND YEAR(inicio_jornada) = :years ";
                $stmt      =    $db->prepare($sql);
                $stmt->bindParam("mes", $month,PDO::PARAM_STR);
                $stmt->bindParam("years", $years,PDO::PARAM_STR);
                $stmt->execute();
                $mainCount =    $stmt->rowCount();
                $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
                #controls
                $next_page    = ( (int)$page + 1 ) <= ( $pagination ) ? ( (int)$page + 1 ) : 'false';
                $previus_page = ( (int)$page - 1 ) <= 0 ? 'false' : ( (int)$page - 1 ) ;

                #fecha hacia atras
                $db        =   getDB();
                $sql       =   "SELECT * FROM reporte WHERE YEAR(inicio_jornada) <= :years ";
                $stmt      =    $db->prepare($sql);
                $stmt->bindParam("years", $years,PDO::PARAM_STR);
                $stmt->execute();
                $acumYears =    $stmt->fetchAll(PDO::FETCH_OBJ);
                return '{
                            "status":"true", 
                            "message":"Find One",
                            "current_page":"'.$page.'", 
                            "next_page":"'.$next_page.'" ,
                            "previus_page":"'.$previus_page.'" ,
                            "pagination":"'.$pagination.'" ,
                            "data": '.json_encode($userData).',
                            "year": '.json_encode($acumYears).'
                        }';
            }else{
                return '{"status":false, "message":"No found","data":[]}';
            }
        } catch (PDOException $e) {
            return '{"status":false, "message":'.$e.'}';
        }
    }

    public static function operacionModel($years){
        try {
            $obj = ["a","b","c"];
            $data = array(
                
            );
            for ($i = 1 ; $i <= 12 ; $i++){
                $k = 0;
                #resultados meses
                $db        =   getDB();
                $sql       =   "SELECT hora, inicio_jornada, equipo_trabajo, fallas_equipo, homp, tiempo_parada FROM reporte WHERE MONTH(inicio_jornada) = :months AND YEAR(inicio_jornada) = :years ";
                $stmt      =    $db->prepare($sql);
                $stmt->bindParam("years", $years,PDO::PARAM_STR);
                $stmt->bindParam("months", $i,PDO::PARAM_STR);
                $stmt->execute();
                $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
                switch ($i) {
                    case 1: $mes ='Enero';
                        break;
                    case 2: $mes ='Febrero';
                        break;
                    case 3: $mes ='Marzo';
                        break;
                    case 4: $mes ='Abril';
                        break;
                    case 5: $mes ='Mayo';
                        break;
                    case 6: $mes ='Junio';
                        break;
                    case 7: $mes ='Julio';
                        break;
                    case 8: $mes ='Agosto';
                        break;
                    case 9: $mes ='Septiembre';
                        break;
                    case 10: $mes ='Octubre';
                        break;
                    case 11: $mes ='Noviembre';
                        break;
                    case 12: $mes ='Diciembre';
                        break;
                    default:
                        # code...
                        break;
                }
                $data[$mes] = $userData;
                
            }
            return json_encode($data);

        } catch (PDOException $e) {
            return '{"status":false, "message":'.$e.'}';
        }
        
    }
}
?>