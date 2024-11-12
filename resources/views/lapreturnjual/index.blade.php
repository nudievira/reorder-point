@extends('layouts.app')
@section('title','Laporan Return Penerimaan Barang')
@section('content')
{!! Form::open(['route' => 'lapreturnterima.cetak','name'=>'my-form','id'=>'my-form','class'=>'form-horizontal']) !!}
<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">@yield('title')</h3>
  </div>

    <div class="box-body">
      <div class="form-group has-error">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Dari tanggal s.d tanggal :</label>
        <div class="col-sm-2">
          <input type="text" name="tgl1" id="tgl1" class="form-control date" data-date-format="dd-mm-yyyy">
          @if ($errors->has('tgl1'))
              <span class="help-block">
                  <strong>{{ $errors->first('tgl1') }}</strong>
              </span>
          @endif
        </div>
        <div class="col-sm-2">
          <input type="text" name="tgl2" id="tgl2" class="form-control date" data-date-format="dd-mm-yyyy">
          @if ($errors->has('tgl2'))
              <span class="help-block">
                  <strong>{{ $errors->first('tgl2') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Nomor :</label>
        <div class="col-sm-2">
          <select class="form-control select2" name="nomor" id="nomor">
            <option value="">-Semua-</option>
            @foreach($list_returnjual as $returnjual)
              <option value="{{$returnjual->nomor}}">{{$returnjual->nomor}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Kode Barang :</label>
        <div class="col-sm-4">
          <select class="form-control select2" name="kode" id="kode">
            <option value="">-Semua-</option>
            @foreach($list_barang as $barang)
              <option value="{{$barang->id}}">{{$barang->kode}} - {{$barang->nama}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="box-footer text-center">
      <button type="button" class="btn btn-primary" name="view" id="view"><i class="fa fa-search"></i> View</button>
      <button type="submit" class="btn btn-info" name="cetak" id="cetak" value="PDF"><i class="fa fa-file-pdf-o"></i> PDF</button>
      <button type="button" class="btn btn-success" name="excel" id="excel" style="display:none"><i class="fa fa-file-excel-o"></i> Excel</button>
      <a href="{{url('home')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>

{!! Form::close() !!}

  <div id="detail"></div>
</div>
@endsection

@push('scripts')
  <script type="text/javascript">
    $(".select2").select2();

    $('.date').datepicker({
      autoclose: true
    });

    function getData()
    {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
      var string = $("#my-form").serialize();
      if(!$("#tgl1").val())
      {
        swal({
            title: "Warning",
            text: "Tanggal Tidak boleh kosong",
            type: "error",
            timer: 3000,
            showConfirmButton: true
        });
        return false;
      }
      if(!$("#tgl2").val())
      {
        swal({
            title: "Warning",
            text: "Tanggal Tidak boleh kosong",
            type: "error",
            timer: 3000,
            showConfirmButton: true
        });
        return false;
      }
      $.ajax({
        url   : "{{ route("lapreturnterima.getData") }}",
        method : 'POST',
        data : string,
        success:function(data){
          // console.log(data);
          $("#detail").html(data);
        }
      });
    }
    $("#view").click(function(){
      getData();
    });
  </script>
@endpush
