@extends('template')

@section('title', 'Ротатор кранов - '.$faucetName)

@section('content')

    @include('faucets.wallet')
    @include('faucets.filter')

    <a href="{{ url('order/add') }}" class="label label-info add-btn">Добавить новый кран</a>

    <table class="table table-striped">

        <thead>

            <tr>
                <th> Веб-сайт </th>
                <th> Голоса </th>
                <th> Информация о кране </th>
                <th> Награда </th>
                <th> Период </th>
                <th> Действие </th>
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
                        <b class="green-text"> {{ $faucet['votes'] }} </b>
                    @elseif($faucet['votes'] < 0)
                        <b class="red-text"> {{ $faucet['votes'] }} </b>
                    @endif
                </td>

                <td>
                    <span class="badge green"> {{ $faucet['script'] }} </span>

                    @if(!empty($faucet['wait']))
                        <span class="badge red"> подождите {{ $faucet['wait'] }} сек. </span>
                    @endif

                    <span class="badge orange"> {{ $faucet['captcha'] }} </span>

                    @if($faucet['register'])
                        <span class="badge red"> регистрация </span>
                    @endif

                    @if(!empty($faucet['antibot']))
                        <span class="badge grey"> AntiBot x{{ $faucet['antibot'] }} </span>
                    @endif
                </td>

                <td> <b> {{ $faucet['rewards'] }} </b> </td>

                <td> <b> {{ $faucet['period'] }} мин. </b> </td>

                <td width="120">

                    <div id="{{ 'site-'.$faucet['id'] }}">

                        <div class="btn-move">
                            @if(Cookie::get($faucetName.'-adress'))
                                <a class="btn btn-success" href="{{ url('browser'.'/'.$faucetName.'/'.$script.'/'.$captcha.'/'.$period.'/'.$antibot.'/'.$wait.'/'.$faucet['id']) }}"> Перейти </a>
                            @else
                                <button class="btn"> Перейти </button>
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
            </tr>

        @endforeach
        </tbody>

    </table>
    @if(count($faucet) == 0)
        <h3 class="center"> Ничего не найдено </h3>
    @endif

    <div id="completed">{{ $completed  }}</div>
    <div id="time">{{ \Carbon\Carbon::now() }}</div>
@stop