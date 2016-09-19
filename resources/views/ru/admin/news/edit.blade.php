@extends('admin.admin')
@section('title', 'Edit')

@section('content')
@include('admin.news.nav')

<h3> <center> <b>Edit post</b> </center> </h3>

<div id="create-form">
@include('errors.list')

{!! Form::model($news , array('url' => 'admin/news/update/'.$news['id'], 'method' => 'patch')) !!}
    @include('admin.news.form')
{!! Form::close() !!}

</div>

@stop