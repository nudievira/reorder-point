<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">@yield('title')</h3>
  </div>
  <form class="form-horizontal">

    <div class="box-body">
      <div class="form-group{{ $errors->has('kode') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Kode :</label>
        <div class="col-sm-2">
          {!! Form::text('kode',null,['class' => 'form-control','id'=>'kode']) !!}
          @if ($errors->has('kode'))
              <span class="help-block">
                  <strong>{{ $errors->first('kode') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Nama Supplier :</label>
        <div class="col-sm-4">
          {!! Form::text('nama',null,['class' => 'form-control','id'=>'nama']) !!}
          @if ($errors->has('nama'))
              <span class="help-block">
                  <strong>{{ $errors->first('nama') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Alamat :</label>
        <div class="col-sm-7">
          {!! Form::text('alamat',null,['class' => 'form-control','id'=>'alamat']) !!}
          @if ($errors->has('alamat'))
              <span class="help-block">
                  <strong>{{ $errors->first('alamat') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">HP :</label>
        <div class="col-sm-3">
          {!! Form::text('hp',null,['class' => 'form-control','id'=>'hp']) !!}
          @if ($errors->has('hp'))
              <span class="help-block">
                  <strong>{{ $errors->first('hp') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-footer text-center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
      <a href="{{url('supplier')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>

  </form>
</div>
