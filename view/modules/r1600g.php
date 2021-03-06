<div class="content-wrapper">
    <section class="content-header">
        <h1>
        R1600G
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="box">
                    <div class="box-header">
                        <!-- <h3 class="box-title">iCheck - Checkbox &amp; Radio Inputs</h3> -->
                    </div>
                    <div class="box-body">
                            <a class="links" href="pm?n=1">
                                <button type="button" class="btn btn-lg btn-block btn-warning">PM 1</button>
                            </a>
                            <a class="links" href="pm?n=2">
                                <button type="button" class="btn btn-lg btn-block btn-warning">PM 2</button>
                            </a>
                            <a class="links" href="pm?n=3">
                                <button type="button" class="btn btn-lg btn-block btn-warning">PM 3</button>
                            </a>
                            <a class="links" href="pm?n=4">
                                <button type="button" class="btn btn-lg btn-block btn-warning">PM 4</button>
                            </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>
                                <div class="info-box-content">
                                <span class="info-box-text">Horas acumuladas</span>
                                <?php
                                    $horaDia = 24;
                                    $diaMes = 30;
                                    $horamaquina = $maquina->horas_acumuladas;
                                    $total = $horaDia*$diaMes;
                                    $porcent = (100*$horamaquina)/$total;
                                    echo '<span class="info-box-number">'.$maquina->horas_acumuladas.' Horas</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: '.$porcent.'%"></div>
                                            </div>
                                                <span class="progress-description">
                                                    '.substr($porcent,0,3).'% consumidas de las '.$total.' horas
                                                </span>
                                            </div>';
                                ?>
                            </div>
                            <a href="reportediario">
                                <button type="button" class="btn btn-block btn-primary">REPORTE DIARIO</button>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>