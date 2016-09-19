@extends('admin.admin')
@section('title', 'Create new faq')

@section('content')
@include('admin.faq.nav')

<h3> <center> <b>Create new faq</b> </center> </h3>

<div id="create-form">
@include('errors.list')

{!! Form::open(array('url' => 'admin/faq/store', 'method' => 'post')) !!}
    @include('admin.faq.form')
{!! Form::close() !!}
</div>

@stop