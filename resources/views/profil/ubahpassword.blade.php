{!! Form::model($data,['route' => ['profil.updatepassword',$data->id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Password</h3>
  </div>
  <form class="form-horizontal">

    <div class="box-body">
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Password :</label>
        <div class="col-sm-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Confirm Password :</label>
        <div class="col-sm-3">
          <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm Password">
          @if ($errors->has('confirm_password'))
              <span class="help-block">
                  <strong>{{ $errors->first('confirm_password') }}</strong>
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
