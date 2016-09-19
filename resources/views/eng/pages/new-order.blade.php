@extends('template')

@section('title', 'Add new faucet')

@section('content')

<div id="order-form">

<h3 class="center"> Add new faucet </h3>
@include('errors.list')

{!! Form::open(array('url' => 'order/set', 'method' => 'post')) !!}

    <div class="form-group">
        {!!Form::label('site', 'WebSite') !!}
        {!!Form::text('site',null, ['class' => 'form-control','placeholder' => 'domain.com']) !!}
    </div>

    <div class="form-group">
         {!!Form::label('comment', 'Information') !!}
         {!!Form::textarea('comment',null, ['class' => 'form-control','placeholder' => 'Not necessarily Field']) !!}
     </div>

    <div class="form-group">
        {!!Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}
</div>

@stop