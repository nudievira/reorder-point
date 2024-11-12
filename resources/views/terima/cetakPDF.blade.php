<style media="screen">
  table {
    width: 100%;
    border-collapse: collapse;
  }
  table, th, td {
     border: 1px solid black;
  }
  .text-center{
    text-align: center;
  }
  .text-right {
    text-align: right;
  }
</style>
<p>
  {{config('app.perusahaan')}}<br/>
  {{config('app.alamat')}}<br/>
</p>
<center><u><h2>FORMULIR PENERIMAAN BARANG</h2></u></center>
<p><b>Nomor : {{$data->nomor}}</b><br/>
<b>Supplier : {{$data->supplier->nama}}</b><br/>
Tanggal : {{tgl_str($data->tanggal)}}</p>

<table class="table table-bordered">
  <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Kode Barang</th>
      <th class="text-center">Nama Barang</th>
      <th class="text-center">Satuan</th>
      <th class="text-center">Jumlah</th>
      <th class="text-center">Harga</th>
      <th class="text-center">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    $g_total = 0;
    ?>
    @foreach($dataDetail as $row)
      <?php
      $total = $row->jumlah*$row->harga;
      ?>
      <tr>
        <td class="text-center">{{$no++}}</td>
        <td class="text-center">{{$row->barang->kode}}</td>
        <td>{{$row->barang->nama}}</td>
        <td class="text-center">{{$row->barang->satuan->satuan}}</td>
        <td class="text-center">{{$row->jumlah}}</td>
        <td class="text-right">{{number_format($row->harga)}}</td>
        <td class="text-right">{{number_format($total)}}</td>
      </tr>
      <?php
      $g_total +=$total;
      ?>
    @endforeach
    <tr>
      <td colspan="6" class="text-center">Total</td>
      <td class="text-right">{{number_format($g_total)}}</td>
    </tr>
  </tbody>
</table>
<br/><br/>
<p>Diterima oleh, <br/><br/><br/><br/>
{{$data->user->name}}
</p>
