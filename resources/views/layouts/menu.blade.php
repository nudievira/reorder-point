
  <?php
  $level = Auth::user()->users_level_id;
  // dd($level);
  if($level==2)
  {
    $MyNavBar = Menu::make('MyNavBar', function($menu){
      $menu->add('Home','home')->prepend('<i class="fa fa-home"></i> ');
      $menu->add('Config','config')->prepend('<i class="fa fa-cogs"></i> ');
        // $menu->config->add('Group', 'group');
        $menu->config->add('Level Pengguna', 'levelpengguna')->prepend('<i class="fa fa-user"></i> ');
        $menu->config->add('Pengguna', 'pengguna')->prepend('<i class="fa fa-user"></i> ');
        $menu->config->add('Ubah Password', 'ubahpassword')->prepend('<i class="fa fa-key"></i> ');
        $menu->config->add('Reset Password', 'resetpassword')->prepend('<i class="fa fa-wrench"></i> ');
      $menu->add('Master','master')->prepend('<i class="fa fa-keyboard-o"></i> ');
        $menu->master->add('Jenis', 'jenisbarang')->prepend('<i class="fa fa-hand-scissors-o"></i> ');
        $menu->master->add('Satuan', 'satuanbarang')->prepend('<i class="fa fa-suitcase"></i> ');
        $menu->master->add('Barang', 'barang')->prepend('<i class="fa fa-cart-plus"></i> ');
        $menu->master->add('Supplier', 'supplier')->prepend('<i class="fa fa-group"></i> ');
      $menu->add('Transaksi','transaksi')->prepend('<i class="fa fa-qrcode"></i> ');
        $menu->transaksi->add('Pemesanan', 'pesan')->prepend('<i class="fa fa-pencil-square-o"></i> ');
        $menu->transaksi->add('Penerimaan', 'terima')->prepend('<i class="fa fa-bookmark-o"></i> ');
        $menu->transaksi->add('Return Penerimaan', 'returnterima')->prepend('<i class="fa fa-reply"></i> ');
        $menu->transaksi->add('Penjualan', 'jual')->prepend('<i class="fa fa-shopping-cart"></i> ');
      $menu->add('Persediaan','persediaan')->prepend('<i class="fa fa-desktop"></i> ');
        $menu->persediaan->add('Safty Stock', 'saftystock')->prepend('<i class="fa fa-gavel"></i> ');
        $menu->persediaan->add('ROP', 'rop')->prepend('<i class="fa fa-gavel"></i> ');
      $menu->add('Laporan','laporan')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Stok', 'lapstok')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Pemesanan', 'lappesan')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Penerimaan', 'lapterima')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Pereturan', 'lapreturnterima')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Penjualan', 'lapjual')->prepend('<i class="fa fa-print"></i> ');
      $menu->add('Grafik','grafik')->prepend('<i class="fa fa-bar-chart-o"></i> ');
        // $menu->grafik->add('Stok', 'grafikstok')->prepend('<i class="fa fa-bar-chart-o"></i> ');
        $menu->grafik->add('Pemesanan', 'grafikpesan')->prepend('<i class="fa fa-bar-chart-o"></i> ');
        $menu->grafik->add('Penerimaan', 'grafikterima')->prepend('<i class="fa fa-bar-chart-o"></i> ');
        $menu->grafik->add('Pereturan', 'grafikreturnterima')->prepend('<i class="fa fa-bar-chart-o"></i> ');
        $menu->grafik->add('Penjualan', 'grafikjual')->prepend('<i class="fa fa-bar-chart-o"></i> ');
    });
  }else{
    $MyNavBar = Menu::make('MyNavBar', function($menu){
      $menu->add('Home','home')->prepend('<i class="fa fa-home"></i> ');
      $menu->add('Master','master')->prepend('<i class="fa fa-keyboard-o"></i> ');
        $menu->master->add('Jenis', 'jenisbarang')->prepend('<i class="fa fa-hand-scissors-o"></i> ');
        $menu->master->add('Satuan', 'satuanbarang')->prepend('<i class="fa fa-suitcase"></i> ');
        $menu->master->add('Barang', 'barang')->prepend('<i class="fa fa-cart-plus"></i> ');
        $menu->master->add('Supplier', 'supplier')->prepend('<i class="fa fa-group"></i> ');
      $menu->add('Transaksi','transaksi')->prepend('<i class="fa fa-qrcode"></i> ');
        $menu->transaksi->add('Pemesanan', 'pesan')->prepend('<i class="fa fa-pencil-square-o"></i> ');
        $menu->transaksi->add('Penerimaan', 'terima')->prepend('<i class="fa fa-bookmark-o"></i> ');
        $menu->transaksi->add('Return Penerimaan', 'returnterima')->prepend('<i class="fa fa-reply"></i> ');
        $menu->transaksi->add('Penjualan', 'jual')->prepend('<i class="fa fa-shopping-cart"></i> ');
      $menu->add('Persediaan','persediaan')->prepend('<i class="fa fa-desktop"></i> ');
        $menu->persediaan->add('Safty Stock', 'saftystock')->prepend('<i class="fa fa-gavel"></i> ');
        $menu->persediaan->add('ROP', 'rop')->prepend('<i class="fa fa-gavel"></i> ');
      $menu->add('Laporan','laporan')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Stok', 'lapstok')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Pemesanan', 'lappesan')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Penerimaan', 'lapterima')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Pereturan', 'lapreturnterima')->prepend('<i class="fa fa-print"></i> ');
        $menu->laporan->add('Penjualan', 'lapjual')->prepend('<i class="fa fa-print"></i> ');
    });
  }

  ?>
  <ul class="sidebar-menu">
    @include('custom-menu-items', array('items' => $MyNavBar->roots()))
  </ul>
{{-- </ul> --}}
