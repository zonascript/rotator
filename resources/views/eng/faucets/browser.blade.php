<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  Rotator - {{ $faucet['site'] }}</title>

 {!! Html::script('js/lib/jquery.js') !!}
 {!! Html::script('js/lib/bootstrap.js') !!}
 {!! Html::style('css/lib/bootstrap.css') !!}

 {!! Html::script('js/tooltip.js') !!}
 {!! Html::style('css/components.css') !!}

 {!! Html::style('css/browser.css') !!}
 {!! Html::script('js/browser.js') !!}

{!! Html::script('js/clipboard.js') !!}
{!! Html::script('js/copywallet.js') !!}

  </head>
  <body>

    <div id="header">
        <div class="left-menu">
            <a class="btn btn-primary" href="{{ url($faucetName) }}"> Home </a>
            <a class="btn btn-primary" onclick="location.reload()"> Refresh  </a>
            <div id="btn" class="btn btn-warning" data-tooltip="Copy to clipboard (Ctrl + C)" data-clipboard-text="{{ Cookie::get($faucetName.'-adress') }}"> My Wallet </div>
            <div class="btn btn-danger bankrupt" data-tooltip="This site is not paid !" data-id="{{ $faucet['id'] }}" data-url="{{ url('bankrupt') }}">
                NoPay
            </div>

            <a id="site-link" data-tooltip="Open faucet in new tab" href="//{{$faucet['site'].'/'.$faucet['refer'].$address}}" target="_blank"> {{ $faucet['site'] }} </a>
            <table class="info-table">
            <tr> <td>
                <span class="badge green"> {{ $faucet['script'] }} </span>
                <span class="badge red"> {{ $faucet['captcha'] }} </span>
                @if(!empty($faucet->wait))
                    <span class="badge red"> wait {!! $faucet['wait'] !!} sec </span>
                @endif
                @if(!empty($faucet['antibot']))
                    <span class="badge grey"> AntiBot x{!! $faucet['antibot'] !!} </span>
                @endif
            </td></tr>
            <tr> <td>
                <span id="rewards"> Reward: {{ $faucet['rewards'] }} every {{ $faucet['period'] }} min </span>
            </td></tr>
            </table>

        </div>

        <div class="right-menu">
            <table id="table-votes">
                <tr>
                    <td>
                        <div id="vote" data-url="{{ url('vote') }}" data-faucet="{{ $faucet['id'] }}">
                            <img id="like" data-tooltip="Like" src="{{ url('img/icon/like.png') }}" width="30">
                            <img id="dislike" data-tooltip="Dislike" src="{{ url('img/icon/dislike.png') }}" width="30">
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
            {!! Form::open(array('id' => 'nextform', 'url' => 'next', 'method' => 'post')) !!}
                {!! Form::hidden('faucet_id', $faucet['id']) !!}
                {!! Form::hidden('faucetName', $faucetName) !!}
                {!! Form::hidden('wallet_id', Cookie::get($faucetName.'-id') ) !!}
                {!! Form::hidden('script', $script) !!}
                {!! Form::hidden('captcha', $captcha) !!}
                {!! Form::hidden('period', $period) !!}
                {!! Form::hidden('antibot', $antibot) !!}
                {!! Form::hidden('wait', $wait) !!}
                {!! Form::hidden('faucet_period', $faucet['period']) !!}
                {!! Form::submit('Next >', ['class' => 'btn btn-success', 'data-tooltip' => 'Visit next faucet']) !!}
            {!! Form::close() !!}
        </div>

    </div>
    @if ($faucet['site'] && $faucet['browser'])
        <iframe id="website" src="//{{$faucet['site'].'/'.$faucet['refer'].$address}}"></iframe>
    @elseif ($faucet['site'] && !$faucet['browser'])
        <h2> This site does not work in rotator browser. Want to open in a new tab ?
        </br></br>
         <a  href="//{{ $faucet['site'].'/'.$faucet['refer'].$address }}" class="btn btn-success" target="_blank"> Open in new tab </a></h2>

    @else
        <h3> All cranes passed  </h3>
    @endif

    <div id="tooltip"></div>
  </body>
</html>