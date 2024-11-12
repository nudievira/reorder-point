@extends('layouts.app')
@section('title','Tambah Reorder Point (ROP)')
@section('content')
{!! Form::open(['route' => 'rop.store','class'=>'form-horizontal']) !!}
@include('rop.form')
{!! Form::close() !!}
@endsection
