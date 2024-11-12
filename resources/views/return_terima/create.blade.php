@extends('layouts.app')
@section('title','Tambah Return Pemerimaan Barang')
@section('content')
{!! Form::open(['route' => 'returnterima.store','name'=>'my-form','id'=>'my-form','class'=>'form-horizontal']) !!}
@include('return_terima.form')
{!! Form::close() !!}
@endsection
