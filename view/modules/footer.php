<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo $dir; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/morris.js/morris.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?php echo $dir; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $dir; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo $dir; ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo $dir; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $dir; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo $dir; ?>plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo $dir; ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo $dir; ?>dist/js/pages/dashboard.js"></script>
<script src="<?php echo $dir; ?>dist/js/demo.js"></script>
<script src="<?php echo $dir; ?>js/jspdf.min.js"></script>
<script src="<?php echo $dir; ?>js/toast.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="<?php echo $dir; ?>js/main.js?v18"></script>
<?php
  if($base == "administrador" || $base == "superadministrador"){
    echo '<script src="'.$dir.'js/imboxrequest.js"></script>';
  }
?>
<script>
    function getPDF(){
      html2canvas(document.querySelector("#capture"), {
        onrendered (canvas) {
          var img = canvas.toDataURL();
          var doc = new jsPDF();
          doc.addImage(img,'JPEG', 0, 0, 210, 300);
          doc.save("reportepm.pdf");
        }
      });
    }

    function imboxPDF(){
      html2canvas(document.querySelector("#capture"), {
        onrendered (canvas) {
          var img = canvas.toDataURL();
          var doc = new jsPDF();
          doc.addImage(img,'JPEG', 0, 0, 250, 50);
          doc.save("reportepm.pdf");
        }
      });
    }
</script>
</body>
</html>
