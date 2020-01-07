<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Registro de usuario
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form class="form-horizontal registroform" method="POST" action="registrarusuario" autocomplete="off">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NOMBRES:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">DNI:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="dni" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">USUARIO:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="users" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-2 control-label">CONTRASEÑA:</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="pass" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">PERFIL:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="rol" required>
                                            <option value="1">MECANICO</option>
                                            <option value="2">ADMINISTRADOR</option>
                                        </select>
                                    </div>
                                </div>
                                <input name="origen" type="hidden" value="2">
                            <button type="submit" class="btn btn-block btn-primary registro">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </section>
  </div>