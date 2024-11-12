<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">@yield('title')</h3>
  </div>
  <form class="form-horizontal">
    <div class="box-body">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Name :</label>
        <div class="col-sm-5">
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
        <div class="col-sm-5">
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
        <div class="col-sm-5">
          {!! Form::email('email',null,['class' => 'form-control','id'=>'email']) !!}
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('users_level_id') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Level :</label>
        <div class="col-sm-3">
          <select class="form-control" name="users_level_id" id="users_level_id">
            <option value=""></option>
            @foreach($list_users_level as $row)
              <?php
              if(!empty($data->users_level_id))
              {
                $select = $data->users_level_id==$row->id?'selected':'';
              }else{
                $select = '';
              }
              ?>
              <option value="{{$row->id}}" {{$select}}>{{$row->level}}</option>
            @endforeach
          </select>
          @if ($errors->has('users_level_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('users_level_id') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Password :</label>
        <div class="col-sm-5">
          {!! Form::password('password',null,['class' => 'form-control','id'=>'password']) !!}
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Confirm Password :</label>
        <div class="col-sm-5">
          {!! Form::password('password_confirmation',null,['class' => 'form-control','id'=>'password_confirmation']) !!}
          @if ($errors->has('password_confirmation'))
              <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-footer text-center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
      <a href="{{url('pengguna')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>

  </form>
</div>
