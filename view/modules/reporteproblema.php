<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                        <form class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NOMBRE DE USUARIO:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="<?php echo $_SESSION['nombres']; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">INCIDENTE:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">FECHA:</label>
                                    <div class="fa fa-calendar">
                                        <input type="text" class="form-control" id="datepicker">
                                    </div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">HORA:</label>
                                    <div class="fa fa-clock-o">
                                        <input type="text" class="form-control" id="timepicker">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-block btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </section>
  </div>