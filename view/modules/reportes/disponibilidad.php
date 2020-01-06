<div class="box">
    <div class="box-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-7 control-label">DISPONIBILIDAD MECANICA</label>
            </div>
            <div class="form-group">
                <div class="container">
                    <div class="col-sm-10 col-sm-offset-1">
                        <label class="col-sm-1 control-label">Seleccione:</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="" id="machine">
                                <?php
                                    $machine = ['2SC019','2SC022','2SC026','2SC029','2SC035','2SC037'];
                                    for ($i=0; $i < count($machine) ; $i++) { 
                                        echo '<option value="'.$machine[$i].'">'.$machine[$i].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <label class="col-sm-1 control-label">Seleccione:</label>
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
                        <input type="button" class="col-md-8 btn btn-block btn-primary consulta_disponibilidad" value="Consultar">
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
        <div id="grafica_disp"></div>        
    </div>
</div>