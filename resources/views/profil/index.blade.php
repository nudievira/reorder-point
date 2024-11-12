@extends('layouts.app')
@section('title','Profil Pengguna')
@section('content')

<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
    <li><a href="#picture" data-toggle="tab">Picture</a></li>
    <li><a href="#password" data-toggle="tab">Password</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="profil">
      @include('profil.profil')
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="picture">
      @include('profil.picture')
    </div>
    <div class="tab-pane" id="password">
      @include('profil.ubahpassword')
    </div>
  </div>

</div>

@endsection
