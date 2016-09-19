<div id="filter">
    <h3> Фильтрация </h3>
    {!! Form::open(array('url' => $faucetName.'/filter', 'method' => 'post')) !!}

        <table class="table-filter">
            <tr>
                <td>
                    {!! Form::label('script', 'Скрипт:') !!}
                    {!! Form::select('script', $scriptArr, $script, ['class' => 'form-control']) !!}
                </td>
                <td>
                    {!! Form::label('captcha', 'Капча:') !!}
                    {!! Form::select('captcha', $captchaArr, $captcha, ['class' => 'form-control']) !!}
                </td>
                <td>
                    {!! Form::label('period', 'Период:') !!}
                    {!! Form::select('period',$periodArr, $period, ['class' => 'form-control']) !!}
                </td>
            </tr>

            <tr>
                <td>
                    {!! Form::label('antibot', 'Антибот:') !!}
                    {!! Form::select('antibot',$antibotArr, $antibot, ['class' => 'form-control']) !!}
                </td>
                <td>
                    {!! Form::label('wait', 'Подождать:') !!}
                    {!! Form::select('wait',$waitArr, $antibot, ['class' => 'form-control']) !!}
                </td>
                <td>
                    {!! Form::submit('Фильтрация', ['class' => 'btn btn-primary']) !!}
                </td>
            </tr>
        </table>
    {!! Form::close() !!}


    @if( !empty(Cookie::get($faucetName.'-adress')) )
        <hr>
        <div class="browser-click">
            <!-- CLICK TO BROWSER -->
            <a href="{{ url('browser/'.$faucetName.'/'.$script.'/'.$captcha.'/'.$period.'/'.$antibot.'/'.$wait) }}" class="btn btn-success"> Перейти в Браузер </a>
        </div>
    @endif

    <hr>

    <h5> Сортировка </h5>

    <div class="order-filter">
        @if(empty(Cookie::get('orderBy')) || Cookie::get('orderBy')=='rewards')
            <a class="btn btn-info" href="{{ url('filter/change/reward') }}"> Награда </a>
            <a class="btn btn-default" href="{{ url('filter/change/period') }}"> Период </a>
            <a class="btn btn-default" href="{{ url('filter/change/votes') }}"> Голоса </a>
        @elseif(Cookie::get('orderBy')=='period')
            <a class="btn btn-default" href="{{ url('filter/change/rewards') }}"> Награда </a>
            <a class="btn btn-info" href="{{ url('filter/change/period') }}"> Период </a>
            <a class="btn btn-default" href="{{ url('filter/change/votes') }}"> Голоса </a>
        @elseif(Cookie::get('orderBy')=='votes')
            <a class="btn btn-default" href="{{ url('filter/change/rewards') }}"> Награда </a>
            <a class="btn btn-default" href="{{ url('filter/change/period') }}"> Период </a>
            <a class="btn btn-info" href="{{ url('filter/change/votes') }}"> Голоса </a>
        @endif
    </div>

</div>


