@extends('admin.admin')
@section('title', 'Faq Edit')

@section('content')
@include('admin.faq.nav')

<h3> <center> <b>Edit faq</b> </center> </h3>

<div id="create-form">
@include('errors.list')

{!! Form::model($faq , array('url' => 'admin/faq/update/'.$faq['id'], 'method' => 'patch')) !!}
    @include('admin.faq.form')
{!! Form::close() !!}

</div>

@stop