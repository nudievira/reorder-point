@extends('layouts.app')
@section('title','Tambah Level Pengguna')
@section('content')
{!! Form::open(['route' => 'levelpengguna.store','class'=>'form-horizontal']) !!}
@include('levelpengguna.form')
{!! Form::close() !!}
@endsection
