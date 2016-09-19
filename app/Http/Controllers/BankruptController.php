<?php

namespace App\Http\Controllers;

use App\Models\Bankrupt;
use App\Models\Faucets;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BankruptController extends Controller
{
    public function setBankrupt(Request $request)
    {
        if(!is_numeric($request['faucet_id'])) exit(view('errors.404'));
        if(Bankrupt::where('faucet_id',$request['faucet_id'])->where('ip',$_SERVER['REMOTE_ADDR'])->count() > 0)
        {
            return 'OK';
        }
        $count = Bankrupt::where('faucet_id',$request['faucet_id'])->count();
        if($count > 3)
        {
            Bankrupt::where('faucet_id',$request['faucet_id'])->delete();
            $faucet = Faucets::find($request['faucet_id']);
            $faucet['paid'] = 0;
            $faucet->save();
        }
        else
        {
           Bankrupt::create(
                [
                    'faucet_id' => $request['faucet_id'],
                    'ip' => $_SERVER['REMOTE_ADDR']
                ]
            );
        }
        return 'OK';
    }
}
