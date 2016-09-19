<div class="row" id="wallet-form">
    @if( !Cookie::get($faucetName.'-adress') )
        {!! Form::open(array('url' => 'set-wallet', 'method' => 'post')) !!}
            {!! Form::label('wallet', strtoupper($faucetName).' ADRESS:') !!}
            {!! Form::text('wallet', null, ['class' => 'form-control input-text']) !!}
            {!! Form::hidden('faucetName',$faucetName) !!}
            {!! Form::submit('Set', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    @else
        {!! 'Your '.$faucetName.' address: <b>'.Cookie::get($faucetName.'-adress').'</b>' !!}
        <a href="{{ url('unset-wallet/'.$faucetName) }}"> [x]</a>
    @endif

</div>
<hr>