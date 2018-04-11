<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>KelvinHRIS</title>

  <!-- Bootstrap 3.3.7 --> 
  <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- Font Awesome --> 
  <link href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- Ionicons --> 
  <link href="{{ asset('/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- Theme style --> 
  <link href="{{ asset('/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" >
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. --> 
    <link href="{{ asset('/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" >
    <!-- Morris chart --> 
    <link href="{{ asset('/bower_components/morris.js/morris.css') }}" rel="stylesheet" type="text/css" >
    <!-- jvectormap --> 
    <link href="{{ asset('/bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" type="text/css" >
    <!-- Date Picker --> 
    <link href="{{ asset('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" >
    <!-- Daterange picker --> 
    <link href="{{ asset('/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" >
    <!-- bootstrap wysihtml5 - text editor --> 
    <link href="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" >
    <!-- Select2 --> 
    <link href="{{ asset('/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" >

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  </head>
  <body class="hold-transition"> 
    @yield('body') 

    <!-- jQuery 3 --> 

    <script type="text/javascript" src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- jQuery UI 1.11.4 --> 
    <script type="text/javascript" src="{{ asset('/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->  
    <script type="text/javascript" src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts --> 
    <script type="text/javascript" src="{{ asset('/bower_components/raphael/raphael.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/bower_components/morris.js/morris.min.js') }}"></script>

    <!-- Sparkline --> 
    <script type="text/javascript" src="{{ asset('/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <!-- jvectormap --> 

    <script type="text/javascript" src="{{ asset('/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart --> 
    <script type="text/javascript" src="{{ asset('/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker --> 
    <script type="text/javascript" src="{{ asset('/bower_components/moment/min/moment.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- datepicker --> 
    <script type="text/javascript" src="{{ asset('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Bootstrap WYSIHTML5 --> 
    <script type="text/javascript" src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

    <!-- Slimscroll --> 
    <script type="text/javascript" src="{{ asset('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- FastClick --> 
    <script type="text/javascript" src="{{ asset('/bower_components/fastclick/lib/fastclick.js') }}"></script>

    <!-- AdminLTE --> 
    <script type="text/javascript" src="{{ asset('/dist/js/adminlte.min.js') }}"></script> 

    <!-- Select2 -->  
    <script type="text/javascript" src="{{ asset('/bower_components/select2/dist/js/select2.full.min.js') }}"></script> 

    <script type="text/javascript"> 
      $(document).ready(function(){ 

        if ($('#use_new_password').is(':checked')) 
        {
          $("#newpassword").hide();
        }

        $('#use_new_password').change(function(){
          if(this.checked)
            $('#newpassword').fadeOut('slow');
          else
            $('#newpassword').fadeIn('slow');
        });

        //initialize select inorder to get search functionality in select elements
        $('.select2').select2();

        //Date pickers
        $('#datepicker').datepicker({
          autoclose: true,
          format: 'mm/dd/yyyy',
          orientation: "bottom auto"
        });

        $('#datepicker2').datepicker({ 
          autoclose: true,
          format: 'mm/dd/yyyy',
          orientation: "bottom auto"
        });

        $('#datepicke3').datepicker({
          autoclose: true,
          format: 'mm/dd/yyyy',
          orientation: "bottom auto"
        });

        $('#datepicker4').datepicker({ 
          autoclose: true,
          format: 'mm/dd/yyyy',
          orientation: "bottom auto"
        });

        $('#datepicker5').datepicker({ 
          autoclose: true,
          format: 'mm/dd/yyyy',
          orientation: "bottom auto"
        });
      });

    </script>
  </body>
  </html>

