<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <!-- <a id="download">Tomar screenshot y descargar</a> -->
    </section>
    <section class="content">
      <div class="row">
        <?php 
          $json = json_decode($config, true);
          foreach ($json as $key => $value) {
            if($value['nombre']=='2SC019'){
              echo '<!-- tabla 1 -->
                      <div class="col-lg-2 col-xs-4">
                        <div class="small-box bg-aqua">
                          <div class="inner">
                            <h3>'.$value['horas_acumuladas'].' Hrs</h3>
                            <p>Acumuladas</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-refresh fa-spin"></i>
                          </div>
                          <a class="small-box-footer">Maquina '.$value['nombre'].'</i></a>
                        </div>
                      </div>';
            }
            if($value['nombre']=='2SC022'){
              echo '<!-- tabla 2 -->
                      <div class="col-lg-2 col-xs-4">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>'.$value['horas_acumuladas'].' Hrs</h3>
                            <p>Acumuladas</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-refresh fa-spin"></i>
                          </div>
                          <a class="small-box-footer">Maquina '.$value['nombre'].'</i></a>
                        </div>
                      </div>';
            }
            if($value['nombre']=='2SC026'){
              echo '<!-- tabla 3 -->
                      <div class="col-lg-2 col-xs-4">
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <h3>'.$value['horas_acumuladas'].' Hrs</h3>
                            <p>Acumuladas</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-refresh fa-spin"></i>
                          </div>
                          <a class="small-box-footer">Maquina '.$value['nombre'].'</i></a>
                        </div>
                      </div>';
            }
            if($value['nombre']=='2SC029'){
              echo '<!-- tabla 4 -->
                      <div class="col-lg-2 col-xs-4">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>'.$value['horas_acumuladas'].' Hrs</h3>
                            <p>Acumuladas</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-refresh fa-spin"></i>
                          </div>
                          <a class="small-box-footer">Maquina '.$value['nombre'].'</i></a>
                        </div>
                      </div>';
            }
            if($value['nombre']=='2SC035'){
              echo '<!-- tabla 5 -->
                      <div class="col-lg-2 col-xs-4">
                        <div class="small-box bg-purple">
                          <div class="inner">
                            <h3>'.$value['horas_acumuladas'].' Hrs</h3>
                            <p>Acumuladas</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-refresh fa-spin"></i>
                          </div>
                          <a class="small-box-footer">Maquina '.$value['nombre'].'</i></a>
                        </div>
                      </div>';
            }
            if($value['nombre']=='2SC037'){
              echo '<!-- tabla 6 -->
                      <div class="col-lg-2 col-xs-4">
                        <div class="small-box bg-maroon">
                          <div class="inner">
                            <h3>'.$value['horas_acumuladas'].' Hrs</h3>
                            <p>Acumuladas</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-refresh fa-spin"></i>
                          </div>
                          <a class="small-box-footer">Maquina '.$value['nombre'].'</i></a>
                        </div>
                      </div>';
            }
          }
          
        ?>
      </div>
      <style>
          td{
              font-size: 14px;
          }
      </style>
      <div class="row">
        <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Últimos Requerimientos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="mailbox-controls">
                <div class="btn-group prints">
                  <button type="button" class="imprimir btn btn-default btn-sm"><a href="javascript:imboxPDF()"><i class="fa fa-print"></i> Imprimir</a></button>
                </div>
                <span class="volver">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Volver</button>
                </span>
                <span class="refresh">                
                  <button type="button" class="actualizar btn btn-default btn-sm"><i class="fa fa-refresh"></i> Actualizar</button>
                </span>

                <!-- pagination -->
                <div class="pull-right pagination_imbox">
                </div>
              </div>
              <div class="openmessage" id="capture">
              </div>

              <!-- body message -->


              <div class="listmessage">
                <div class="table-responsive mailbox-messages">
                  <table class="table table-hover table-striped">
                    <tbody class="imbox">
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>