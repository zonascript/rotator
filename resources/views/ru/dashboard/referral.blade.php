@extends('dashboard.template')

@section('title', 'Dashboard homepage')

@section('content')
    <h3> Реферальные адреса кошельков </h3>

    <div class="ref-block">
        @foreach($coins as $coin)
            {!! Form::open(array('url' => 'dashboard/new-address', 'method' => 'post','class' => 'form-inline' )) !!}
                <div class="form-group">
                    {!!Form::hidden('coin', $coin['coin_name']) !!}
                    {!!Form::label('address', $coin['coin_name']) !!}
                    {!!Form::text('address',$user['ref_'.$coin['coin_name']], ['class' => 'form-control','maxlength' => '100']) !!}

                    <div class="form-group">
                        {!!Form::submit('Reset', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        @endforeach

    </div>

    <hr>

    <h4> Your referral link: <b> {!! url('refer/'.$user['id']) !!} </b> </h4>

    <hr>

    <h4> Your Refferrals: <b> {!! $refCount !!} </b>  </h4>

    <hr>

    <div class="banner"> <img src="{{ url('img/banner/728x90.jpg') }}" title="ReFaucet"> </div>
    <textarea class="form-control" style="height: 100px;">
        <a href="{{ url('refer/'.$user['id']) }}" alt="ReFaucet Rotator - bitcoin, litecoin, doge, primecoin, dash faucets" title="ReFaucet">
        <img title="Refaucet Rotator" src="{{ url('img/banner/728x90.jpg') }}">
        </a>
    </textarea>

    <hr>

    <div class="banner"> <img src="{{ url('img/banner/336x280.jpg') }}" title="ReFaucet"> </div>
    <textarea class="form-control" style="height: 100px;">
        <a href="{{ url('refer/'.$user['id']) }}" alt="ReFaucet Rotator - bitcoin, litecoin, doge, primecoin, dash faucets" title="ReFaucet">
        <img title="Refaucet Rotator" src="{{ url('img/banner/336x280.jpg') }}">
        </a>
    </textarea>

    <hr>

    <div class="banner"> <img src="{{ url('img/banner/300x600.jpg') }}" title="ReFaucet"> </div>
    <textarea class="form-control" style="height: 100px;">
        <a href="{{ url('refer/'.$user['id']) }}" alt="ReFaucet Rotator - bitcoin, litecoin, doge, primecoin, dash faucets" title="ReFaucet">
        <img title="Refaucet Rotator" src="{{ url('img/banner/300x600.jpg') }}">
        </a>
    </textarea>

@stop