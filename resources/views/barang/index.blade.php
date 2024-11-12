@extends('layouts.app')
@section('title','Barang')
@section('content')
<div class="row">
  <div class="box-body">
    <div class="box box-danger box-solid">
          <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{ route('barang.create')}}" class="btn btn-default btn-xs pull-right"  title="Create">
              <i class="fa fa-plus-square"></i> Create</a>
          </div>
          <div class="box-body">
            <table id="datatables" class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
                <th class="col-md-1 text-center">No</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Satuan</th>
                <th class="text-center">Jenis</th>
                <th class="text-center">Harga</th>
                <th class="col-md-1 text-center">Stok Awal</th>
                <th class="col-md-1 text-center">Gambar</th>
                <th class="col-md-1 text-center">Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                ?>
              @foreach($data as $row)
                <tr>
                  <td class="text-center">{{$no++}}</td>
                  <td class="text-center">{{$row->kode}}</td>
                  <td>{{$row->nama}}</td>
                  <td>{{$row->satuan->satuan}}</td>
                  <td>{{$row->jenis->jenis}}</td>
                  <td class="text-right">{{number_format($row->harga)}}</td>
                  <td class="text-center">{{$row->stok_awal}}</td>
                  <td class="text-center">
                    @if(!empty($row->gambar))
                    <img src="{{ URL::asset('gambar/'.$row->gambar)}}" alt="" width="75">
                    @endif
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <form action="{{ route('barang.destroy', $row->id) }}" method="POST">
                        {{csrf_field()}}
                        <a href="{{route('barang.edit',$row->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                      </form>
                    </div>
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
