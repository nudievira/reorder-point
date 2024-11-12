@extends('layouts.app')
@section('title','Edit Jenis Barang')
@section('content')
{!! Form::model($data,['route' => ['jenisbarang.update',$data->id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
@include('jenisbarang.form')
{!! Form::close() !!}
@endsection
