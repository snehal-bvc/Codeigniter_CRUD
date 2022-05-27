<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/jqvmap/jqvmap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/adminlte.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/summernote/summernote-bs4.min.css') ?>">
 
 
 
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?> ">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Preloader -->

  <!-- Navbar -->
    <?php            $this->load->view('design/header');        ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php            $this->load->view('design/module');        ?>

  <!-- Content Wrapper. Contains page content -->
    <!-- @yield('content') -->
    <?php
    if(isset($views))
    {
      if(isset($data))
      {
        $this->load->view($views,$data);
      }
      else
      {
        $this->load->view($views);
      }
    } 
    // isset($views) ? $this->load->view($views,$data) : ""; 
    ?>

  <!-- /.content-wrapper -->
  
  <?php            $this->load->view('design/footer');        ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('asset/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('asset/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('asset/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('asset/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('asset/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('asset/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('asset/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('asset/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('asset/dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('asset/dist/js/pages/dashboard.js') ?>"></script>



<script src="<?php echo base_url('asset/plugins/datatables/jquery.dataTables.min.js') ?> "></script>
<script src="<?php echo base_url('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>

<script src="<?php echo base_url('asset/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#client_list').DataTable({
        dom: 'lBfrtip',
        buttons: [
            // 'copyHtml5',
            // 'excelHtml5',
            'csvHtml5',
            // 'pdfHtml5'
            // 'pageLength'
        ],

        "ajax": {
            url : "/clientCRUD_datatables",
            type : 'GET'
            
        },
    });
});
</script>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){ 
     
      var dataTable = $('#item_list').DataTable({ 

        dom: 'lBfrtip',
        // lengthMenu: [[10, 15, 30, 50,-1],[10, 15, 30, 50,"All"]],

        // 'lengthMenu' : [[10, 25, 50, 100, null], [10, 25, 50, 100, "All"]]
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        buttons: [
            // 'copyHtml5',
            // 'excelHtml5',
            'csvHtml5',
            // 'pdfHtml5'
            // 'pageLength'
        ],

        //    "processing":true,  
           "serverSide":true,  
        //    "order":[],  
           "ajax":{  
                url:"<?php echo base_url().'itemCRUD_datatables'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[3],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  

</script>


</body>
</html>
