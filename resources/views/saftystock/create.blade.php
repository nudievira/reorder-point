@extends('layouts.app')
@section('title','Tambah Safty Stock Barang')
@section('content')
{!! Form::open(['route' => 'saftystock.store','class'=>'form-horizontal']) !!}
@include('saftystock.form')
{!! Form::close() !!}
@endsection
