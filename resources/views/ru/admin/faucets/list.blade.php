@extends('admin.admin')

@section('title', $faucetName)

@section('content')
    @include('admin.faucets.nav')

    <table class="table table-striped">

        <thead>

            <tr>
                <th> Website </th>
                <th> Faucets information </th>
                <th> Reward </th>
                <th> Period </th>
                <th>  </th>
                <th>  </th>
                <th> Action </th>
            </tr>

        </thead>

        <tbody>
            @foreach($faucet as $faucet)

            <tr>
                <td> <div class="website-link"> {{ $faucet['site'] }} </div> </td>

                <td>
                    @if(!empty($faucet->script))
                        <span class="badge green"> {!! $faucet->script !!} </span>
                    @endif

                    @if(!empty($faucet->wait))
                        <span class="badge red"> wait {!! $faucet->wait !!} sec </span>
                    @endif

                    @if(!empty($faucet->captcha))
                        <span class="badge orange"> {!! $faucet->captcha !!} </span>
                    @endif

                    @if($faucet->register)
                        <span class="badge red"> register </span>
                    @endif

                     @if(!empty($faucet->antibot))
                        <span class="badge grey"> AntiBot x{!! $faucet->antibot !!} </span>
                     @endif
                </td>

                <td> <b> {!! $faucet->rewards !!} </b> </td>

                <td> <b> {!! $faucet->period !!} min </b> </td>

                <td> <a class="btn btn-info" href="{{ url('admin/'.$faucetName.'/browser/'.$faucet->id) }}"> Browser </a> </td>
                <td> <a class="btn btn-success" href="{{ url('admin/'.$faucetName.'/edit').'/'.$faucet->id }}"> Edit </a> </td>
                <td> <a class="delete-confirm btn btn-danger" href="{{ url('admin/'.$faucetName.'/destroy').'/'.$faucet->id }}"> Delete </a> </td>
            </tr>

        @endforeach
        </tbody>

    </table>
@stop