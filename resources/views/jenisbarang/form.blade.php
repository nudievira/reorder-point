<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">@yield('title')</h3>
  </div>
  <form class="form-horizontal">
    <div class="box-body">
      <div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Jenis :</label>
        <div class="col-sm-3">
          {!! Form::text('jenis',null,['class' => 'form-control','id'=>'jenis']) !!}
          @if ($errors->has('jenis'))
              <span class="help-block">
                  <strong>{{ $errors->first('jenis') }}</strong>
              </span>
          @endif
        </div>
      </div>

    </div>

    <div class="box-footer text-center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
      <a href="{{url('jenisbarang')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>

  </form>
</div>
