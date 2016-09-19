@extends('template')

@section('title', 'FAQ')

@section('content')

<h3 class="center"> FAQ - вопросы и ответы </h3>

    @foreach($faq as $faq)
        <div class="faq">
        <div class="faq-title"> {!! $faq['title_ru'] !!} </div>
        <div class="faq-text"> {!! $faq['text_ru'] !!} </div>
        </div>
    @endforeach


@stop