@extends('layouts.app')
@section('title','Reset Password')
@section('content')
<div class="row">
  <div class="box-body">
    <div class="box box-danger box-solid">
          <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{ route('pengguna.create')}}" class="btn btn-default btn-sm pull-right"  title="Create">
              <i class="fa fa-plus-square"></i> Create</a>
          </div>
          <div class="box-body">
            <table id="datatables" class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
                <th class="col-md-1 text-center">No</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
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
                  <td>{{$row->username}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}}</td>
                  <td class="text-center">
                    <div class="btn-group">
                      <form action="{{ route('resetpassword.reset', $row->id) }}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="POST">
                        <button type="submit" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure Reset Password?')"><i class="fa fa-key"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        *) Password Default 123456
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $("#datatables").DataTable();
</script>
@endpush
