<table id="datatables" class="table table-bordered table-striped table-hover">
  <thead>
  <tr>
    <th class="col-md-1 text-center">No</th>
    <th class="text-center">Nomor</th>
    <th class="text-center">Tanggal</th>
    <th class="text-center">Kode</th>
    <th class="text-center">Nama</th>
    <th class="text-center">Satuan</th>
    <th class="text-center">Jenis</th>
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
      <td class="text-center">{{$row->jual->nomor}}</td>
      <td class="text-center">{{tgl_str($row->jual->tanggal)}}</td>
      <td class="text-center">{{$row->barang->kode}}</td>
      <td class="text-left">{{$row->barang->nama}}</td>
      <td class="text-center">{{$row->barang->satuan->satuan}}</td>
      <td class="text-left">{{$row->barang->jenis->jenis}}</td>
      <td class="text-center">{{$row->jumlah}}</td>
      <td class="text-right">{{number_format($row->harga)}}</td>
      <td class="text-right">{{number_format($total)}}</td>
    </tr>
    <?php
    $g_total +=$total;
    ?>
  @endforeach
  <tr>
    <td colspan="9" class="text-center">Total</td>
    <td class="text-right">{{number_format($g_total)}}</td>
  </tr>
  </tbody>
</table>
