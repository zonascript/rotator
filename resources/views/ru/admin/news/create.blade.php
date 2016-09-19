@extends('admin.admin')
@section('title', 'Create new post')

@section('content')
@include('admin.news.nav')

<h3> <center> <b>Create new post</b> </center> </h3>

<div id="create-form">
@include('errors.list')

{!! Form::open(array('url' => 'admin/news/store', 'method' => 'post')) !!}
    @include('admin.news.form')
{!! Form::close() !!}
</div>

@stop