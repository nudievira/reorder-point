@extends('layouts.app')
@section('title','Tambah Return Penjualan Barang')
@section('content')
{!! Form::open(['route' => 'returnjual.store','name'=>'my-form','id'=>'my-form','class'=>'form-horizontal']) !!}
@include('return_jual.form')
{!! Form::close() !!}
@endsection
