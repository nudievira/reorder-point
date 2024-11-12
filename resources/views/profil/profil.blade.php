{!! Form::model($data,['route' => ['profil.updateprofil',$data->id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Pengguna</h3>
  </div>
  <form class="form-horizontal">

    <div class="box-body">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Name :</label>
        <div class="col-sm-3">
          {!! Form::text('name',null,['class' => 'form-control','id'=>'name']) !!}
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Username :</label>
        <div class="col-sm-3">
          {!! Form::text('username',null,['class' => 'form-control','id'=>'username']) !!}
          @if ($errors->has('username'))
              <span class="help-block">
                  <strong>{{ $errors->first('username') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Email :</label>
        <div class="col-sm-3">
          {!! Form::text('email',null,['class' => 'form-control','id'=>'email','readonly'=>'true']) !!}
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-footer text-center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
      <a href="{{url('home')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>

  </form>
</div>
{!! Form::close() !!}
