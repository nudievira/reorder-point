@extends('layouts.app')
@section('title','Edit Reorder Point (ROP)')
@section('content')
{!! Form::model($data,['route' => ['rop.update',$data->id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
@include('rop.form')
{!! Form::close() !!}
@endsection
