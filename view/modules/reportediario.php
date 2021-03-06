<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte Diario
      </h1>
    </section>

    <section class="content">
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <a class="btn btn-app">
                            <i class="fa fa-wrench"></i> 2SC019
                        </a>
                        <a class="btn btn-app">
                            <i class="fa fa-wrench"></i> 2SR022
                        </a>
                        <a class="btn btn-app">
                            <i class="fa fa-wrench"></i> 2SC029
                        </a>
                        <a class="btn btn-app">
                            <i class="fa fa-wrench"></i> 2SC035
                        </a>
                        <a class="btn btn-app">
                            <i class="fa fa-wrench"></i> 2SC037
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form action="updatereporte" method="POST" class="form-horizontal" autocomplete="off">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">INICIO JORNADA:</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datepicker" name="iniciojornada">
                                        </div>
                                    </div>
                                    <label class="col-sm-2 control-label">HORAS ACUMULADAS:</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control" name="horaacumulada" value="<?php echo $maquina->horas_acumuladas; ?>" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">FIN JORNADA:</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datepicker2" name="finjornada">
                                        </div>
                                    </div>
                                    <label class="col-sm-2 control-label">HORAS TRABAJADAS:</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="number" class="form-control" name="hora" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">EQUIPO DE TRABAJO:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="equipotrabajo" value="<?php echo $maquina->nombre; ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label class="col-sm-2 control-label">DESCRIPCION:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="descripcion" required >
                                    </div>

                                    <label class="col-sm-1 control-label">NRO DE FALLAS DEL EQUIPO:</label>
                                    <div class="col-sm-1">
                                        <input type="number" class="form-control" name="nrofallas" value="0">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label class="col-sm-1 control-label">TIEMPO DE PARADA TOTAL:</label>
                                    <div class="col-sm-1">
                                        <input type="number" class="form-control" name="paradatotal" value="0">
                                    </div>

                                    <label class="col-sm-1 control-label">HORAS de MANTENIMIENTO PROGRAMADO:</label>
                                    <div class="col-sm-1">
                                        <input type="number" class="form-control" name="homp" value="0">
                                    </div>

                                    <label class="col-sm-1 control-label">INSPECCIÓN:</label>
                                    <div class="col-sm-1">
                                        <input type="number" class="form-control" name="inspect" value="0">
                                    </div>

                                    <label class="col-sm-1 control-label">MANTENIMIENTO PREVENTIVO:</label>
                                    <div class="col-sm-1">
                                        <input type="number" class="form-control" name="prevent" value="0">
                                    </div>

                                    <label class="col-sm-1 control-label">OTROS ACCIDENTES:</label>
                                    <div class="col-sm-1">
                                        <input type="number" class="form-control" name="otrosacci" value="0">
                                    </div>

                                    <label class="col-sm-1 control-label">REPARACION  CORRECTIVA:</label>
                                    <div class="col-sm-1">
                                        <input type="number" class="form-control" name="repcorrect" value="0">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-block btn-primary" value="Guardar"> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </section>
  </div>