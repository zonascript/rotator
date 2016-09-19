<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\Wallet;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{
    public function set (Request $request)
    {
        $refer = (!empty(Session::get('referral'))) ? Session::get('referral') : null;
        $wallet = Wallet::firstOrCreate(array(
            'value' => $request['wallet'],
            'type' => $request['faucetName'],
            'refer' => $refer
        ));
        $cookie1 = Cookie::forever($request['faucetName'].'-adress',$request['wallet']);
        $cookie2 = Cookie::forever($request['faucetName'].'-id',$wallet['id']);
        return redirect($request['faucetName'])->withCookie($cookie1)->withCookie($cookie2);
    }

    public function destroy($faucet)
    {
        $cookie1 = Cookie::forget($faucet.'-adress');
        $cookie2 = Cookie::forget($faucet.'-id');
        return redirect($faucet)->withCookie($cookie1)->withCookie($cookie2);
    }

    public function setRefer($address)
    {
        Session::put('referral', $address);
        return redirect('/');
    }
}
