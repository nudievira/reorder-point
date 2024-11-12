<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{App\Barang::get()->count()}} <sup style="font-size: 20px">Data</sup></h3>

        <p>Barang</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{url('barang')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{App\Pesan::get()->count()}} <sup style="font-size: 20px">Data</sup></h3>

        <p>Pemesanan</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-clipboard"></i>
      </div>
      <a href="{{url('pesan')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{App\Terima::get()->count()}} <sup style="font-size: 20px">Data</sup></h3>

        <p>Penerimaan</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-time"></i>
      </div>
      <a href="{{url('terima')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{App\Jual::get()->count()}} <sup style="font-size: 20px">Data</sup></h3>

        <p>Penjualan</p>
      </div>
      <div class="icon">
        <i class="ion ion-calculator"></i>
      </div>
      <a href="{{url('jual')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>{{App\ReturnJual::get()->count()}} <sup style="font-size: 20px">Data</sup></h3>

        <p>Return Penerimaan</p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
      <a href="{{url('returnjual')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>{{App\JenisBarang::get()->count()}}<sup style="font-size: 20px">Data</sup></h3>

        <p>Jenis Barang</p>
      </div>
      <div class="icon">
        <i class="ion ion-compose"></i>
      </div>
      <a href="{{url('jenisbarang')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{App\SatuanBarang::get()->count()}}<sup style="font-size: 20px">Data</sup></h3>

        <p>Satuan Barang</p>
      </div>
      <div class="icon">
        <i class="ion ion-compose"></i>
      </div>
      <a href="{{url('satuanbarang')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

</div>
