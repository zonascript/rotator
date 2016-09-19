@extends('template')

@section('title', 'Login to RaFaucet')

@section('description', 'Login to RaFaucet in your personal dashboard. Control referrals.')

@section('content')

<div class="auth-form">

<h3 class="center"> Login to ReFaucet </h3>
@include('errors.list')

{!! Form::open(array('url' => 'auth/signIn', 'method' => 'post')) !!}

    <div class="form-group">
        {!!Form::label('email', 'Email') !!}
        {!!Form::text('email',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
         {!!Form::label('password', 'Password') !!}
         {!!Form::password('password', ['class' => 'form-control']) !!}
     </div>

    <div class="form-group">
        {!!Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}
    </div>

{!! Form::close() !!}

<a href="{{ url('auth/registration') }}"> Registration </a>

<!-- <a class="text-right" href="{{ url('auth/forgot') }}"> Forgot password ? </a> -->

</div>

@stop