<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  Ротатор - {{ $faucet['site'] }}</title>

 {!! Html::script('js/lib/jquery.js') !!}
 {!! Html::script('js/lib/bootstrap.js') !!}
 {!! Html::style('css/lib/bootstrap.css') !!}

 {!! Html::script('js/lib/tooltip.js') !!}
 {!! Html::style('css/components.css') !!}

 {!! Html::style('css/browser.css') !!}
 {!! Html::script('js/browser.js') !!}

 {!! Html::script('js/clipboard.js') !!}
 {!! Html::script('js/copywallet.js') !!}

  </head>
  <body>

    <div id="header">
        <div class="left-menu">
            <a class="btn btn-primary" href="{{ url($faucetName) }}"> На главную </a>
            <a class="btn btn-primary" onclick="location.reload()"> Обновить  </a>
            <div id="btn" class="btn btn-warning" data-clipboard-text="{{ Cookie::get($faucetName.'-adress') }}"> Кошелёк </div>
            <div class="btn btn-danger bankrupt" data-id="{{ $faucet['id'] }}" data-url="{{ url('bankrupt') }}">
                Не платит
            </div>

            <a id="site-link" href="//{{$faucet['site'].'/'.$faucet['refer'].$address}}" target="_blank"> {{ $faucet['site'] }} </a>
            <table class="info-table">
            <tr> <td>
                <span class="badge green"> {{ $faucet['script'] }} </span>
                <span class="badge red"> {{ $faucet['captcha'] }} </span>
                @if(!empty($faucet->wait))
                    <span class="badge red"> подождите {!! $faucet['wait'] !!} сек. </span>
                @endif
                @if(!empty($faucet['antibot']))
                    <span class="badge grey"> AntiBot x{!! $faucet['antibot'] !!} </span>
                @endif
            </td></tr>
            <tr> <td>
                <span id="rewards"> Награда: {{ $faucet['rewards'] }} каждые {{ $faucet['period'] }} мин. </span>
            </td></tr>
            </table>
        </div>

        <div class="right-menu">
            <table id="table-votes">
                <tr>
                    <td>
                        <div id="vote" data-url="{{ url('vote') }}" data-faucet="{{ $faucet['id'] }}">
                            <img id="like" src="{{ url('img/icon/like.png') }}" width="30">
                            <img id="dislike" src="{{ url('img/icon/dislike.png') }}" width="30">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($faucet['votes'] > 0)
                            <div class="votes green-text"> {!! $faucet['votes'] !!} </div>
                        @elseif($faucet['votes'] < 0)
                            <div class="votes red-text"> {!! $faucet['votes'] !!} </div>
                        @endif
                    </td>
                </tr>
            </table>
            {!! Form::open(array('url' => 'next', 'method' => 'post')) !!}
                {!! Form::hidden('faucet_id', $faucet['id']) !!}
                {!! Form::hidden('faucetName', $faucetName) !!}
                {!! Form::hidden('wallet_id', Cookie::get($faucetName.'-id') ) !!}
                {!! Form::hidden('script', $script) !!}
                {!! Form::hidden('captcha', $captcha) !!}
                {!! Form::hidden('period', $period) !!}
                {!! Form::hidden('antibot', $antibot) !!}
                {!! Form::hidden('wait', $wait) !!}
                {!! Form::hidden('faucet_period', $faucet['period']) !!}
                {!! Form::submit('Дальше >', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>

    </div>
    @if ($faucet['site'] && $faucet['browser'])
        <iframe id="website" src="//{{$faucet['site'].'/'.$faucet['refer'].$address}}"></iframe>
    @elseif ($faucet['site'] && !$faucet['browser'])
        <h2> Этот сайт не работает в браузере ротатора. Хотите открыть в новой вкладке?
        </br></br>
         <a  href="//{{ $faucet['site'].'/'.$faucet['refer'].$address }}" class="btn btn-success" target="_blank"> Открыть в новой вкладке </a></h2>

    @else
        <h3> Все краны пройдены  </h3>
    @endif

    <div id="tooltip"></div>
  </body>
</html>