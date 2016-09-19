@extends('admin.admin')
@section('title', 'Edit')

@section('content')
@include('admin.faucets.nav')

<h3> <center> <b>Edit new faucet</b> </center> </h3>

<div id="create-form">
@include('errors.list')

{!! Form::model($arrFaucet , array('url' => 'admin/'.$faucetName.'/update/'.$arrFaucet->id, 'method' => 'patch')) !!}
    @include('admin.faucets.form')
{!! Form::close() !!}
</div>

@stop