@extends('template')

@section('title', 'Login to RaFaucet')

@section('content')

<div class="auth-form">

<h3 class="center"> Регистрация </h3>
@include('errors.list')

{!! Form::open(array('url' => 'auth/create', 'method' => 'post')) !!}

    <div class="form-group">
        {!!Form::label('name', 'Псевдоним') !!}
        {!!Form::text('name',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('email', 'Почта (Email)') !!}
        {!!Form::text('email',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
         {!!Form::label('password', 'Пароль') !!}
         {!!Form::password('password', ['class' => 'form-control']) !!}
     </div>

    <div class="form-group">
         {!!Form::label('password_confirmation', 'Повтрите пароль') !!}
         {!!Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::submit('Зарегистрироватся', ['class' => 'btn btn-primary form-control']) !!}
    </div>

{!! Form::close() !!}

</div>

@stop