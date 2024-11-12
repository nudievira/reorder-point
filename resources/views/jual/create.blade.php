@extends('layouts.app')
@section('title','Tambah Penjualan')
@section('content')
{!! Form::open(['route' => 'jual.store','name'=>'my-form','id'=>'my-form','class'=>'form-horizontal']) !!}
@include('jual.form')
{!! Form::close() !!}
@endsection
