<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th class="text-center col-md-1">No</th>
      <th class="text-center col-md-2">Kode</th>
      <th class="text-center">Nama Barang</th>
      <th class="text-center col-md-1">Satuan</th>
      <th class="text-center col-md-1">Jumlah</th>
      <th class="text-center">Harga</th>
      <th class="text-center">Total</th>
      <th class="text-center col-md-1">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    $g_total = 0;
    ?>
    @foreach($data as $row)
      @php
      $total = $row->jumlah*$row->harga;
      @endphp
      <tr>
        <td class="text-center">{{$no++}}</td>
        <td class="text-center">{{$row->barang->kode}}</td>
        <td>{{$row->barang->nama}}</td>
        <td class="text-center">{{$row->barang->satuan->satuan}}</td>
        <td class="text-center">{{$row->jumlah}}</td>
        <td class="text-right">{{number_format($row->harga)}}</td>
        <td class="text-right">{{number_format($total)}}</td>
        <td class="text-center">
          <button type="button" class="btn btn-danger btn-xs" onclick="deleteDetail('{{$row->id}}')"><i class="fa fa-remove"></i></button>
        </td>
      </tr>
      <?php $g_total +=$total; ?>
    @endforeach
    <tr>
      <td colspan="6" class="text-center">Total</td>
      <td class="text-right">{{number_format($g_total)}}</td>
    </tr>
  </tbody>
</table>
