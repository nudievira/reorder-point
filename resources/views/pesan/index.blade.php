@extends('layouts.app')
@section('title','Pemesanan Barang')
@section('content')
<div class="row">
  <div class="box-body">
    <div class="box box-danger box-solid">
          <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{ route('pesan.create')}}" class="btn btn-default btn-xs pull-right"  title="Create">
              <i class="fa fa-plus-square"></i> Create</a>
          </div>
          <div class="box-body">
            <table id="datatables" class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
                <th class="col-md-1 text-center">No</th>
                <th class="text-center">Nomor</th>
                <th class="col-md-1 text-center">Tanggal</th>
                <th class="text-center">Item</th>
                <th class="col-md-2 text-center">Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                ?>
              @foreach($data as $row)
                <tr>
                  <td class="text-center">{{$no++}}</td>
                  <td class="text-center">{{$row->nomor}}</td>
                  <td class="text-center">{{tgl_str($row->tanggal)}}</td>
                  <td class="text-center">{{$row->detail->count()}}</td>
                  <td class="text-center">
                    <div class="btn-group">
                      <form action="{{ route('pesan.destroy', $row->id) }}" method="POST">
                        {{csrf_field()}}
                        <a href="{{route('pesan.edit',$row->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                        <a href="{{url('pesan',$row->nomor)}}" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>
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
