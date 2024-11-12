@extends('layouts.app')
@section('title','Edit Satuan Barang')
@section('content')
{!! Form::model($data,['route' => ['satuanbarang.update',$data->id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
@include('satuanbarang.form')
{!! Form::close() !!}
@endsection
