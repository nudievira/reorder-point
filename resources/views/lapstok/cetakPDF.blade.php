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
<center><h4>LAPORAN STOK BARANG</h4></center>
<table id="datatables" class="table table-bordered table-striped table-hover">
  <thead>
  <tr>
    <th class="col-md-1 text-center">No</th>
    <th class="text-center">Kode</th>
    <th class="text-center">Nama</th>
    <th class="text-center">Satuan</th>
    <th class="text-center">Jenis</th>
    <th class="text-center">Harga</th>
    <th class="col-md-1 text-center">Stok Akhir</th>
    <th class="col-md-1 text-center">Safty Stock</th>
    <th class="col-md-1 text-center">ROP</th>
    <th class="col-md-1 text-center">Status</th>
  </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    ?>
  @foreach($data as $row)
    <?php
    $ss = getSS($row->id);
    $rop = getROP($row->id,$ss);
    $status = status_ss($row->id,$ss).'/'.status_rop($row->id,$rop);
    ?>
    <tr>
      <td class="text-center">{{$no++}}</td>
      <td class="text-center">{{$row->kode}}</td>
      <td>{{$row->nama}}</td>
      <td class="text-center">{{$row->satuan->satuan}}</td>
      <td>{{$row->jenis->jenis}}</td>
      <td class="text-right">{{number_format($row->harga)}}</td>
      <td class="text-center">{{stok_akhir($row->id)}}</td>
      <td class="text-center"><?php echo $ss; ?></td>
      <td class="text-center"><?php echo $rop; ?></td>
      <td class="text-center"><?php echo $status;?></td>
    </tr>
  @endforeach
  </tbody>
</table>
<p>Tanggal Cetak : <?php echo date('d-m-Y'); ?> </p>
<p>Dicetak Oleh<br/><br/><br/>
{{Auth::user()->name}}
</p>
