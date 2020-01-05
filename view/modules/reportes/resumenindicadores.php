<div class="box">
    <div class="box-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-7 control-label">RESUMEN INDICADORES</label>
            </div>
            <div class="form-group">
                <div class="container">
                    <div class="col-sm-8 col-sm-offset-2">
                        <label class="col-sm-2 control-label">Seleccione:</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="" id="month">
                                <?php
                                    $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
                                    for ($i=0; $i < count($meses) ; $i++) { 
                                        echo '<option value="'.($i+1).'">'.$meses[$i].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <select class="form-control" name="" id="years">
                                <?php
                                    $year = ["2019","2020","2021"];
                                    for ($i=0; $i < count($year) ; $i++) { 
                                        echo '<option value="'.$year[$i].'">'.$year[$i].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-6 col-md-offset-3">
                        <input type="button" class="col-md-8 btn btn-block btn-primary consulta_indicador" value="Consultar">
                    </div>
                </div>
            </div>
            
        </form>
    </div>
    <style>
        tr,td{
            border: 1px solid #ccc;
            font-size: 12px;
            text-align: center;
        }
    </style>
    <div class="box-footer">
        <ul class="pagination_resumen pagination pagination-sm no-margin pull-right"></ul>
        <br><br>
        <table class="table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <td colspan="6">Caracteristicas</td>
                    <td colspan="2">Horometros</td>
                    <td colspan="4">Mantenimiento</td>
                    <td rowspan="2">Rep.<br>Accid.</td>
                    <td colspan="3">Indicadores</td>
                </tr>
                <tr>
                    <td>Cod.<br>Operativo</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Serie</td>
                    <td>Componente</td>
                    <td>Ubicación</td>
                    <td>Mes</td>
                    <td>Acumulado</td>
                    <td>Insp.</td>
                    <td>Prev.</td>
                    <td>Prog.</td>
                    <td>Correc.</td>
                    <td>DM</td>
                    <td>MTBF</td>
                    <td>MTTR</td>
                </tr>
            </thead>
            <tbody id="tbl_resumenindicadores"></tbody>
            <tfoot id="tbl_resumenindicadores_foot"></tfoot>
        </table>
    </div>
</div>