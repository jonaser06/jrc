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
    <div class="box-footer"></div>
</div>
<script>
    $(".consulta").click(function(){
        $(this).val('Procesando....');
        $.ajax({
            
        });
    });
</script>

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