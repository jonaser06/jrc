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
          <img src="<?php echo $dir; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
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
        <li class="treeview <?php echo ($base=='r1600g')?'active':''; ?>">
          <a href="#"><i class="fa fa-dashboard"></i> <span>SCOOPS</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu" style="display: <?php echo ($base=='r1600g')?'block':''; ?>;">
            <li class ="<?php echo ($base=='r1600g')?'active':''; ?>"><a href="r1600g"><i class="fa fa-circle-o"></i> R1600G</a></li>
          </ul>
        </li>
        <li class ="<?php echo ($base=='mt2010')?'active':''; ?>">
          <a href="mt2010"><i class="fa fa-dashboard"></i> <span>MT2010</span></a>
        </li>
        <?php
          if(isset($_SESSION['rol'])){
            if($_SESSION['rol']=='super administrador'){
              echo '<li class="treeview">
                      <a href="#"><i class="fa fa-user"></i> <span>REGISTRO DE USUARIOS</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                      </a>
                      <ul class="treeview-menu" style="display: none;">
                          <li><a href="#"><i class="fa fa-circle-o"></i> AGREGAR USUARIO</a></li>
                          <li><a href="#"><i class="fa fa-circle-o"></i> LISTA DE USUARIOS</a></li>
                      </ul>
                  </li>';
              echo '<li class="treeview">
                        <a href="#"><i class="fa fa-dashboard"></i> <span>ASIGNACION DE MAQUINARIA</span></a>
                    </li>';
            }
            if($_SESSION['rol']=='administrador'){
              echo '<li class="treeview">
                        <a href="#"><i class="fa fa-user"></i> <span>REGISTRO DE USUARIOS</span>
                          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li><a href="#"><i class="fa fa-circle-o"></i> AGREGAR USUARIO</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> LISTA DE USUARIOS</a></li>
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
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>REPORTAR PROBLEMA</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>