@extends('layouts.app')
@section('title','Safty Stock Barang')
@section('content')
<div class="row">
  <div class="box-body">
    <div class="box box-danger box-solid">
          <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{ route('saftystock.create')}}" class="btn btn-default btn-xs pull-right"  title="Create">
              <i class="fa fa-plus-square"></i> Create</a>
          </div>
          <div class="box-body">
            <table id="datatables" class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
                <th class="col-md-1 text-center">No</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Nama</th>
                <th class="col-md-1 text-center">Stok Akhir</th>
                <th class="text-center">Satuan</th>
                <th class="col-md-1 text-center">Maxsimal</th>
                <th class="col-md-1 text-center">Rata-rata</th>
                <th class="col-md-1 text-center">Leadtime</th>
                <th class="col-md-1 text-center">Safty Stock</th>
                <th class="col-md-1 text-center">Status</th>
                <th class="col-md-1 text-center">Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                ?>
              @foreach($data as $row)
                <?php
                $ss = saftystock($row->max,$row->rerata,$row->leadtime);
                ?>
                <tr>
                  <td class="text-center">{{$no++}}</td>
                  <td class="text-center">{{$row->barang->kode}}</td>
                  <td>{{$row->barang->nama}}</td>
                  <td class="text-center">{{stok_akhir($row->id)}}</td>
                  <td>{{$row->barang->satuan->satuan}}</td>
                  <td class="text-center">{{number_format($row->max)}}</td>
                  <td class="text-center">{{number_format($row->rerata)}}</td>
                  <td class="text-center">{{number_format($row->leadtime)}} / Minggu</td>
                  <td class="text-center">{{number_format($ss)}}</td>
                  <td class="text-center">
                    {!! status_ss($row->m_barang_id,$ss) !!}
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <form action="{{ route('saftystock.destroy', $row->id) }}" method="POST">
                        {{csrf_field()}}
                        <a href="{{route('saftystock.edit',$row->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            <p class="alert-danger">Rumus Safty Stock <br/>
              Safety stock = (Pemakaian maksimal - pemakaian rata-rata) x Leadtime
            </p>

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
