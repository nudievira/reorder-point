@extends('layouts.app')
@section('title','Tambah Satuan Barang')
@section('content')
{!! Form::open(['route' => 'satuanbarang.store','class'=>'form-horizontal']) !!}
@include('satuanbarang.form')
{!! Form::close() !!}
@endsection
