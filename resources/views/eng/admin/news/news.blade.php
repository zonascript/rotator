@extends('admin.admin')

@section('title', 'News')


@section('content')

@include('admin.news.nav')

    <table id="news-table" class="table table-striped">

        <thead>
            <tr>
                <th> Title </th>
                <th> Text </th>
                <th> Published </th>
                <th> Action </th>
                <th>  </th>
            </tr>
        </thead>

        <tbody>
            @foreach($news as $news)
            <tr>
                <td> {!! substr($news['title'], 0, 10) !!}</td>
                <td> {!! substr($news['text'], 0, 20) !!} ... </td>
                <td> {!! $news['published_at'] !!}</td>
                <td> <a href="{{ url('admin/news/edit/'.$news['id']) }}" class="btn btn-success" href=""> Edit </a> </td>
                <td> <a href="{{ url('admin/news/destroy/'.$news['id']) }}" class="btn btn-danger" href=""> Delete </a> </td>
            </tr>
            @endforeach
        </tbody>

    </table>

@stop