@extends('layouts.app')
@section('title','Tambah Supplier')
@section('content')
{!! Form::open(['route' => 'supplier.store','class'=>'form-horizontal']) !!}
@include('supplier.form')
{!! Form::close() !!}
@endsection
