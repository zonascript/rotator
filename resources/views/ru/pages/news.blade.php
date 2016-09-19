@extends('template')

@section('title', 'Новости')

@section('content')

<h3 class="center"> Добро пожаловать на ротатор</h3>

<div id="news">
    @foreach($news as $news)
        <div class="news-blocks">
            <div class="news-title"> {!! $news['title_ru'] !!} </div>
            <div class="news-date"> Опубликовано {{ $news['created_at'] }} </div>
            <div class="news-text"> {!! $news['text_ru'] !!} </div>
        </div>

    @endforeach
</div>

@stop