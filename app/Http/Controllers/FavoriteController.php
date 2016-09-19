<?php

namespace App\Http\Controllers;

use App\Models\Faucets;
use App\Models\Favorite;
use App\Models\Wallet;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class FavoriteController extends Controller
{
    public function follow($faucetName,$faucet)
    {
        Faucets::findOrFail($faucet);
        $wallet_id = Cookie::get($faucetName.'-id');
        $favorite = Favorite::firstOrCreate(['wallet_id' => $wallet_id]);
        if(empty($favorite['faucets']))
        {
            $favorite['faucets'] = $faucet;
        }
        else {
            $f = explode(',',$favorite['faucets']);
            if(in_array($faucet,$f))
            {
                return 'ERROR';
            }
            $favorite['faucets'] = $favorite['faucets'].','.$faucet;
        }
        Wallet::find($wallet_id)->favorite()->update(['faucets' => $favorite['faucets']]);
        return 'OK';
    }

    public function unFollow($faucetName,$faucet)
    {
        Faucets::findOrFail($faucet);
        $wallet_id = Cookie::get($faucetName.'-id');
        $favorite = Wallet::find($wallet_id)->favorite()->first();
        $tmp = explode(',',$favorite['faucets']);
        if(!in_array($faucet,$tmp)) return 'ERROR';
        $fix = '';
        if(count($tmp) < 2)
        {
            if($tmp[0] == $faucet)
            {
                Favorite::where('wallet_id',$wallet_id)->delete();
                return 'OK';
            }
            else return 'ERROR';
        }
        unset($tmp[array_search($faucet,$tmp)]);
        foreach($tmp as $f) $fix .= $f.',';
        $fix = substr($fix,0,-1);
        Wallet::find($wallet_id)->favorite()->update(['faucets' => $fix]);
        return 'OK';
    }
}
