<?php
 $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 $url = explode('/', $url);
 $count = count($url);
 $base = $url[$count-1];

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- panel de usuario -->
      <div class="user-panel">
        <div class="pull-left image">
          <div class="avatar img-circle"><?php echo strtoupper(substr($_SESSION['nombres'],0,1)); ?></div>
          
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nombres']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="logout"><i class="fa fa-sign-out"></i> <span>CERRAR SESIÓN</span></a>
        </li>
      </ul>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MÓDULOS</li>
        <li class="treeview <?php echo ($base=='r1600g')?'active':''; echo ($base=='scoops?consulta=scoops')?'active':''; ?>">
          <a href="#"><i class="fa fa-dashboard"></i> <span>SCOOPS</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu" style="display: <?php echo ($base=='r1600g')?'block':''; echo ($base=='scoops')?'block':''; ?>;">
            <li class ="<?php echo ($base=='r1600g')?'active':''; echo ($base=='scoops?consulta=scoops')?'active':''; ?>">
              <?php
                if($_SESSION['rol']=='mecanico'){
                  echo '<a href="r1600g"><i class="fa fa-circle-o"></i> R1600G</a>';
                }else{
                  echo '<a href="scoops?consulta=scoops"><i class="fa fa-circle-o"></i> R1600G</a>';
                }
              ?>
            </li>
          </ul>
        </li>
        <li class ="<?php echo ($base=='mt2010')?'active':''; ?>">
          <?php
            if($_SESSION['rol']=='mecanico'){
              echo '<a href="mt2010"><i class="fa fa-dashboard"></i> <span>MT2010</span></a>';
            }else{
              echo '<a href="adminmt2010"><i class="fa fa-dashboard"></i> <span>MT2010</span></a>';
            }
          ?>
        </li>
        <?php
          if(isset($_SESSION['rol'])){
            if($_SESSION['rol']=='super administrador'){
              $registro = 'registro-s';
              $active = ($base=='registro-s')?'active':'';
              $active2 = ($base=='listadeusuarios')?'active':'';
              $display  = ($base=='registro-s')?'block':'none';
              echo '<li class="treeview '.$active.'">
                      <a href="#"><i class="fa fa-user"></i> <span>REGISTRO DE USUARIOS</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                      </a>
                      <ul class="treeview-menu" style="display: '.$display.';">
                          <li class="'.$active.'"><a href="'.$registro.'"><i class="fa fa-circle-o"></i> AGREGAR USUARIO</a></li>
                          <li class="'.$active2.'"><a href="listarusuarios"><i class="fa fa-circle-o"></i> LISTA DE USUARIOS</a></li>
                      </ul>
                  </li>';
              echo '<li>
                        <a href="asignacion"><i class="fa fa-dashboard"></i> <span>ASIGNACION DE MAQUINARIA</span></a>
                    </li>';
            }
            if($_SESSION['rol']=='administrador'){
              $registro = 'registro';
              $active = ($base=='registro')?'active':'';
              $active2 = ($base=='listarusuarios')?'active':'';
              $display  = ($base=='registro' || $base=='listarusuarios')?'block':'none';
              echo '<li class="treeview '.$active.'">
                        <a href="#"><i class="fa fa-user"></i> <span>REGISTRO DE USUARIOS</span>
                          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu" style="display: '.$display.';">
                            <li class="'.$active.'"><a href="'.$registro.'"><i class="fa fa-circle-o"></i> AGREGAR USUARIO</a></li>
                            <li class="'.$active2.'"><a href="listarusuarios"><i class="fa fa-circle-o"></i> LISTA DE USUARIOS</a></li>
                        </ul>
                    </li>';
            }
            if($_SESSION['rol']=='mecanico'){
              $active = ($base=='requerimientos')?'active':'';
              echo '<li class="'.$active.'">
                      <a href="requerimientos"><i class="fa fa-dashboard"></i> <span>REQUERIMIENTOS</span></a>
                    </li>';
            }
          }
        ?>
        <li class="header">SOPORTE</li>
        <li><a href="reporteproblema"><i class="fa fa-circle-o text-red"></i> <span>REPORTAR PROBLEMA</span></a></li>
        <?php
          if($_SESSION['rol']!='mecanico'){
            echo '<li><a href="reporteadmin"><i class="fa fa-circle-o text-red"></i> <span>REPORTES</span></a></li>';
          }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>