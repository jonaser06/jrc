<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Reporte
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <a href="reporteadmin?consulta=resumenequipos" class="btn btn-app">
                            <i class="fa fa-wrench"></i> RESUMEN DE EQUIPOS
                        </a>
                        <a href="reporteadmin?consulta=resumenindicadores" class="btn btn-app">
                            <i class="fa fa-wrench"></i> RESUMEN DE INDICADORES
                        </a>
                        <a href="reporteadmin?consulta=horasoperacion" class="btn btn-app">
                            <i class="fa fa-wrench"></i> HORAS DE OPERACIÓN
                        </a>
                        <a href="reporteadmin?consulta=disponibilidad" class="btn btn-app">
                            <i class="fa fa-wrench"></i> DISPONIBILIDAD MECANICA 
                        </a>
                        <a href="reporteadmin?consulta=utilizacion" class="btn btn-app">
                            <i class="fa fa-wrench"></i> UTILIZACION
                        </a>
                        <a href="reporteadmin?consulta=mtbf" class="btn btn-app">
                            <i class="fa fa-wrench"></i> MTBF 
                        </a>
                        <a href="reporteadmin?consulta=mttr" class="btn btn-app">
                            <i class="fa fa-wrench"></i> MTTR 
                        </a>
                        <a href="reporteadmin?consulta=reporte" class="btn btn-app">
                            <i class="fa fa-wrench"></i> REPORTE 
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                    if($_GET['consulta']=='resumenequipos'){ include 'reportes/resumenequipos.php'; }
                    if($_GET['consulta']=='resumenindicadores'){ include 'reportes/resumenindicadores.php'; }
                    if($_GET['consulta']=='horasoperacion'){ include 'reportes/horasoperacion.php'; }
                    if($_GET['consulta']=='disponibilidad'){ include 'reportes/disponibilidad.php'; }
                    if($_GET['consulta']=='utilizacion'){ include 'reportes/utilizacion.php'; }
                    if($_GET['consulta']=='mtbf'){ include 'reportes/mtbf.php'; }
                    if($_GET['consulta']=='mttr'){ include 'reportes/mttr.php'; }
                    if($_GET['consulta']=='reporte'){ include 'reportes/reporte.php'; }
                ?>
            </div>
        </div>
    </section>
  </div>