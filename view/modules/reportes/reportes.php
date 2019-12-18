<div class="box">
    <div class="box-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-7 control-label">NOMBRE DEL REPORTE:</label>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">DE:</label>
                <div class="col-sm-5">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control de" id="datepicker">
                    </div>
                </div>
                <label class="col-sm-1 control-label">HASTA:</label>
                <div class="col-sm-5">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control hasta" id="datepicker2">
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <input type="button" class="col-md-8 btn btn-block btn-primary consulta" value="Consultar">
            </div>
        </form>
    </div>
    <div class="box-footer">
        <style>
            td{
                font-size: 14px;
            }
        </style>
        <table class="table table-bordered table-hover dataTable" style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 5%;">Familia</th>
                    <th style="width: 5%;">Equipo</th>
                    <th style="width: 10%;">Marca</th>
                    <th style="width: 10%;">Modelo</th>
                    <th style="width: 10%;">Componente</th>
                    <th style="width: 5%;">Horas de Trabajo Diario</th>
                    <th style="width: 5%;">Matto Correc ( Hrs. ) </th>
                    <th style="width: 10%;">Util. (Util) </th>
                    <th style="width: 30%;">Comentarios</th>
                    <th style="width: 10%;">Estado</th>

                    <!-- <th>Inicio de jornada</th>
                    <th>Fin de jornada</th>
                    <th>Hora Acumulada</th>
                    <th>Descripcion</th>
                    <th>Fallas de Equipo</th>
                    <th>Tiempo de parada</th> -->
                </tr>
            </thead>
            <tbody id="tbl"></tbody>
        </table>
    </div>
</div>