<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">@yield('title')</h3>
  </div>
  <form class="form-horizontal">
    <div class="box-body">
      <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Level :</label>
        <div class="col-sm-3">
          {!! Form::text('level',null,['class' => 'form-control','id'=>'level']) !!}
          @if ($errors->has('level'))
              <span class="help-block">
                  <strong>{{ $errors->first('level') }}</strong>
              </span>
          @endif
        </div>
      </div>

    </div>

    <div class="box-footer text-center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
      <a href="{{url('levelpengguna')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>

  </form>
</div>
