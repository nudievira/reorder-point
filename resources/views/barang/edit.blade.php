@extends('layouts.app')
@section('title','Edit Barang')
@section('content')
{!! Form::model($data,['route' => ['barang.update',$data->id],'files'=>true,'method'=>'PATCH','class'=>'form-horizontal']) !!}
@include('barang.form')
{!! Form::close() !!}
@endsection
