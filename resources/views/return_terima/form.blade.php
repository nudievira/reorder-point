
<div class="box box-danger box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">@yield('title')</h3>
  </div>

<div class="row">
  <div class="col-md-6">
  {{-- <form class="form-horizontal"> --}}

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label text-right">Nomor :</label>
        <div class="col-sm-5">
          {!! Form::text('nomor',$nomor,['class' => 'form-control','id'=>'nomor','readonly'=>'true']) !!}
          {!! Form::hidden('id',$id,['class' => 'form-control','id'=>'id','readonly'=>'true']) !!}
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label text-right">Tanggal :</label>
        <div class="col-sm-3">
          @if(!empty($tanggal))
            <label class="col-sm-12 control-label">{{$tanggal}}</label>
          @else
            {!! Form::text('tanggal',date('d-m-Y'),['class' => 'form-control','id'=>'tanggal','data-date-format'=>'dd-mm-yyyy']) !!}
          @endif
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label text-right">No Penerimaan :</label>
        <div class="col-sm-6">
          <select class="form-control select2" name="t_jual_h_id" id="t_jual_h_id" {{$disabled}}>
            <option value="">-Pilih-</option>
            @foreach($list_jual as $jual)
              <?php
              if(!empty($nomor_jual))
              {
                $select = $nomor_jual==$jual->nomor?'selected':'';
              }else{
                $select = '';
              }
              ?>
              <option value="{{$jual->id}}" {{$select}}>{{$jual->nomor}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label text-right">Supplier :</label>
        <div class="col-sm-7">
          {!! Form::text('supplier',$supplier,['class' => 'form-control','id'=>'supplier','readonly'=>'true']) !!}
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label text-right">Kode Barang :</label>
        {!! Form::hidden('m_barang_id',null,['class' => 'form-control','id'=>'m_barang_id','readonly'=>'true']) !!}
        <div class="col-sm-5">
          <select class="form-control" name="kode" id="kode">
            <option value="">-Pilih-</option>
          </select>
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label text-right">Jumlah Retur :</label>
        <div class="col-sm-2">
          {!! Form::text('jumlah',null,['class' => 'form-control','id'=>'jumlah','onkeypress'=>'return hanyaAngka(event)','autocomplete'=>'off']) !!}
        </div>
      </div>
    </div>

  </div>

  <div class="col-md-6">
  <form class="form-horizontal">


    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label text-right">Nama Barang :</label>
        <div class="col-sm-8">
          {!! Form::text('nama_barang',null,['class' => 'form-control','id'=>'nama_barang','readonly'=>'true']) !!}
        </div>
      </div>
  </div>

  <div class="box-body">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label text-right">Satuan Barang :</label>
      <div class="col-sm-3">
        {!! Form::text('satuan',null,['class' => 'form-control','id'=>'satuan','readonly'=>'true']) !!}
      </div>
    </div>
  </div>

  <div class="box-body">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label text-right">Harga Barang :</label>
      <div class="col-sm-4">
        {!! Form::text('harga',null,['class' => 'form-control text-right','id'=>'harga','readonly'=>'true']) !!}
      </div>
    </div>
  </div>

  <div class="box-body">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label text-right">Total :</label>
      <div class="col-sm-4">
        {!! Form::text('total',null,['class' => 'form-control  text-right','id'=>'total','readonly'=>'true']) !!}
      </div>
    </div>
  </div>


  <div class="box-body">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label text-right">Jumlah Barang :</label>
      <div class="col-sm-2">
        {!! Form::text('jumlah_barang',null,['class' => 'form-control','id'=>'jumlah_barang','readonly'=>'true','onkeypress'=>'return hanyaAngka(event)','autocomplete'=>'off']) !!}
      </div>
    </div>
  </div>


  </div>

</div>
    <div class="box-footer text-center">
      <button type="button" class="btn btn-primary" name="save" id="save"><i class="fa fa-floppy-o"></i> Save</button>
      <a href="{{url('returnterima',$nomor)}}"  class="btn btn-info" name="print" id="print"><i class="fa fa-print"></i> Print</a>
      <a href="{{url('returnterima')}}" class="btn btn-danger"><i class="fa fa-remove"></i> Close</a>
    </div>


  {{-- </form> --}}
  <div id="detail"></div>
</div>


<!-- Modal -->
<div class="modal fade modal-default" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Barang</h4>
      </div>
      <div class="modal-body">

        @include('return_terima.databarang')

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@push('scripts')
<script type="text/javascript">
  $(".select2").select2();
  $("#kode").focus();

  $('#tanggal').datepicker({
    autoclose: true
  });
  listBarang();

  $("#t_jual_h_id").change(function(){
    listBarang();
    getSupplier();
  });

  function listBarang()
  {
    var jual_id = $("#t_jual_h_id").val();
    var url = "<?php echo url('returnterima/listBarang');?>";
    $.get(url + '/' + jual_id, function (data) {
      $("#kode").html(data);
    });
  }

  function getSupplier()
  {
    var jual_id = $("#t_jual_h_id").val();
    var url = "<?php echo url('returnterima/getSupplier');?>";
    $.get(url + '/' + jual_id, function (data) {
      // console.log(data.nama);
      $("#supplier").val(data.nama);
    });
  }
  // $("#kode").keyup(function(e){
  //   var kode = $("#kode").val();
  //   if (e.keyCode == 13) {
  //     //  console.log('test');
  //     cariKodeBarang();
  //   }
  //   if(kode.length>=2)
  //   {
  //     cariKodeBarang();
  //   }
  // });

  $("#kode").change(function(){
    cariKodeBarang();
  });


  function cariKodeBarang()
  {
    var id_terima = $("#t_jual_h_id").val();
    var kode = $("#kode").val();
    // var jumlah = $("#jumlah").val();
    var url = "<?php echo url('returnterima/getDataBarang');?>";
    $.get(url + '/' + kode + '/' + id_terima, function (data) {
      console.log(data);
      if(data.nama)
      {
        var jumlah = data.jumlah;//
        var total = parseInt(jumlah*data.harga);
        $("#jumlah_barang").val(jumlah);
        $('#nama_barang').val(data.nama);
        $('#m_barang_id').val(data.id);
        $('#satuan').val(data.satuan);
        $('#harga').val(data.harga);
        $("#total").val(total);

      }else{
        kosong();
      }

    });
  }

  function kosong()
  {
    $('#nama_barang').val('');
    $('#m_barang_id').val('');
    $('#satuan').val('');
    $('#harga').val(0);
    $("#total").val(0);
    $("#jumlah_barang").val(0);
    $("#jumlah").val(0);
    // $("#supplier").val('');
  }

  $("#jumlah").keyup(function(){
    var harga = $("#harga").val();
    var jumlah = $("#jumlah").val();
    var total = parseInt(jumlah*harga);
    $("#total").val(total);
  });

  detail();
  function detail()
  {
    var nomor = $("#nomor").val();
    // var no_jual = $("#no_jual").val();
    var url = "<?php echo url('returnterima/getDetail');?>";
    $.get(url + '/' + nomor, function (data) {
      // console.log(data);
      $('#detail').html(data);
    });
  }

  $("#save").click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var jumlah = $("#jumlah").val();
    var jumlah_barang = $("#jumlah_barang").val();
    var string = $("#my-form").serialize();
    // console.log(string);
    // if(!$("#tanggal").val())
    // {
    //   swal({
    //       title: "Warning",
    //       text: "Tanggal Tidak boleh kosong",
    //       type: "error",
    //       timer: 3000,
    //       showConfirmButton: true
    //   });
    //   return false;
    // }
    if(!$("#t_jual_h_id").val())
    {
      swal({
          title: "Warning",
          text: "Supplier Tidak boleh kosong",
          type: "error",
          timer: 3000,
          showConfirmButton: true
      });
      return false;
    }
    if(!$("#kode").val())
    {
      swal({
          title: "Warning",
          text: "Kode Tidak boleh kosong",
          type: "error",
          timer: 3000,
          showConfirmButton: true
      });
      $("#kode").focus();
      return false;
    }
    if(!$("#m_barang_id").val())
    {
      swal({
          title: "Warning",
          text: "Nama Barang Tidak boleh kosong",
          type: "error",
          timer: 3000,
          showConfirmButton: true
      });
      $("#kode").focus();
      return false;
    }
    if(parseInt(jumlah)>parseInt(jumlah_barang))
    {
      swal({
          title: "Warning",
          text: "Maaf, Jumlah Return tidak boleh lebih besar dari Jumlah Barang",
          type: "error",
          timer: 3000,
          showConfirmButton: true
      });
      $("#jumlah").focus();
      return false;
    }
    $.ajax({
      url   : "{{ route("returnterima.store") }}",
      method : 'POST',
      data : string,
      success:function(data){
        // console.log(data);
        // $("#detail").html(data);
        swal({
            title: "Info",
            text: data.info,
            type: data.status,
            timer: 3000,
            showConfirmButton: false
        });
        detail();
        kosong();
        $("#kode").val('');
        $("#kode").focus();
      },
      error: function (data) {
          // $("#detail").html('<center>Maaf, Error Request</center>');
      }
    });
  });

  function deleteDetail(id)
  {
    // console.log(id);
    var x = confirm('Are you sure ?');
    if(x==true)
    {
      // console.log(id);
      $.ajax({
        url   : "{{ route("returnterima.deleteDetail") }}",
        method : 'POST',
        data : {"id":id,_token: "{{ csrf_token() }}"},
        success:function(data){
          // console.log(data);
          if(data.status=='last success')
          {
            window.location.replace("{{url('returnterima')}}");
          }else{
            swal({
                title: "Info",
                text: data.info,
                type: data.status,
                timer: 3000,
                showConfirmButton: false
            });
            detail();
          }
        }
      });
    }
  }
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 &&  (charCode <= 45 || charCode > 57) && (charCode >46 ) )
      return false;
    return true;
  }

  function getKode(kode)
  {
    // console.log(kode);
    $("#kode").val(kode);
    $('#myModal').modal('toggle');
    $("#kode").focus();
    cariKodeBarang();
  }
</script>
@endpush
