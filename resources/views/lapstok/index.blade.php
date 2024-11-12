@extends('layouts.app')
@section('title','Laporan Stok Barang')
@section('content')
{!! Form::open(['route' => 'lapstok.cetak','name'=>'my-form','id'=>'my-form','class'=>'form-horizontal']) !!}
<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">@yield('title')</h3>
  </div>
  {{-- <form class="form-horizontal" name="my-form" id="my-form"> --}}
    {{-- {{ csrf_field() }} --}}
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

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Satuan Barang :</label>
        <div class="col-sm-2">
          <select class="form-control select2" name="satuan" id="satuan">
            <option value="">-Semua-</option>
            @foreach($list_satuan as $satuan)
              <option value="{{$satuan->id}}">{{$satuan->satuan}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Jenis Barang :</label>
        <div class="col-sm-4">
          <select class="form-control select2" name="jenis" id="jenis">
            <option value="">-Semua-</option>
            @foreach($list_jenis as $jenis)
              <option value="{{$jenis->id}}">{{$jenis->jenis}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  {{-- </form> --}}
    <div class="box-footer text-center">
      <button type="button" class="btn btn-primary" name="view" id="view"><i class="fa fa-search"></i> View</button>
      <button type="submit" class="btn btn-info" name="cetak" id="cetak" value="pdf" ><i class="fa fa-file-pdf-o"></i> PDF</button>
      <button type="button" class="btn btn-success" name="cetak" id="cetak" value="excel" style="display:none"><i class="fa fa-file-excel-o"></i> Excel</button>
      <a href="{{url('home')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>


{!! Form::close() !!}
  <div id="detail"></div>
</div>
@endsection

@push('scripts')
  <script type="text/javascript">
    $(".select2").select2();

    function getData()
    {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
      var string = $("#my-form").serialize();
      $.ajax({
        url   : "{{ route("lapstok.getData") }}",
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
