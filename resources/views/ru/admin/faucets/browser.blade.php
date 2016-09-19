<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">

    <title>  Rotator - {{ $faucet['site'] }}</title>

 {!! Html::script('js/lib/jquery.js') !!}
 {!! Html::script('js/lib/bootstrap.js') !!}
 {!! Html::style('css/lib/bootstrap.css') !!}

 {!! Html::style('css/browser.css') !!}
 {!! Html::script('js/browser.js') !!}


  </head>
  <body>
    <div id="header">
        <div class="left-menu">
            <a class="btn btn-primary" onclick="history.back()"> <- </a>
            <a href="{{ url('admin/'.$faucetName) }}" class="btn btn-primary"> Home  </a>
            <a class="btn btn-primary" onclick="location.reload()"> Refresh  </a>


            <a id="site-link" href="//{{ $faucet['site'] }}" target="_blank"> {{ $faucet['site'] }} </a>
            <span class="badge green"> {{ $faucet['script'] }} </span>
            <span class="badge red"> {{ $faucet['captcha'] }} </span>
            @if(!empty($faucet->wait))
                <span class="badge red"> wait {!! $faucet['wait'] !!} sec </span>
            @endif
            @if(!empty($faucet['antibot']))
                <span class="badge grey"> AntiBot x{!! $faucet['antibot'] !!} </span>
            @endif
            <span id="rewards"> Reward: {{ $faucet['rewards'] }} every {{ $faucet['period'] }} min </span>

        </div>

        <div class="right-menu">
            <a href="{{ url('admin/'.$faucetName.'/edit/'.$faucet['id']) }}" target="_blank" class="btn btn-success"> Edit </a>
            <a href="{{ url('admin/'.$faucetName.'/browser/'.$nextId) }}" class="btn btn-info"> Next </a>
        </div>


    </div>
        <iframe id="website" src="//{{ $faucet['site'] }}"></iframe>
  </body>
</html>