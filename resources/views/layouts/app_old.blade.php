<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>
    <!-- Scripts -->
    <link href="{{ URL::asset('dist/sweetalert.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('dist/sweetalert-dev.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
    body { padding-top: 70px; }
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    </style>
</head>
<body>

@if (notify()->ready())
<script>
    swal({
        title: "{!! notify()->message() !!}",
        text: "{!! notify()->option('text') !!}",
        type: "{{ notify()->type() }}",
        @if (notify()->option('timer'))
            timer: {{ notify()->option('timer') }},
            showConfirmButton: false
        @endif
    });
</script>
@endif

    <div id="app">
        @if (Auth::guest())

        @else
            @include('layouts.nav')
        @endif

        @if(count($errors))
        <script type="text/javascript">
          swal({
              title: "Error Input",
              text:
                @foreach($errors->all() as $error)
                "{{ $error }}",
                @endforeach
              type: "error",
              timer : 4000
          });
        </script>
        @endif

        @yield('content')

    </div>
    <div class="container text-center">
      Copyrsssssssssssight &copy;<h4>{{ config('app.perusahaan') }} <small>{{ config('app.name') }}</small></h4>
    </div>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>

    <!-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> -->
    <script src="//cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    <script>
      // /public/v1
        $('textarea').ckeditor({
          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
    @stack('scripts')
</body>
</html>
