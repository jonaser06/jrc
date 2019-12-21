<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Scoops
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">EQUIPO DE TRABAJO:</label>
                                <div class="col-sm-10">
                                    <select class="form-control equipo" name="equipo">
                                        <option>2SC019</option>
                                        <option>2SC022</option>
                                        <option>2SC029</option>
                                        <option>2SC035</option>
                                        <option>2SC037</option>
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
                                        <input type="text" class="form-control de" id="datepicker" name="de">
                                    </div>
                                </div>

                                <label class="col-sm-1 control-label">HASTA:</label>
                                <div class="col-sm-5">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control hasta" id="datepicker2" name="hasta">
                                    </div>
                                </div>

                            </div>
                            <input type="button" class="btn btn-block btn-primary consulta_scoops" value="Consultar">
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
                                    <th style="text-align:center; width: 5%;">Fecha</th>
                                    <th style="text-align:center; width: 5%;">Horometro Inicial</th>
                                    <th style="text-align:center; width: 5%;">Horometro Final</th>
                                    <th style="text-align:center; width: 5%;">Horas Trab</th>
                                    <th style="text-align:center; width: 5%;">Horomet Acum</th>
                                    <th style="text-align:center; width: 5%;">Inspecc</th>
                                    <th style="text-align:center; width: 5%;">Mantt Prev</th>
                                    <th style="text-align:center; width: 5%;">Mantt Prog</th>
                                    <th style="text-align:center; width: 5%;">Mantt Correc</th>
                                    <th style="text-align:center; width: 5%;">Horas Calend</th>
                                    <th style="text-align:center; width: 5%;">Horas Prog</th>
                                    <th style="text-align:center; width: 5%;">D.M.</th>
                                    <th style="text-align:center; width: 5%;">D.F.</th>
                                    <th style="text-align:center; width: 5%;">% Util.</th>
                                    <th style="text-align:center; width: 5%;">N° Fallas</th>
                                    <th style="text-align:center; width: 25%;">Descripcion</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_scoops"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>