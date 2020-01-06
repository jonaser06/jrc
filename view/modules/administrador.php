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
      <div class="row">
        <section class="col-lg-7 connectedSortable">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
        </section>
        <section class="col-lg-5 connectedSortable">
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Sales Graph</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">Mail-Orders</div>
                </div>
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">Online</div>
                </div>
                <div class="col-xs-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">In-Store</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>