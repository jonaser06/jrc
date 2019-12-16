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
                        <form action="updatereporte" method="POST" class="form-horizontal">
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
                                    <label class="col-sm-2 control-label">HORAS:</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="number" class="form-control" name="hora">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">EQUIPO DE TRABAJO:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="equipotrabajo" value="<?php echo $maquina->nombre; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">DESCRIPCION:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="descripcion">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NRO DE FALLAS DEL EQUIPO:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nrofallas">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">TIEMPO DE PARADA TOTAL:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="paradatotal">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-block btn-primary" value="Enviar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </section>
  </div>