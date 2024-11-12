@extends('layouts.app')
@section('title','Grafik Pemesanan Barang Tahun '.$tahun);
@section('content')
<!-- BAR CHART -->
{{-- <div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">@yield('title')</h3>
  </div> --}}
       <div id="curve_chart" style="width: 1300px; height: 600px"></div>
{{-- </div> --}}
@endsection
 @push('scripts')
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          <?php echo $value;?>
        );
        var options = {
          title: '@yield('title')',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
      }
    </script>
 @endpush
