@extends('layouts.app')
@section('title','Edit Level Pengguna')
@section('content')
{!! Form::model($data,['route' => ['levelpengguna.update',$data->id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
@include('levelpengguna.form')
{!! Form::close() !!}
@endsection
