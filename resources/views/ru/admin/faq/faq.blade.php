@extends('admin.admin')

@section('title', 'Faq')

@section('content')

@include('admin.faq.nav')

    <table class="table table-striped">

        <thead>

            <tr>
                <th> Title </th>
                <th> Created at </th>
                <th> Updated at </th>
                <th> Action </th>
                <th>  </th>
            </tr>

        </thead>

        <tbody>
            @foreach($faq as $faq)
            <tr>
                <td> {!! $faq['title'] !!} </td>
                <td> {!! $faq['created_at'] !!} </td>
                <td> {!! $faq['updated_at'] !!} </td>
                <td> <a class="btn btn-success" href="{{ url('admin/faq/edit').'/'.$faq['id'] }}"> Edit </a> </td>
                <td> <a class="btn btn-danger" href="{{ url('admin/faq/destroy').'/'.$faq['id'] }}"> Delete </a> </td>
            </tr>
            @endforeach
        </tbody>

    </table>

@stop