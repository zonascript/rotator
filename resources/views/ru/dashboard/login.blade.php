@extends('template')

@section('title', 'Вход в ReFaucet')

@section('content')

<div class="auth-form">

<h3 class="center"> Вход в ReFaucet </h3>
@include('errors.list')

{!! Form::open(array('url' => 'auth/signIn', 'method' => 'post')) !!}

    <div class="form-group">
        {!!Form::label('email', 'Почта (Email)') !!}
        {!!Form::text('email',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
         {!!Form::label('password', 'Пароль') !!}
         {!!Form::password('password', ['class' => 'form-control']) !!}
     </div>

    <div class="form-group">
        {!!Form::submit('Вход', ['class' => 'btn btn-primary form-control']) !!}
    </div>

{!! Form::close() !!}

<a href="{{ url('auth/registration') }}"> Регистарция </a>

<!-- <a class="text-right" href="{{ url('auth/forgot') }}"> Forgot password ? </a> -->

</div>

@stop