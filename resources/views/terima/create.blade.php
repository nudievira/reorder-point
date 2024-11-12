@extends('layouts.app')
@section('title','Tambah Penerimaan Barang')
@section('content')
{!! Form::open(['route' => 'terima.store','name'=>'my-form','id'=>'my-form','class'=>'form-horizontal']) !!}
@include('terima.form')
{!! Form::close() !!}
@endsection
