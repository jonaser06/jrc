<?php

require_once 'config.php';

class maquinasClassModel{

    public static function tableSgModel($psg){
        try {

            $db         = getDB();
            #insertar
            $sql1       =  "INSERT INTO tablesg (PSG_1, PSG_2, PSG_3, PSG_4, PSG_5, PSG_6, PSG_7)
                            VALUES (:PSG_1, :PSG_2, :PSG_3, :PSG_4, :PSG_5, :PSG_6, :PSG_7)";
            $stmt1      =   $db->prepare($sql1);
            $stmt1->bindParam("PSG_1", $psg['PSG_1'],PDO::PARAM_STR);
            $stmt1->bindParam("PSG_2", $psg['PSG_2'],PDO::PARAM_STR);
            $stmt1->bindParam("PSG_3", $psg['PSG_3'],PDO::PARAM_STR);
            $stmt1->bindParam("PSG_4", $psg['PSG_4'],PDO::PARAM_STR);
            $stmt1->bindParam("PSG_5", $psg['PSG_5'],PDO::PARAM_STR);
            $stmt1->bindParam("PSG_6", $psg['PSG_6'],PDO::PARAM_STR);
            $stmt1->bindParam("PSG_7", $psg['PSG_7'],PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;

            #obtener ultimo id
            $db         = getDB();
            $sql        = "SELECT id_SG FROM tablesg ORDER BY id_SG DESC LIMIT 1";
            $stmt       =   $db->prepare($sql);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function tableEnModel($pen){
        try {

            $db         = getDB();
            #insertar
            $sql1       =  "INSERT INTO tableen (PEN_1, PEN_2, PEN_3, PEN_4, PEN_5, PEN_6)
                            VALUES (:PEN_1, :PEN_2, :PEN_3, :PEN_4, :PEN_5, :PEN_6)";
            $stmt1      =   $db->prepare($sql1);
            $stmt1->bindParam("PEN_1", $pen['PEN_1'],PDO::PARAM_STR);
            $stmt1->bindParam("PEN_2", $pen['PEN_2'],PDO::PARAM_STR);
            $stmt1->bindParam("PEN_3", $pen['PEN_3'],PDO::PARAM_STR);
            $stmt1->bindParam("PEN_4", $pen['PEN_4'],PDO::PARAM_STR);
            $stmt1->bindParam("PEN_5", $pen['PEN_5'],PDO::PARAM_STR);
            $stmt1->bindParam("PEN_6", $pen['PEN_6'],PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;

            #obtener ultimo id
            $db         = getDB();
            $sql        = "SELECT id_EN FROM tableen ORDER BY id_EN DESC LIMIT 1";
            $stmt       =   $db->prepare($sql);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function tableMdModel($pmd){
        try {

            $db         = getDB();
            #insertar
            $sql1       =  "INSERT INTO tablemd (PMD_1, PMD_2, PMD_3, PMD_4, PMD_5, PMD_6, PMD_7, PMD_8, PMD_9, PMD_10, PMD_11, PMD_12, PMD_13, PMD_14, PMD_15, PMD_16, PMD_17, PMD_18, PMD_19, PMD_20, PMD_21, PMD_22, PMD_23, PMD_24, PMD_25, PMD_26, PMD_27)
                            VALUES (:PMD_1, :PMD_2, :PMD_3, :PMD_4, :PMD_5, :PMD_6, :PMD_7, :PMD_8, :PMD_9, :PMD_10, :PMD_11, :PMD_12, :PMD_13, :PMD_14, :PMD_15, :PMD_16, :PMD_17, :PMD_18, :PMD_19, :PMD_20, :PMD_21, :PMD_22, :PMD_23, :PMD_24, :PMD_25, :PMD_26, :PMD_27)";
            $stmt1      =   $db->prepare($sql1);
            $stmt1->bindParam("PMD_1", $pmd['PMD_1'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_2", $pmd['PMD_2'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_3", $pmd['PMD_3'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_4", $pmd['PMD_4'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_5", $pmd['PMD_5'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_6", $pmd['PMD_6'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_7", $pmd['PMD_7'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_8", $pmd['PMD_8'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_9", $pmd['PMD_9'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_10", $pmd['PMD_10'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_11", $pmd['PMD_11'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_12", $pmd['PMD_12'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_13", $pmd['PMD_13'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_14", $pmd['PMD_14'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_15", $pmd['PMD_15'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_16", $pmd['PMD_16'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_17", $pmd['PMD_17'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_18", $pmd['PMD_18'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_19", $pmd['PMD_19'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_20", $pmd['PMD_20'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_21", $pmd['PMD_21'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_22", $pmd['PMD_22'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_23", $pmd['PMD_23'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_24", $pmd['PMD_24'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_25", $pmd['PMD_25'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_26", $pmd['PMD_26'],PDO::PARAM_STR);
            $stmt1->bindParam("PMD_27", $pmd['PMD_27'],PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;

            #obtener ultimo id
            $db         = getDB();
            $sql        = "SELECT id_MD FROM tablemd ORDER BY id_MD DESC LIMIT 1";
            $stmt       =   $db->prepare($sql);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function tableSeModel($pse){
        try {

            $db         = getDB();
            #insertar
            $sql1       =  "INSERT INTO tablese (PSE_1, PSE_2, PSE_3, PSE_4, PSE_5, PSE_6, PSE_7)
                            VALUES (:PSE_1, :PSE_2, :PSE_3, :PSE_4, :PSE_5, :PSE_6, :PSE_7)";
            $stmt1      =   $db->prepare($sql1);
            $stmt1->bindParam("PSE_1", $pse['PSE_1'],PDO::PARAM_STR);
            $stmt1->bindParam("PSE_2", $pse['PSE_2'],PDO::PARAM_STR);
            $stmt1->bindParam("PSE_3", $pse['PSE_3'],PDO::PARAM_STR);
            $stmt1->bindParam("PSE_4", $pse['PSE_4'],PDO::PARAM_STR);
            $stmt1->bindParam("PSE_5", $pse['PSE_5'],PDO::PARAM_STR);
            $stmt1->bindParam("PSE_6", $pse['PSE_6'],PDO::PARAM_STR);
            $stmt1->bindParam("PSE_7", $pse['PSE_7'],PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;

            #obtener ultimo id
            $db         = getDB();
            $sql        = "SELECT id_SE FROM tablese ORDER BY id_SE DESC LIMIT 1";
            $stmt       =   $db->prepare($sql);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function tableSfModel($psf){
        try {

            $db         = getDB();
            #insertar
            $sql1       =  "INSERT INTO tablesf (PSF_1, PSF_2, PSF_3, PSF_4, PSF_5, PSF_6, PSF_7, PSF_8, PSF_9, PSF_10)
                            VALUES (:PSF_1, :PSF_2, :PSF_3, :PSF_4, :PSF_5, :PSF_6, :PSF_7, :PSF_8, :PSF_9, :PSF_10)";
            $stmt1      =   $db->prepare($sql1);
            $stmt1->bindParam("PSF_1", $psf['PSF_1'],PDO::PARAM_STR);
            $stmt1->bindParam("PSF_2", $psf['PSF_2'],PDO::PARAM_STR);
            $stmt1->bindParam("PSF_3", $psf['PSF_3'],PDO::PARAM_STR);
            $stmt1->bindParam("PSF_4", $psf['PSF_4'],PDO::PARAM_STR);
            $stmt1->bindParam("PSF_5", $psf['PSF_5'],PDO::PARAM_STR);
            $stmt1->bindParam("PSF_6", $psf['PSF_6'],PDO::PARAM_STR);
            $stmt1->bindParam("PSF_7", $psf['PSF_7'],PDO::PARAM_STR);
            $stmt1->bindParam("PSF_8", $psf['PSF_8'],PDO::PARAM_STR);
            $stmt1->bindParam("PSF_9", $psf['PSF_9'],PDO::PARAM_STR);
            $stmt1->bindParam("PSF_10", $psf['PSF_10'],PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;

            #obtener ultimo id
            $db         = getDB();
            $sql        = "SELECT id_SF FROM tablesf ORDER BY id_SF DESC LIMIT 1";
            $stmt       =   $db->prepare($sql);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function tableChModel($pch){
        try {

            $db         = getDB();
            #insertar
            $sql1       =  "INSERT INTO tablech (PCH_1, PCH_2, PCH_3, PCH_4, PCH_5, PCH_6)
                            VALUES (:PCH_1, :PCH_2, :PCH_3, :PCH_4, :PCH_5, :PCH_6)";
            $stmt1      =   $db->prepare($sql1);
            $stmt1->bindParam("PCH_1", $pch['PCH_1'],PDO::PARAM_STR);
            $stmt1->bindParam("PCH_2", $pch['PCH_2'],PDO::PARAM_STR);
            $stmt1->bindParam("PCH_3", $pch['PCH_3'],PDO::PARAM_STR);
            $stmt1->bindParam("PCH_4", $pch['PCH_4'],PDO::PARAM_STR);
            $stmt1->bindParam("PCH_5", $pch['PCH_5'],PDO::PARAM_STR);
            $stmt1->bindParam("PCH_6", $pch['PCH_6'],PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;

            #obtener ultimo id
            $db         = getDB();
            $sql        = "SELECT id_CH FROM tablech ORDER BY id_CH DESC LIMIT 1";
            $stmt       =   $db->prepare($sql);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    public static function tableShModel($psh){
        try {

            $db         = getDB();
            #insertar
            $sql1       =  "INSERT INTO tablesh (PSH_1, PSH_2, PSH_3, PSH_4, PSH_5, PSH_6, PSH_7, PSH_8, PSH_9, PSH_10, PSH_11, PSH_12, PSH_13, PSH_14, PSH_15, PSH_16, PSH_17)
                            VALUES (:PSH_1, :PSH_2, :PSH_3, :PSH_4, :PSH_5, :PSH_6, :PSH_7, :PSH_8, :PSH_9, :PSH_10, :PSH_11, :PSH_12, :PSH_13, :PSH_14, :PSH_15, :PSH_16, :PSH_17)";
            $stmt1      =   $db->prepare($sql1);
            $stmt1->bindParam("PSH_1", $psh['PSH_1'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_2", $psh['PSH_2'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_3", $psh['PSH_3'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_4", $psh['PSH_4'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_5", $psh['PSH_5'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_6", $psh['PSH_6'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_7", $psh['PSH_7'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_8", $psh['PSH_8'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_9", $psh['PSH_9'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_10", $psh['PSH_10'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_11", $psh['PSH_11'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_12", $psh['PSH_12'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_13", $psh['PSH_13'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_14", $psh['PSH_14'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_15", $psh['PSH_15'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_16", $psh['PSH_16'],PDO::PARAM_STR);
            $stmt1->bindParam("PSH_17", $psh['PSH_17'],PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;

            #obtener ultimo id
            $db         = getDB();
            $sql        = "SELECT id_SH FROM tablesh ORDER BY id_SH DESC LIMIT 1";
            $stmt       =   $db->prepare($sql);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function tableStModel($pst){
        try {

            $db         = getDB();
            #insertar
            $sql1       =  "INSERT INTO tablest (PST_1, PST_2, PST_3, PST_4, PST_5, PST_6, PST_7, PST_8, PST_9, PST_10, PST_11, PST_12, PST_13, PST_14, PST_15, PST_16, PST_17, PST_18, PST_19, PST_20, PST_21, PST_22)
                            VALUES (:PST_1, :PST_2, :PST_3, :PST_4, :PST_5, :PST_6, :PST_7, :PST_8, :PST_9, :PST_10, :PST_11, :PST_12, :PST_13, :PST_14, :PST_15, :PST_16, :PST_17, :PST_18, :PST_19, :PST_20, :PST_21, :PST_22)";
            $stmt1      =   $db->prepare($sql1);
            $stmt1->bindParam("PST_1", $pst['PST_1'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_2", $pst['PST_2'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_3", $pst['PST_3'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_4", $pst['PST_4'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_5", $pst['PST_5'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_6", $pst['PST_6'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_7", $pst['PST_7'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_8", $pst['PST_8'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_9", $pst['PST_9'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_10", $pst['PST_10'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_11", $pst['PST_11'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_12", $pst['PST_12'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_13", $pst['PST_13'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_14", $pst['PST_14'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_15", $pst['PST_15'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_16", $pst['PST_16'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_17", $pst['PST_17'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_18", $pst['PST_18'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_19", $pst['PST_19'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_20", $pst['PST_20'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_21", $pst['PST_21'],PDO::PARAM_STR);
            $stmt1->bindParam("PST_22", $pst['PST_22'],PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;

            #obtener ultimo id
            $db         = getDB();
            $sql        = "SELECT id_ST FROM tablest ORDER BY id_ST DESC LIMIT 1";
            $stmt       =   $db->prepare($sql);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>