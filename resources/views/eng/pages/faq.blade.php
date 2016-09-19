@extends('template')

@section('title', 'FAQ')

@section('description','FAQ about ReFaucet rotator faucets.')

@section('content')

<h3 class="center"> FAQ</h3>

    @foreach($faq as $faq)
        <div class="faq">
        <div class="faq-title"> {!! $faq['title'] !!} </div>
        <div class="faq-text"> {!! $faq['text'] !!} </div>
        </div>
    @endforeach


@stop