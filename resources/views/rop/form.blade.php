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
      <div class="form-group{{ $errors->has('daily') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Pemakaian Rata-rata :</label>
        <div class="col-sm-1">
          {!! Form::text('daily',null,['class' => 'form-control','id'=>'daily','onkeypress'=>'return hanyaAngka(event)','autocomplete'=>'off']) !!}
          @if ($errors->has('daily'))
              <span class="help-block">
                  <strong>{{ $errors->first('daily') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group{{ $errors->has('delivery_leadtime') ? ' has-error' : '' }}">
        <label for="inputEmail3" class="col-sm-2 control-label text-right">Leadtime :</label>
        <div class="col-sm-1">
          {!! Form::text('delivery_leadtime',null,['class' => 'form-control','id'=>'delivery_leadtime','onkeypress'=>'return hanyaAngka(event)','autocomplete'=>'off']) !!}
          @if ($errors->has('delivery_leadtime'))
              <span class="help-block">
                  <strong>{{ $errors->first('delivery_leadtime') }}</strong>
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
      <a href="{{url('rop')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
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
