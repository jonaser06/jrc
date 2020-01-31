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
    <!-- editar -->
    <div class="modal modal-info fade" id="modal-info">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="updateuser" method="POST" autocomplete="off">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Editar Usuario</h4>
                </div>
                <div class="modal-body" id="form_edit_user">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline">Actualizar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- eliminar -->
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="removeuser" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Eliminar Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <p>Esta seguro que desea eliminar este Usuario?</p>
                        <div id="form_delete_user"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline">Confirmar eliminacion</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- cambiar contraseña -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="changepassword" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Cambiar Contraseña</h4>
                    </div>
                    <div class="modal-body" id="form_edit_pass">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
                        <ul class="user_pagination pagination pagination-sm no-margin pull-right"></ul>
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
                            <?php
                                if($_SESSION['rol']=='super administrador'){
                                    echo '<tbody id="tbl_listuser_superadmin"></tbody>';
                                }
                                if($_SESSION['rol']=='administrador'){
                                    echo '<tbody id="tbl_listuser_admin"></tbody>';
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>