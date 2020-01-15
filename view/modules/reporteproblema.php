<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Reporte de problema
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form class="form-horizontal" action="setreporteproblema" method="POST" autocomplete="off">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NOMBRE DE USUARIO:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nameUser" value="<?php echo $_SESSION['nombres']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">INCIDENTE:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inc" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">FECHA:</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="fecha" id="datepicker" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">HORA:</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control" name="hora" id="timepicker">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Reportar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </section>
  </div>