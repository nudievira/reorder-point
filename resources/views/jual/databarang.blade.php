<table id="datatables" class="table table-bordered table-condensed table-striped table-hover">
  <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Kode</th>
      <th class="text-center">Nama</th>
      <th class="text-center">Satuan</th>
      <th class="text-center">Stok</th>
      <th class="text-center">Ambil</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $dataBarang = App\Barang::get();
    $no=1;
    ?>
    @foreach($dataBarang as $row)
      <tr>
        <td class="text-center">{{$no++}}</td>
        <td class="text-center">{{$row->kode}}</td>
        <td>{{$row->nama}}</td>
        <td class="text-center">{{$row->satuan->satuan}}</td>
        <td class="text-center">{{stok_akhir($row->id)}}</td>
        <td class="text-center">
          <button type="button" name="ambil" class="btn btn-info btn-xs" onclick="getKode('{{$row->kode}}')"><i class="fa fa-check"></i></button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@push('scripts')
<script type="text/javascript">
    $("#datatables").DataTable();
</script>
@endpush
