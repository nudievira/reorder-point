@extends('layouts.app')
@section('title','Tambah Pesanan')
@section('content')
{!! Form::open(['route' => 'pesan.store','name'=>'my-form','id'=>'my-form','class'=>'form-horizontal']) !!}
@include('pesan.form')
{!! Form::close() !!}
@endsection
