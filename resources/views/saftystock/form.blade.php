<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">@yield('title')</h3>
  </div>
  <form class="form-horizontal">
    <div class="box-body">
      <div class="form-group{{ $errors->has('m_barang_id') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Nama Barang :</label>
        <div class="col-sm-5">
          <select class="form-control select2" name="m_barang_id" id="m_barang_id" style="width: 100%;">
            <option value="">-Pilih-</option>
            @foreach($list_barang as $barang)
              <?php
              if(!empty($data->m_barang_id)){
                $select = $data->m_barang_id==$barang->id?'selected':'';
              }else{
                $select = '';
              }
              ?>
              <option value="{{$barang->id}}" {{$select}}>{{$barang->kode}} - {{$barang->nama}}</option>
            @endforeach
          </select>
          @if ($errors->has('m_barang_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('m_barang_id') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('max') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Pemakaian Maksimum :</label>
        <div class="col-sm-1">
          {!! Form::text('max',null,['class' => 'form-control','id'=>'max','onkeypress'=>'return hanyaAngka(event)','autocomplete'=>'off']) !!}
          @if ($errors->has('max'))
              <span class="help-block">
                  <strong>{{ $errors->first('max') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('rerata') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Pemakaian Rata-rata :</label>
        <div class="col-sm-1">
          {!! Form::text('rerata',null,['class' => 'form-control','id'=>'rerata','onkeypress'=>'return hanyaAngka(event)','autocomplete'=>'off']) !!}
          @if ($errors->has('rerata'))
              <span class="help-block">
                  <strong>{{ $errors->first('rerata') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('leadtime') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Leadtime :</label>
        <div class="col-sm-1">
          {!! Form::text('leadtime',null,['class' => 'form-control','id'=>'leadtime','onkeypress'=>'return hanyaAngka(event)','autocomplete'=>'off']) !!}
          @if ($errors->has('leadtime'))
              <span class="help-block">
                  <strong>{{ $errors->first('leadtime') }}</strong>
              </span>
          @endif
        </div>
        <div class="col-sm-2">
          / Minggu
        </div>
      </div>
    </div>


    <div class="box-footer text-center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
      <a href="{{url('saftystock')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
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
