<div class="content-wrapper">
    <section class="content-header">
        <h1>
        SERVICIO DE MANTENIMIENTO
        </h1>
    </section>

    <section class="content" id="capture">
        <form class="form-horizontal" method="POST" action="mantenimiento" autocomplete="off">
            <div class="row">
                <div class="col-md-12">

                    <div class="box">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">EQUIPO:</label>
                                <div class="col-sm-2">
                                    <input type="hidden" name="id_usuarios" value="<?php echo $user->id_usuarios; ?>">
                                    <input type="hidden" name="id_maquina" value="<?php echo $user->id_maquina; ?>">
                                    <input type="text" class="form-control" name="maquina" value="<?php echo $user->maquina; ?>">
                                </div>

                                <label class="col-sm-1 control-label">FECHA:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="fecha" id="datepicker3">
                                </div>

                                <label class="col-sm-1 control-label">TURNO:</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="turno">
                                        <option>DIA</option>
                                        <option>NOCHE</option>
                                    </select>
                                </div>

                                <label class="col-sm-1 control-label">HOROMETRO:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="horometro" value="<?php echo $maquina->horas_acumuladas; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">MANT Nº:</label>
                                <div class="col-sm-3">
                                    <?php
                                        $n = (int)$pm->id_mantenimiento;
                                        $n++;
                                        $val = sprintf('%08d', $n);
                                        echo '<input type="text" class="form-control" name="mant" value="MAN'.$val.'">';
                                    ?>
                                </div>

                                <label class="col-sm-1 control-label">CHECKLIST:</label>
                                <div class="col-sm-3">
                                    <?php
                                        $n = (int)$pm->id_mantenimiento;
                                        $n++;
                                        $val = sprintf('%08d', $n);
                                        echo '<input type="text" class="form-control" name="checklist" value="'.$val.'">';
                                    ?>
                                </div>

                                <label class="col-sm-1 control-label">ELECTRICISTA:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="electricistas" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable">
                                    <label> SEGURIDAD:</label>
                                    <tbody class="table-body">
                                        <tr>
                                            <td>
                                                <span class="checked fa fa-square-o">
                                                    <input type="checkbox" style="display:none;" name="PSG_1" class="psg">
                                                </span> Utilizar los EPP's respectivos
                                            </td>
                                            <td>
                                                <span class="checked fa fa-square-o">
                                                <input type="checkbox" style="display:none;" name="PSG_2" class="psg">
                                                </span> Apagar el motor, aplicar freno de parqueo
                                            </td>
                                            <td>
                                                <span class="checked fa fa-square-o">
                                                <input type="checkbox" style="display:none;" name="PSG_3" class="psg">
                                                </span> Desactivar el master switch
                                            </td>
                                            <td>
                                                <span class="checked fa fa-square-o">
                                                <input type="checkbox" style="display:none;" name="PSG_4" class="psg">
                                                </span> Colocar tacos para evitar movimientos
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="checked fa fa-square-o">
                                                <input type="checkbox" style="display:none;" name="PSG_5" class="psg">
                                                </span> Revisar la alarma de retroceso
                                            </td>
                                            <td>
                                                <span class="checked fa fa-square-o">
                                                <input type="checkbox" style="display:none;" name="PSG_6" class="psg">
                                                </span> Revisar estado de correa de seguridad
                                            </td>
                                            <td>
                                                <span class="checked fa fa-square-o">
                                                <input type="checkbox" style="display:none;" name="PSG_7" class="psg">
                                                </span> Extintor, cinta reflectiva y cono
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="nav-tabs-custom" style="padding-bottom: 20px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">MOTOR DIESEL</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <table class="table table-bordered table-hover dataTable">
                                            <tbody class="table-body">
                                                <tr>
                                                    <td>CAMBIO DE ACEITE DE MOTOR (SAE 15W-40)</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_1" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE FILTRO DE ACEITE DE MOTOR</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_2" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE FILTROS DE COMBUSTIBLE</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_3" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DEL FILTRO SEPARADOR DE AGUA DEL COMBUSTIBLE </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_4" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO FILTRO ADMISION PRIMARIO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_5" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO FILTRO ADMISION SECUNDARIO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_6" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE EMPAQUE DE CATALIZADOR </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_7" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE ORING DE TAPA DE CARTER</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_8" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE KIT DE TAPA DE COMBUSTIBLE</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_9" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR EL NIVEL DE REGRIGERANTE DEL RADIADOR</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_10" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>LAVADO DEL RADIADOR, INTERCOOLER Y ENFRIADOR HIDRAULICO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_11" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>LAVADO DE PTX O CATALIZADOR </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_12" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICACIÓN DE FAJAS DE MOTOR, ALTERNADOR Y COMBUSTIBLE</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_13" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR HERMETICIDAD DE SISTEMA DE ADMISION DE AIRE </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_14" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR ESTADO DEL PORTAFILTROS DE ADMISION </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_15" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR HERMETICIDAD DEL SISTEMA DE ESCAPE </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_16" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR ESTADO DE ALIMENTACION DE COMBUSTIBLE</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_17" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR ESTADO DE MANGUERAS ALIMENTACION DE COMBUSTIBLE</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_18" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR ESTADO DE HELICIES DEL VENTILADOR </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_19" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DEL CABLE DE ACELERACION DE PEDAL </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_20" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DE LAS RPM EN ALTA/BAJ EN VACIO 700 ± 10/2362 ± 60 RPM</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_21" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DE LAS RPM EN PLENA CARGA 2200 ± 10 RPM </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_22" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DE LAS RPM EN CALADO 1960 ± 70 RPM</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_23" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DE LA TEMPERATURA DE ADMISION DE AIRE 10 A 50°C </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_24" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DE LA TEMPERATURA DE AIRE DESPUES DEL TURBO 148°C</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_25" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DE LA TEMPERATURA DE AIRE DESPUES DEL POST ENFRIADOR 43°C</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_26" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR LA LUZ DE LAS VALVULAS DE ADM. Y ESC. ( 0.38 ± 0.008mm Y 0.64 ± 0.08mm )</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PMD_27" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>                               
                                </div>

                            </div>

                            <div class="nav-tabs-custom" style="padding-bottom: 20px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_7" data-toggle="tab" aria-expanded="false">ENGRASE</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_7">
                                        <table class="table table-bordered table-hover dataTable">
                                            <tbody class="table-body">
                                                <tr>
                                                    <td>ENGRASE DE PINES DE LA ARTICULACION CENTRAL </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PEN_1" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ENGRASE DE PINES DEL CUCHARON </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PEN_2" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>DEL HUESO DE PERRO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PEN_3" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ENGRASE DE PINES DE CILINDRO Y BRAZO DE LEVANTE Y VOLTEO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PEN_4" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ENGRASE DE EJE OSCILANE</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PEN_5" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ENGRASE DE PINES DE CILINDRO DE DIRECCION</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PEN_6" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="nav-tabs-custom" style="padding-bottom: 20px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">SISTEMA DE TRANSMISION</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_2">
                                        <table class="table table-bordered table-hover dataTable">
                                            <tbody class="table-body">
                                                <tr>
                                                    <td>CAMBIO DE FILTRO DE TRANSMISION </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_1" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE ORING DEL FILTRO DE TRANSMISION </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_2" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE FILTRO MAGNETICO DEL CONVERTIDOR</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_3" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE TAPONES DE MF Y DIFERENCIALES </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_4" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE ACEITE DE DIFERENCIALES Y MANDOS FINALES </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_5" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE TRANSMISION</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_6" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR FUGA DE ACEITE POR EL CONVERTIDOR Y LA CAJA DE TRANSMISION </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_7" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR ESTADO Y LIMPIEZA DE RESPIRADOR DE LA CAJA DE TRANSMISION </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_8" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CERIFICAR ESTADO DE LA JUNTA CARDANICA </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_9" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE ACEITE DE TRANSMISION EN ALTA RPM 152 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_10" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE SALIDA DEL CONVERTIDOR EN ALTA RPM 415 A 550 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_11" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE ENTRADA AL CONVERTIDOR EN ALTA RPM 980 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_12" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE EMBRAGUE DE V. EN NEUTRO EN BAJA RPM 550 ± 35 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_13" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE EMBRAGUE DE DIRECCION EN BAJA  Y ALTA RPM 380 ± 55 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_14" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE EMBRAGUE DE V. EN MARCHA F O R EN BAJA RPM 2550 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_15" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE EMBRAGUE DE V. EN MARCHA F O R EN ALTA RPM 2206 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_16" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE BOMBA EN BAJA RPM 2150 KPA </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_17" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE BOMBA EN ALTA RPM 2150 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_18" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ISPECCION DE PINES Y BOCINAS DE DIRECCION </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_19" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ISPECCION DE BOCINAS DEL EJE OSCILANTE  </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_20" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ISPECCION DE FUGAS DE ACEITE POR LOS RETENES EN LOS DIFERENCIALES </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_21" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR ESTADO DE EJES CARDANICOS </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PST_22" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="nav-tabs-custom" style="padding-bottom: 20px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_4" data-toggle="tab" aria-expanded="false">SISTEMA DE FRENOS</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_4">
                                        <table class="table table-bordered table-hover dataTable">
                                            <tbody class="table-body">
                                                <tr>
                                                    <td>VERIFICAR LA CARGA DEL ACUMULADOR </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_1" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE VALVULA DE CARGA DE ACUMULADORES CUT OUT 14140 - 14830 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_2" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE VALVULA DE CARGA DE ACUMULADORES CUT IN 11380 - 12070 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_3" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE FRENOS DE SERVICIO 6890 ± 345 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_4" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE FRENOS DE PARQUEO 3450 KPA ± 140 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_5" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR EL PEDAL DEL FRENO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_6" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR LAS CAÑERIAS Y CONEXIONES EN LOS DIFERENCIALES </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_7" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR EL ESTADO DE LAS MANGUERAS EN GENERAL </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_8" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR EL FUNCIONAMIENTO DEL FRENO DE PARQUEO</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_9" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR EL FUNCIONAMIENTO DEL FRENO DE SERVICIO</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSF_10" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="nav-tabs-custom" style="padding-bottom: 20px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="false">SISTEMA HIDRAULICO</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_3">
                                        <table class="table table-bordered table-hover dataTable">
                                            <tbody class="table-body">
                                                <tr>
                                                    <td>CAMBIO DE FILTRO HIDRAULICO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_1" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CAMBIO DE ORING DE TAPA DE FILTRO HIDRULICO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_2" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DEL NIVEL DE ACEITE HIDRAULICO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_3" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DE LA SUJECION DE LA BOMBA DE IMPLEMENTOS, DIRECCION Y CARGA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_4" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DE FUGAS DE ACEITE HIDRAULICO POR TODO EL SISTEMA </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_5" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR LA PRESION PILOTO 2410 ± 140 KP</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_6" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR LA PRESION DE VALVULA DE ALIVIO DE IMPLEMENTOS 18965 ± 345 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_7" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR LA PRESON DE VALVULA DE ALIVO DE DIRECCION 17250 ± 550 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_8" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION VALVULA DE CARGA DE ACUMULADORES CUT OUT 14140 - 14830 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_9" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE VALULA DE CARGA DE ACUMULADORES CUT IN 11380 -12070 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_10" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE FRENOS DE SERVICIO 6890 ±  345 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_11" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VER. PRESION DE FRENOS DE PARQUEO 3450 ±  140 KPA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_12" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ISPECCION DE LA BOMBA DE DIRECCION, FRENOS E IMPLEMENTOS </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_13" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>INSPECCION DE VALVULAS EN GENERAL </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_14" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>INSPECCION D ELOS CILINDROS DE LEVANTE Y VOLTEO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_15" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>INSPECCION DE LOS CILINDROS HIDRAULICOS DE DIRECCION </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_16" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISION DEL ESTADO DE LAS MANGUERAS EN GENERAL </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSH_17" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="nav-tabs-custom" style="padding-bottom: 20px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_5" data-toggle="tab" aria-expanded="false">SISTEMA ELECTRICO</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_5">
                                        <table class="table table-bordered table-hover dataTable">
                                            <tbody class="table-body">
                                                <tr>
                                                    <td>REV. EL ESTADO DE ARRANCADOR Y ALTERNADOR </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSE_1" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR CARGA DEL ALTERNADOR </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSE_2" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>LIMPIAR Y REVISAR EL ESTADO DE LAS BATERIAS </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSE_3" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REV. ESTADO DE CLAXON, CIRCULINA Y ALARMA DE RETROCESO</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSE_4" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISAR ESTADO DEL JOSTICK DE DIRECCION E IMPLEMENTOS</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSE_5" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISAR EL FUNCIONAMINETO DE LOS INDICADORES DEL PANEL DE CONTROL</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSE_6" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VERIFICAR EL ESTADO DE LOS FAROS EN GENERAL </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PSE_7" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="nav-tabs-custom" style="padding-bottom: 20px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_6" data-toggle="tab" aria-expanded="false">SCHASIS</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_6">
                                        <table class="table table-bordered table-hover dataTable">
                                            <tbody class="table-body">
                                                <tr>
                                                    <td>ISPECCION DE TUERCAS Y ESPARRAGOS DE RUEDA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PCH_1" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISAR EL ESTADO DE PINES Y BOCINAS DE LOS CILINDROS</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PCH_2" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>REVISAR EL ESTADO DE SOLDADURA DE LA CUCHARA </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PCH_3" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>INSPECCION DE NEUMATICOS 1, 2, 3, 4</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PCH_4" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ISPECCION DEL ESTADO DE LA CUCHARA</td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PCH_5" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ISPECCION DEL ESTADO DE LA CUCHARA Y EL HUESO DE PERRO </td>
                                                    <td class="checkbox-table">
                                                        <span class="checked fa fa-square-o">
                                                            <input type="checkbox" style="display:none;" name="PCH_6" class="psg">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">TRABAJOS DE REPARACION :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="trabajos_R">
                                </div>

                                <label class="col-sm-2 control-label">PENDIENTES DE MANTENIMIENTO :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="pendientes_M">
                                </div>
                            </div>
                            <br>
                            <div class="row" style="margin: 1px;">
                                <div class="col-sm-6">
                                    <a href="javascript:getPDF()">
                                        <button type="button" class="btn btn-block  download btn-primary">EXPORTAR PDF</button>
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-block btn-primary">ENVIAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
    </section>
</div>