@extends('layouts.app')
@section('title','Edit Safty Stock')
@section('content')
{!! Form::model($data,['route' => ['saftystock.update',$data->id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
@include('saftystock.form')
{!! Form::close() !!}
@endsection
