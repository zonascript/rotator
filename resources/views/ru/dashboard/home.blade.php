@extends('dashboard.template')

@section('title', 'Dashboard homepage')

@section('content')
    <h3> {{ $user['name'] }}, welcome </h3>
    <p> Your email: {{ $user['email'] }}</p>
    <hr>
    <h3> Wallets in cookies: </h3>

    @if(Cookie::get('bitcoin-adress')) <p> Bitcoin: {{ Cookie::get('bitcoin-adress') }}  @endif
    @if(Cookie::get('dogecoin-adress')) <p> Dogecoin: {{ Cookie::get('dogecoin-adress') }}  @endif
    @if(Cookie::get('litecoin-adress')) <p> Litecoin: {{ Cookie::get('litecoin-adress') }}  @endif
    @if(Cookie::get('dash-adress')) <p> Dash: {{ Cookie::get('dash-adress') }}  @endif
    @if(Cookie::get('peercoin-adress')) <p> Peercoin: {{ Cookie::get('peercoin-adress') }}  @endif
    @if(Cookie::get('primecoin-adress')) <p> Primecoin: {{ Cookie::get('primecoin-adress') }}  @endif

    <hr>
@stop