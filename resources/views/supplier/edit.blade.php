@extends('layouts.app')
@section('title','Edit Supplier')
@section('content')
{!! Form::model($data,['route' => ['supplier.update',$data->id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
@include('supplier.form')
{!! Form::close() !!}
@endsection
