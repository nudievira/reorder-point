<style media="screen">
  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
  }
  table, th, td {
     border: 1px solid black;
     padding: 2px;
  }
  .text-center{
    text-align: center;
  }
  .text-right {
    text-align: right;
  }
  p {
    font-size: 10px;
  }
</style>
<p>
  {{config('app.perusahaan')}}<br/>
  {{config('app.alamat')}}<br/>
</p>
<center><h2>LAPORAN PENERIMAAN BARANG</h2></center>
<br/>
<table id="datatables" class="table table-bordered table-striped table-hover">
  <thead>
  <tr>
    <th class="col-md-1 text-center">No</th>
    <th class="text-center">Nomor</th>
    <th class="text-center">Tanggal</th>
    <th class="text-center">Kode</th>
    <th class="text-center">Nama</th>
    <th class="text-center">Supplier</th>
    <th class="text-center">Qty</th>
    <th class="text-center">Harga</th>
    <th class="text-center">Total</th>
  </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    $g_total = 0;
    ?>
  @foreach($data as $row)
    <?php
    $total = $row->jumlah*$row->harga;
    ?>
    <tr>
      <td class="text-center">{{$no++}}</td>
      <td class="text-center">{{$row->terima->nomor}}</td>
      <td class="text-center">{{tgl_str($row->terima->tanggal)}}</td>
      <td class="text-center">{{$row->barang['kode']}}</td>
      <td class="text-left">{{$row->barang['nama']}}</td>
      <td class="text-left">{{$row->terima->supplier->nama}}</td>
      <td class="text-center">{{$row->jumlah}}</td>
      <td class="text-right">{{number_format($row->harga)}}</td>
      <td class="text-right">{{number_format($total)}}</td>
    </tr>
    <?php
    $g_total +=$total;
    ?>
  @endforeach
  <tr>
    <td colspan="8" class="text-center">Total</td>
    <td class="text-right">{{number_format($g_total)}}</td>
  </tr>
  </tbody>
</table>
<p>Tanggal Cetak : <?php echo date('d-m-Y'); ?> </p>
<p>Dicetak Oleh<br/><br/><br/>
{{Auth::user()->name}}
</p>
