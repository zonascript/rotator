@extends('template')

@section('title', 'News')

@section('content')

<h3 class="center"> WELCOME TO ROTATOR</h3>

<div id="news">
    @foreach($news as $news)
        <div class="news-blocks">
            <div class="news-title"> {!! $news['title'] !!} </div>
            <div class="news-date"> Published at {{ $news['created_at'] }} </div>
            <div class="news-text"> {!! $news['text'] !!} </div>
        </div>

    @endforeach
</div>

@stop