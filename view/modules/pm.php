<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Asigancion de maquinaria
        <small>Control panel</small>
        </h1>
    </section>

    <section class="content" id="capture">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">SERVICIO DE MANTENIMIENTO</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">EQUIPO:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="PM <?php echo $_GET['n'];?>">
                                </div>
                                <label class="col-sm-2 control-label">FECHA:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">HOROMETRO:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control">
                                </div>
                                <label class="col-sm-2 control-label">MAN Nº:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">TURNO:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control">
                                </div>
                                <label class="col-sm-2 control-label">ELECTRICISTA:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">CHECK LIST Nº:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control">
                                </div>
                                <label class="col-sm-2 control-label">% COMPLETADO:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker3">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead class="table-head">
                                        <tr>
                                            <td style="width: 90%;">Seguridad</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <tr>
                                            <td>utilizar los EPP's respectivos </td>
                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                        </tr>
                                        <tr>
                                            <td>apagar el motor, aplicar freno de parqueo </td>
                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                        </tr>
                                        <tr>
                                            <td>desactivar el master switch </td>
                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                        </tr>
                                        <tr>
                                            <td>colocar tacos para evitar movimientos </td>
                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                        </tr>
                                        <tr>
                                            <td>revisar la alarma de retroceso </td>
                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                        </tr>
                                        <tr>
                                            <td>revisar estado de correa de seguridad </td>
                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                        </tr>
                                        <tr>
                                            <td>extintor, cinta reflectiva y cono </td>
                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-default collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">MOTOR DIESEL</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-bordered table-hover dataTable">
                                                    <tbody class="table-body">
                                                        <tr>
                                                            <td>CAMBIO DE ACEITE DE MOTOR (SAE 15W-40)</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE FILTRO DE ACEITE DE MOTOR</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE FILTROS DE COMBUSTIBLE</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DEL FILTRO SEPARADOR DE AGUA DEL COMBUSTIBLE </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO FILTRO ADMISION PRIMARIO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO FILTRO ADMISION SECUNDARIO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE EMPAQUE DE CATALIZADOR </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE ORING DE TAPA DE CARTER</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE KIT DE TAPA DE COMBUSTIBLE</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR EL NIVEL DE REGRIGERANTE DEL RADIADOR</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>LAVADO DEL RADIADOR, INTERCOOLER Y ENFRIADOR HIDRAULICO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>LAVADO DE PTX O CATALIZADOR </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICACIÓN DE FAJAS DE MOTOR, ALTERNADOR Y COMBUSTIBLE</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR HERMETICIDAD DE SISTEMA DE ADMISION DE AIRE </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR ESTADO DEL PORTAFILTROS DE ADMISION </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR HERMETICIDAD DEL SISTEMA DE ESCAPE </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR ESTADO DE ALIMENTACION DE COMBUSTIBLE</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR ESTADO DE MANGUERAS ALIMENTACION DE COMBUSTIBLE</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR ESTADO DE HELICIES DEL VENTILADOR </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DEL CABLE DE ACELERACION DE PEDAL </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DE LAS RPM EN ALTA/BAJ EN VACIO 700 ± 10/2362 ± 60 RPM</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DE LAS RPM EN PLENA CARGA 2200 ± 10 RPM </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DE LAS RPM EN CALADO 1960 ± 70 RPM</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DE LA TEMPERATURA DE ADMISION DE AIRE 10 A 50°C </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DE LA TEMPERATURA DE AIRE DESPUES DEL TURBO 148°C</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DE LA TEMPERATURA DE AIRE DESPUES DEL POST ENFRIADOR 43°C</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR LA LUZ DE LAS VALVULAS DE ADM. Y ESC. ( 0.38 ± 0.008mm Y 0.64 ± 0.08mm )</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="box box-default collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">SISTEMA DE TRANSMISION</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-bordered table-hover dataTable">
                                                    <tbody class="table-body">
                                                        <tr>
                                                            <td>CAMBIO DE FILTRO DE TRANSMISION </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE ORING DEL FILTRO DE TRANSMISION </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE FILTRO MAGNETICO DEL CONVERTIDOR</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE TAPONES DE MF Y DIFERENCIALES </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE ACEITE DE DIFERENCIALES Y MANDOS FINALES </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE TRANSMISION</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR FUGA DE ACEITE POR EL CONVERTIDOR Y LA CAJA DE TRANSMISION </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR ESTADO Y LIMPIEZA DE RESPIRADOR DE LA CAJA DE TRANSMISION </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CERIFICAR ESTADO DE LA JUNTA CARDANICA </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE ACEITE DE TRANSMISION EN ALTA RPM 152 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE SALIDA DEL CONVERTIDOR EN ALTA RPM 415 A 550 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE ENTRADA AL CONVERTIDOR EN ALTA RPM 980 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE EMBRAGUE DE V. EN NEUTRO EN BAJA RPM 550 ± 35 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE EMBRAGUE DE DIRECCION EN BAJA  Y ALTA RPM 380 ± 55 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE EMBRAGUE DE V. EN MARCHA F O R EN BAJA RPM 2550 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE EMBRAGUE DE V. EN MARCHA F O R EN ALTA RPM 2206 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE BOMBA EN BAJA RPM 2150 KPA </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE BOMBA EN ALTA RPM 2150 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ISPECCION DE PINES Y BOCINAS DE DIRECCION </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ISPECCION DE BOCINAS DEL EJE OSCILANTE  </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ISPECCION DE FUGAS DE ACEITE POR LOS RETENES EN LOS DIFERENCIALES </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR ESTADO DE EJES CARDANICOS </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <div class="box box-default collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">SISTEMA HIDRAULICO</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-bordered table-hover dataTable">
                                                    <tbody class="table-body">
                                                        <tr>
                                                            <td>CAMBIO DE FILTRO HIDRAULICO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CAMBIO DE ORING DE TAPA DE FILTRO HIDRULICO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DEL NIVEL DE ACEITE HIDRAULICO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DE LA SUJECION DE LA BOMBA DE IMPLEMENTOS, DIRECCION Y CARGA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DE FUGAS DE ACEITE HIDRAULICO POR TODO EL SISTEMA </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR LA PRESION PILOTO 2410 ± 140 KP</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR LA PRESION DE VALVULA DE ALIVIO DE IMPLEMENTOS 18965 ± 345 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR LA PRESON DE VALVULA DE ALIVO DE DIRECCION 17250 ± 550 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION VALVULA DE CARGA DE ACUMULADORES CUT OUT 14140 - 14830 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE VALULA DE CARGA DE ACUMULADORES CUT IN 11380 -12070 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE FRENOS DE SERVICIO 6890 ±  345 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE FRENOS DE PARQUEO 3450 ±  140 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ISPECCION DE LA BOMBA DE DIRECCION, FRENOS E IMPLEMENTOS </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>INSPECCION DE VALVULAS EN GENERAL </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>INSPECCION D ELOS CILINDROS DE LEVANTE Y VOLTEO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>INSPECCION DE LOS CILINDROS HIDRAULICOS DE DIRECCION </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISION DEL ESTADO DE LAS MANGUERAS EN GENERAL </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="box box-default collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">SISTEMA DE FRENOS</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-bordered table-hover dataTable">
                                                    <tbody class="table-body">
                                                        <tr>
                                                            <td>VERIFICAR LA CARGA DEL ACUMULADOR </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE VALVULA DE CARGA DE ACUMULADORES CUT OUT 14140 - 14830 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE VALVULA DE CARGA DE ACUMULADORES CUT IN 11380 - 12070 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE FRENOS DE SERVICIO 6890 ± 345 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VER. PRESION DE FRENOS DE PARQUEO 3450 KPA ± 140 KPA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR EL PEDAL DEL FRENO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR LAS CAÑERIAS Y CONEXIONES EN LOS DIFERENCIALES </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR EL ESTADO DE LAS MANGUERAS EN GENERAL </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR EL FUNCIONAMIENTO DEL FRENO DE PARQUEO</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR EL FUNCIONAMIENTO DEL FRENO DE SERVICIO</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="box box-default collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">SISTEMA ELECTRICO</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-bordered table-hover dataTable">
                                                    <tbody class="table-body">
                                                        <tr>
                                                            <td>REV. EL ESTADO DE ARRANCADOR Y ALTERNADOR </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR CARGA DEL ALTERNADOR </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>LIMPIAR Y REVISAR EL ESTADO DE LAS BATERIAS </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REV. ESTADO DE CLAXON, CIRCULINA Y ALARMA DE RETROCESO</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISAR ESTADO DEL JOSTICK DE DIRECCION E IMPLEMENTOS</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISAR EL FUNCIONAMINETO DE LOS INDICADORES DEL PANEL DE CONTROL</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VERIFICAR EL ESTADO DE LOS FAROS EN GENERAL </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="box box-default collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">CHASIS</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-bordered table-hover dataTable">
                                                    <tbody class="table-body">
                                                        <tr>
                                                            <td>ISPECCION DE TUERCAS Y ESPARRAGOS DE RUEDA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISAR EL ESTADO DE PINES Y BOCINAS DE LOS CILINDROS</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>REVISAR EL ESTADO DE SOLDADURA DE LA CUCHARA </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>INSPECCION DE NEUMATICOS 1, 2, 3, 4</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ISPECCION DEL ESTADO DE LA CUCHARA</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ISPECCION DEL ESTADO DE LA CUCHARA Y EL HUESO DE PERRO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="box box-default collapsed-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">ENGRASE</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-bordered table-hover dataTable">
                                                    <tbody class="table-body">
                                                        <tr>
                                                            <td>ENGRASE DE PINES DE LA ARTICULACION CENTRAL </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ENGRASE DE PINES DEL CUCHARON </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>DEL HUESO DE PERRO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ENGRASE DE PINES DE CILINDRO Y BRAZO DE LEVANTE Y VOLTEO </td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ENGRASE DE EJE OSCILANE</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ENGRASE DE PINES DE CILINDRO DE DIRECCION</td>
                                                            <td class="checkbox-table"><input type="checkbox" class="form-check-input"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">TRABAJOS DE REPARACION :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">PENDIENTES DE MANTENIMIENTO :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="content">
                                <div class="row">
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
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="elementH"></div>
</div>