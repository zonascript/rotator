@extends('admin.admin')
@section('title', 'New')

@section('content')
@include('admin.faucets.nav')

<h3> <center> <b>Create new faucet</b> </center> </h3>

<div id="create-form">
@include('errors.list')

{!! Form::open(array('url' => 'admin/'.$faucetName.'/store', 'method' => 'post')) !!}
    @include('admin.faucets.form')
{!! Form::close() !!}
</div>

@stop