@extends('layouts.app')
@section('title','Home')
@section('content')
  <div class="callout callout-info">
    <h4>Selamat Datang ... !</h4>

    <p>{{Auth::user()->name}}, di {{config('app.name')}} {{config('app.perusahaan')}}<br/>
      {{config('app.alamat')}}
    </p>
  </div>
  @if(Auth::user()->users_level_id == '2')
    @include('layouts.stat-box')
  @endif
  @include('warning.index')
@endsection
