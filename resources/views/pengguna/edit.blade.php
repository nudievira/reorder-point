@extends('layouts.app')
@section('title','Edit Pengguna')
@section('content')
{!! Form::model($data,['route' => ['pengguna.update',$data->id],'method'=>'PATCH']) !!}
@include('pengguna.form')
{!! Form::close() !!}
@endsection
