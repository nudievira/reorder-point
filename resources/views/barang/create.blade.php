@extends('layouts.app')
@section('title','Tambah Barang')
@section('content')
{!! Form::open(['route' => 'barang.store','files'=>true,'class'=>'form-horizontal']) !!}
@include('barang.form')
{!! Form::close() !!}
@endsection
