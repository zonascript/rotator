@extends('admin.admin')

@section('title', 'Coins')

@section('content')

    <h3 class="center-bold">ReFaucet wallets address </h3>
    <div class="coins-block">
    @foreach($coins as $coin)

        {!! Form::open(array('url' => 'admin/coins/set-address', 'method' => 'post','class' => 'form-inline' )) !!}
            <div class="form-group">
                {!!Form::hidden('coin', $coin['coin_name']) !!}
                {!!Form::label('address', $coin['coin_name']) !!}
                {!!Form::text('address',$coin['address'], ['class' => 'form-control','maxlength' => '100']) !!}
                <div class="form-group">
                    {!!Form::submit('Reset', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
        {!! Form::close() !!}

    @endforeach
    </div>

@stop
