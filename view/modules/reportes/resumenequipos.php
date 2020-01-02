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
                        <input type="text" class="form-control" id="datepicker">
                    </div>
                </div>
                <label class="col-sm-1 control-label">HASTA:</label>
                <div class="col-sm-5">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" id="datepicker2">
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <input type="button" class="col-md-8 btn btn-block btn-primary consulta" value="Consultar">
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
                    <td rowspan="4">Item</td>
                    <td rowspan="4">Codigo</td>
                    <td rowspan="4">Modelo</td>
                    <td colspan="8">Performance Acumulado</td>
                    <td colspan="4">Indicadores</td>
                </tr>
                <tr>
                    <td rowspan="3">Horometro Inicial</td>
                    <td rowspan="3">Horometro Final</td>
                    <td colspan="6">Horas</td>
                    <td rowspan="3">DM</td>
                    <td rowspan="3">MTBF</td>
                    <td rowspan="3">MTTR</td>
                    <td rowspan="3">DMR</td>
                </tr>
                <tr>
                    <td rowspan="2">Acum Hras</td>
                    <td colspan="4">Mantto</td>
                    <td rowspan="2">Rep Acc</td>
                </tr>
                <tr>
                    <td>Insp</td>
                    <td>Prev</td>
                    <td>Prog</td>
                    <td>Corr</td>
                </tr>
            </thead>
            <tbody id="tbl_resumenequipos"></tbody>
            <tfoot id="tbl_resumenequipos_foot">
                <tr>
                    <td colspan="5">TOTAL SCOOPTRAMS</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>00.00</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- <div class="box-footer">
    <section class="col-lg-12 connectedSortable">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-th"></i>

                <h3 class="box-title">Performance</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body border-radius-none">
                <div id="myfirstchart" style="height: 250px;"></div>
            </div>
        </div>
    </section>
</div> -->