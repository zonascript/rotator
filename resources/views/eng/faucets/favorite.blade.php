@extends('template')

@section('title', 'My list - '.$faucetName)

@section('description','My List of '.$faucetName.' faucets. Free mining '.$faucetName.' satoshi.')

@section('content')

    @include('faucets.wallet')

    <div class="center">
        @if( !empty(Cookie::get($faucetName.'-adress')) )
            <div class="browser-click">
                <span style="margin-right: 20px; ">  My list: {{ count($faucet) }} faucets with ~{{ $capital }} satoshi </span>
                <!-- CLICK TO BROWSER -->
                <a href="{{ url('my/browser/'.$faucetName) }}" class="btn btn-success"> Go to Browser </a>
            </div>
        @endif
    </div>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th> Website </th>
                <th> Votes </th>
                <th> Faucet information </th>
                <th> Reward </th>
                <th> Period </th>
                <th> Action </th>
                <th>  </th>
            </tr>
        </thead>
        <tbody>
            @foreach($faucet as $faucet)
            <tr>
                <td>
                    @if(Cookie::get($faucetName.'-adress'))
                            <div class="website-link"> {{ $faucet['site'] }} </div>
                    @else
                       <a class="website-link"> {{ $faucet['site'] }} </a>
                    @endif
                </td>
                <td>
                    @if($faucet['votes'] > 0)
                        <b class="green-text"> {!! $faucet['votes'] !!} </b>
                    @elseif($faucet['votes'] < 0)
                        <b class="red-text"> {!! $faucet['votes'] !!} </b>
                    @endif
                </td>
                <td>
                    <span class="badge green"> {{$faucet['script']}}  </span>
                    @if(!empty($faucet['wait']))
                        <span class="badge red"> wait {{$faucet['wait']}} sec </span>
                    @endif
                    <span class="badge orange"> {{$faucet['captcha']}} </span>
                    @if($faucet['register'])
                        <span class="badge red"> register </span>
                    @endif
                    @if(!empty($faucet['antibot']))
                        <span class="badge grey">AntiBot x{{ $faucet['antibot'] }}</span>
                    @endif
                </td>
                <td><b>{{ $faucet['rewards'] }}</b></td>
                <td> <b>{{ $faucet['period'] }} min </b></td>
                <td width="120">
                    <div id="{{ 'site-'.$faucet['id'] }}">

                        <div class="btn-move">
                            @if(Cookie::get($faucetName.'-adress'))
                                <a class="btn btn-success" href="{{ url('my/browser/'.$faucetName.'/') }}"> Move </a>
                            @else
                                <button class="btn"> Move </button>
                            @endif
                        </div>

                        <span class="set-timer"> </span>
                        <span class="unset-timer"
                        data-href="{{ url('unset-timer/'.$faucetName.'/'.$faucet['id']) }}"
                        data-site="{{ $faucet['id'] }}">
                            X
                        </span>
                    </div>
                </td>
                <td>
                    <div id="{{ 'follow-'.$faucet['id'] }}">
                        <a class="yes btn btn-info"
                            data-id="{{ $faucet['id'] }}"
                            data-href="{{ url('favorite/follow/'.$faucetName.'/'.$faucet['id']) }}">
                                Follow
                        </a>
                        <a class="no btn btn-default"
                            data-id="{{ $faucet['id'] }}"
                            data-href="{{ url('favorite/unfollow/'.$faucetName.'/'.$faucet['id']) }}">
                                Unfollow
                        </a>
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    @if(count($faucet) == 0)
        <h3 class="center"> Nothing Found </h3>
    @endif
    <div id="favorite" class="hide">{{ $favFaucets  }}</div>
    <div id="completed">{{ $completed  }}</div>
    <div id="time">{{ \Carbon\Carbon::now() }}</div>
@stop