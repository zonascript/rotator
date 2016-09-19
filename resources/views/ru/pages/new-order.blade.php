@extends('template')

@section('title', 'Добавить новый кран')

@section('content')

<div id="order-form">

<h3 class="center"> Добавить новый кран </h3>
@include('errors.list')

{!! Form::open(array('url' => 'order/set', 'method' => 'post')) !!}

    <div class="form-group">
        {!!Form::label('site', 'Веб-сайт') !!}
        {!!Form::text('site',null, ['class' => 'form-control','placeholder' => 'domain.com']) !!}
    </div>

    <div class="form-group">
         {!!Form::label('comment', 'Информация') !!}
         {!!Form::textarea('comment',null, ['class' => 'form-control','placeholder' => 'Немного о сайте, не обязательно']) !!}
     </div>

    <div class="form-group">
        {!!Form::submit('Добавить', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}
</div>

@stop