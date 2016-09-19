@extends('template')

@section('title', 'Login to RaFaucet')

@section('description', 'Registration your personal dashboard. Control referrals.')

@section('content')

<div class="auth-form">

<h3 class="center"> Registration to ReFaucet </h3>
@include('errors.list')

{!! Form::open(array('url' => 'auth/create', 'method' => 'post')) !!}

    <div class="form-group">
        {!!Form::label('name', 'Username') !!}
        {!!Form::text('name',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('email', 'Email') !!}
        {!!Form::text('email',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
         {!!Form::label('password', 'Password') !!}
         {!!Form::password('password', ['class' => 'form-control']) !!}
     </div>

    <div class="form-group">
         {!!Form::label('password_confirmation', 'Confirm password') !!}
         {!!Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::submit('Registration', ['class' => 'btn btn-primary form-control']) !!}
    </div>

{!! Form::close() !!}

</div>

@stop