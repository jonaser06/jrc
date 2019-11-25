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

<script src="<?php echo $dir; ?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo $dir; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/morris.js/morris.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?php echo $dir; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $dir; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo $dir; ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo $dir; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $dir; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $dir; ?>bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo $dir; ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo $dir; ?>dist/js/pages/dashboard.js"></script>
<script src="<?php echo $dir; ?>dist/js/demo.js"></script>
<script>
    $(function () {    
        $('#datepicker').datepicker({
            orientation: 'bottom right',
            autoclose: true
        })

        $('#datepicker2').datepicker({
            orientation: 'bottom right',
            autoclose: true
        })

        new Morris.Line({

        element: 'myfirstchart',

        data: [
        { year: '2008', value: 20 },
        { year: '2009', value: 10 },
        { year: '2010', value: 5 },
        { year: '2011', value: 5 },
        { year: '2012', value: 20 }
        ],
        
        xkey: 'year',
        
        ykeys: ['value'],
        labels: ['Value']
        });
    
    })
</script>
</body>
</html>
