<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Registro de usuario
      </h1>
    </section>
    <style>
        td{
            font-size: 14px;
            font-weight: 600 !important;
        }
    </style>
    <div class="modal modal-info fade" id="modal-info">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="updateuser" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Editar Usuario</h4>
                </div>
                <div class="modal-body" id="form_edit_user">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline">Actualizar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Usuarios</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Dni</th>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Equipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_listuser"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>