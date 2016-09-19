<div id="filter">
    <h3> Faucet filters </h3>
    {!! Form::open(array('url' => $faucetName.'/filter', 'method' => 'post')) !!}

        <table class="table-filter">
            <tr>
                <td>
                    {!! Form::label('script', 'Script:') !!}
                    {!! Form::select('script', $scriptArr, $script, ['class' => 'form-control']) !!}
                </td>
                <td>
                    {!! Form::label('captcha', 'Captcha:') !!}
                    {!! Form::select('captcha', $captchaArr, $captcha, ['class' => 'form-control']) !!}
                </td>
                <td>
                    {!! Form::label('period', 'Period:') !!}
                    {!! Form::select('period',$periodArr, $period, ['class' => 'form-control']) !!}
                </td>
            </tr>

            <tr>
                <td>
                    {!! Form::label('antibot', 'Antibot:') !!}
                    {!! Form::select('antibot',$antibotArr, $antibot, ['class' => 'form-control']) !!}
                </td>
                <td>
                    {!! Form::label('wait', 'Wait:') !!}
                    {!! Form::select('wait',$waitArr, $antibot, ['class' => 'form-control']) !!}
                </td>
                <td>
                    {!! Form::submit('Filtering', ['class' => 'btn btn-primary']) !!}
                </td>
            </tr>
        </table>
    {!! Form::close() !!}

    <hr>

    <a class="btn btn-info" href="{{ url('my/'.$faucetName) }}">Get my own list of faucets</a>

    @if( !empty(Cookie::get($faucetName.'-adress')) )
        <hr>
        <div class="browser-click">
            <span style="margin-right: 20px; ">  {{ count($faucet) }} faucets with ~{{ $capital }} satoshi </span>
            <!-- CLICK TO BROWSER -->
            <a href="{{ url('browser/'.$faucetName.'/'.$script.'/'.$captcha.'/'.$period.'/'.$antibot.'/'.$wait) }}" class="btn btn-success"> Go to Browser </a>
        </div>
    @endif

    <hr>

    <h5> Order By </h5>

    <div class="order-filter">
        @if(empty(Cookie::get('orderBy')) || Cookie::get('orderBy')=='rewards')
            <a class="btn btn-info" href="{{ url('filter/change/reward') }}"> Reward </a>
            <a class="btn btn-default" href="{{ url('filter/change/period') }}"> Period </a>
            <a class="btn btn-default" href="{{ url('filter/change/votes') }}"> Votes </a>
        @elseif(Cookie::get('orderBy')=='period')
            <a class="btn btn-default" href="{{ url('filter/change/rewards') }}"> Reward </a>
            <a class="btn btn-info" href="{{ url('filter/change/period') }}"> Period </a>
            <a class="btn btn-default" href="{{ url('filter/change/votes') }}"> Votes </a>
        @elseif(Cookie::get('orderBy')=='votes')
            <a class="btn btn-default" href="{{ url('filter/change/rewards') }}"> Reward </a>
            <a class="btn btn-default" href="{{ url('filter/change/period') }}"> Period </a>
            <a class="btn btn-info" href="{{ url('filter/change/votes') }}"> Votes </a>
        @endif
    </div>

</div>


