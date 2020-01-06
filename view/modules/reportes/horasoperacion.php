<div class="box">
    <div class="box-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-7 control-label">HORAS DE OPERACION</label>
            </div>
            <div class="form-group">
                <div class="container">
                    <div class="col-sm-6 col-sm-offset-3">
                        <label class="col-sm-2 control-label">Seleccione:</label>
                        <div class="col-sm-10">
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
                        <input type="button" class="col-md-8 btn btn-block btn-primary consulta_operacion" value="Consultar">
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
                    <td colspan="5">Equipo</td>
                    <td colspan="12"><div class="setyear"></div></td>
                    <td rowspan="2">Prom.<br><div class="setyear"></div></td>
                </tr>
                <tr>
                    <td>Cód.<br>Operativo</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Serie</td>
                    <td>Componente</td>
                    <td>Ene</td>
                    <td>Feb</td>
                    <td>Mar</td>
                    <td>Abr</td>
                    <td>May</td>
                    <td>Jun</td>
                    <td>Jul</td>
                    <td>Ago</td>
                    <td>Sep</td>
                    <td>Oct</td>
                    <td>Nov</td>
                    <td>Dic</td>
                </tr>
            </thead>
            <tbody id="tbl_horasoperacion"></tbody>
            <tfoot id="tbl_horasoperacion_foot"></tfoot>
        </table>
    </div>
</div>