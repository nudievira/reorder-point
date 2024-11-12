@extends('layouts.app')
@section('title','Tambah Pengguna')
@section('content')
{!! Form::open(['route' => 'pengguna.store']) !!}
@include('pengguna.form')
{!! Form::close() !!}
@endsection
