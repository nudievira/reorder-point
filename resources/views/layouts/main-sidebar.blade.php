<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php
        $picture = Auth::user()->picture;
        ?>
        @if($picture)
          <img src="{{ URL::asset('pictures/'.$picture)}}" class="img-circle" alt="{{Auth::user()->name}}">
        @else
          <img src="{{URL::asset('dist/img/avatar2.png')}}" class="img-circle" alt="User Image">
        @endif
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <form action="{{url('cari')}}" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Cari Barang..">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>

    @include('layouts.menu')
  </section>
</aside>
