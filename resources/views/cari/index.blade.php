@extends('layouts.app')
@section('title','Pencarian Barang')
@section('content')
<div class="row">
  <div class="box-body">
    <div class="box box-danger box-solid">
          <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{ route('barang.create')}}" class="btn btn-default btn-sm pull-right"  title="Create">
              <i class="fa fa-plus-square"></i> Create</a>
          </div>
          <div class="box-body">
            <table id="datatables" class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
                <th class="col-md-1 text-center">ID</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Satuan</th>
                <th class="text-center">Jenis</th>
                <th class="text-center">Harga</th>
                <th class="col-md-1 text-center">Stok Akhir</th>
                <th class="col-md-1 text-center">Safty Stock</th>
                <th class="col-md-1 text-center">ROP</th>
                <th class="col-md-1 text-center">Status</th>
                <th class="col-md-1 text-center">Gambar</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $row)
                <?php
                $ss = getSS($row->id);
                $rop = getROP($row->id,$ss);
                $status = status_ss($row->id,$ss).'/'.status_rop($row->id,$rop);
                ?>
                <tr>
                  <td class="text-center">{{$row->id}}</td>
                  <td class="text-center">{{$row->kode}}</td>
                  <td>{{$row->nama}}</td>
                  <td>{{$row->satuan->satuan}}</td>
                  <td>{{$row->jenis->jenis}}</td>
                  <td class="text-right">{{number_format($row->harga)}}</td>
                  <td class="text-center">{{stok_akhir($row->id)}}</td>
                  <td class="text-center">{{number_format($ss)}}</td>
                  <td class="text-center">{{number_format($rop)}}</td>
                  <td class="text-center">{!!$status!!}</td>
                  <td class="text-center">
                    @if(!empty($row->gambar))
                    <img src="{{ URL::asset('gambar/'.$row->gambar)}}" alt="" width="75">
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $("#datatables").DataTable();
</script>
@endpush
