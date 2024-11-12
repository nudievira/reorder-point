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
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Nama Barang :</label>
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
      <div class="form-group{{ $errors->has('m_satuan_id') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Satuan :</label>
        <div class="col-sm-3">
          {{-- {!! Form::select('m_satuan_id',$list_satuan,['class' => 'form-control select2','id'=>'m_satuan_id']) !!} --}}
          <select class="form-control select2" name="m_satuan_id" id="m_satuan_id" style="width: 100%;">
            <option value="">-Pilih-</option>
            @foreach($list_satuan as $row)
              <?php
              if(!empty($data->m_satuan_id)){
                $select = $data->m_satuan_id==$row->id?'selected':'';
              }else{
                $select = '';
              }
              ?>
              <option value="{{$row->id}}" {{$select}}>{{$row->satuan}}</option>
            @endforeach
          </select>

          @if ($errors->has('m_satuan_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('m_satuan_id') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('m_jenis_id') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Jenis :</label>
        <div class="col-sm-3">
          {{-- {!! Form::select('m_jenis_id',$list_satuan,['class' => 'form-control select2','id'=>'m_jenis_id']) !!} --}}
          <select class="form-control select2" name="m_jenis_id" id="m_jenis_id" style="width: 100%;">
            <option value="">-Pilih-</option>
            @foreach($list_jenis as $row)
              <?php
              if(!empty($data->m_jenis_id)){
                $select = $data->m_jenis_id==$row->id?'selected':'';
              }else{
                $select = '';
              }
              ?>
              <option value="{{$row->id}}" {{$select}}>{{$row->jenis}}</option>
            @endforeach
          </select>

          @if ($errors->has('m_jenis_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('m_jenis_id') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Harga :</label>
        <div class="col-sm-2">
          {!! Form::text('harga',null,['class' => 'form-control text-right','id'=>'harga','onkeypress'=>'return hanyaAngka(event)','autocomplete'=>'off']) !!}
          @if ($errors->has('harga'))
              <span class="help-block">
                  <strong>{{ $errors->first('harga') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('stok_awal') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Stok Awal :</label>
        <div class="col-sm-1">
          {!! Form::text('stok_awal',null,['class' => 'form-control','id'=>'stok_awal','onkeypress'=>'return hanyaAngka(event)','autocomplete'=>'off']) !!}
          @if ($errors->has('stok_awal'))
              <span class="help-block">
                  <strong>{{ $errors->first('stok_awal') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Gambar :</label>
        <div class="col-sm-1">
          {!! Form::file('gambar',null,['class' => 'form-control','id'=>'gambar']) !!}
          @if ($errors->has('gambar'))
              <span class="help-block">
                  <strong>{{ $errors->first('gambar') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>
    @if(!empty($data->gambar))
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Preview :</label>
        <div class="col-sm-2">
          @if(!empty($data->gambar))
          <img src="{{ URL::asset('gambar/'.$data->gambar)}}" alt="" width="200">
          @endif
        </div>
      </div>
    </div>
    @endif
    <div class="box-footer text-center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
      <a href="{{url('barang')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>

  </form>
</div>

@push('scripts')
<script type="text/javascript">
$(".select2").select2();

function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 &&  (charCode <= 45 || charCode > 57) && (charCode >46 ) )

    return false;

  return true;
}
</script>
@endpush
