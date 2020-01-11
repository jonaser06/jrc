<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Asignación de maquinaria
        <small>Control panel</small>
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form class="form-horizontal" action="asignarmaquina" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">NOMBRE DEL MECANICO:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="usuario" id="list_user"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">MAQUINARIA ASIGNADA:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="maquina">
                                        <option value="1">2SC019</option>
                                        <option value="2">2SC022</option>
                                        <option value="3">2SC026</option>
                                        <option value="4">2SC029</option>
                                        <option value="5">2SC035</option>
                                        <option value="6">2SC037</option>
                                        <option value="7">2JL003</option>
                                        <option value="8">2JL015</option>
                                        <option value="9">2JL016</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">DE:</label>
                                <div class="col-sm-4">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" name="desde" id="datepicker2">
                                    </div>
                                </div>
                                <label class="col-sm-1 control-label">HASTA:</label>
                                <div class="col-sm-5">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" name="hasta" id="datepicker2">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Asignar maquina</button>
                        </form>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>