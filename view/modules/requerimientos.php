<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Requerimientos
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form class="form-horizontal" action="setrequerimientos" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NOMBRE DE MECANICO:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nombre" class="form-control" value="<?php echo $_SESSION['nombres']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">DESCRIPCION:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="descripcion">
                                            <option>ACEITE DE MOTOR</option>
                                            <option>ACEITE MANDOS FINALES</option>
                                            <option>ACEITE PARA DIFERENCIAL</option>
                                            <option>ACEITE HIDRAULICO</option>
                                            <option>FILTROS DE COMBUSTIBLE</option>
                                            <option>FILTRO SEPARADOR DE AGUA EN EL COMBUSTIBLE</option>
                                            <option>FILTRO ADMISION PRIMARIO</option>
                                            <option>FILTRO ADMISION SECUNDARIO</option>
                                            <option>FILTRO HIDRAULICO</option>
                                            <option>FILTRO DE TRANSMISION</option>
                                            <option>TRAPOS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">OTROS:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="otros" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">CANTIDAD:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="cantidad" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </section>
  </div>