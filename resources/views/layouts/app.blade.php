<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} - @yield('title')</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="{{URL::asset('plugins/iCheck/flat/blue.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/morris/morris.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/datepicker/datepicker3.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/datepicker/datepicker3.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/iCheck/all.css')}}">

  <link rel="stylesheet" href="{{URL::asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('dist/css/skins/_all-skins.min.css')}}">

  <link href="{{ URL::asset('dist/sweetalert.css') }}" rel="stylesheet">
  <script src="{{ URL::asset('dist/sweetalert-dev.js') }}"></script>
</head>
<body class="sidebar-mini skin-blue fixed">
  @if (notify()->ready())
  <script>
      swal({
          title: "{!! notify()->message() !!}",
          text: "{!! notify()->option('text') !!}",
          type: "{{ notify()->type() }}",
          @if (notify()->option('timer'))
              timer: 1500,//{{ notify()->option('timer') }},
              showConfirmButton: false
          @endif
      });
  </script>
  @endif

<div class="wrapper">

  @include('layouts.header')
  @include('layouts.main-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{config('app.name')}}
        <small>{{config('app.perusahaan')}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">@yield('title')</li>
      </ol>
    </section>

    <section class="content">
      @yield('content')
    </section>

  </div>
  <!-- /.content-wrapper -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="{{URL::asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{URL::asset('plugins/morris/morris.min.js')}}"></script>
<script src="{{URL::asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{URL::asset('plugins/knob/jquery.knob.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{URL::asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{URL::asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{URL::asset('plugins/fastclick/fastclick.js')}}"></script>
<script src="{{URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('plugins/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('plugins/iCheck/icheck.min.js')}}"></script>

<script src="{{URL::asset('dist/js/app.min.js')}}"></script>
<script src="{{URL::asset('dist/js/pages/dashboard.js')}}"></script>
<script src="{{URL::asset('dist/js/demo.js')}}"></script>

@stack('scripts')
</body>
</html>
