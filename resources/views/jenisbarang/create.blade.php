@extends('layouts.app')
@section('title','Tambah Jenis Barang')
@section('content')
{!! Form::open(['route' => 'jenisbarang.store','class'=>'form-horizontal']) !!}
@include('jenisbarang.form')
{!! Form::close() !!}
@endsection
