@extends('admin.admin')

@section('title', 'Order')

@section('content')

    <table class="table table-striped">

        <thead>

            <tr>
                <th> WebSite </th>
                <th> Comment </th>
                <th> Date </th>
                <th> Action </th>
            </tr>

        </thead>

        <tbody>
            @foreach($order as $order)
            <tr>
                <td> {!! $order['site'] !!}</td>
                <td> {!! $order['comment'] !!}</td>
                <td> {!! $order['created_at'] !!}</td>
                <td> <a class="btn btn-danger" href="{{ url('admin/order/destroy').'/'.$order['id'] }}"> Delete </a> </td>
            </tr>
            @endforeach
        </tbody>

    </table>

@stop