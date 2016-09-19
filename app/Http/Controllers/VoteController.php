<?php

namespace App\Http\Controllers;

use App\Models\Faucets;
use App\Models\Vote;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{
    public function setVote(Request $request)
    {
        $vote = Vote::where('faucet_id',$request['faucet_id'])->where('ip',$_SERVER['REMOTE_ADDR'])->first();
        $faucet = Faucets::find($request['faucet_id']);
        if($vote){
            if($vote['vote'] == 1 && $request['vote'] == 1) return 'ok';
            elseif($vote['vote'] == 0 && $request['vote'] == 0) return 'ok';
            elseif($vote['vote'] == 0 && $request['vote'] == 1)
            {
                $faucet['votes'] += 2;
                $vote['vote'] = true;
            }
            elseif($vote['vote'] == 1 && $request['vote'] == 0)
            {
                $faucet['votes'] -= 2;
                $vote['vote'] = false;
            }
            $vote->save();
        }
        else
        {
            Vote::create([
                'faucet_id' => $request['faucet_id'],
                'vote' => $request['vote'],
                'ip' => $_SERVER['REMOTE_ADDR']
            ]);
            if($request['vote'] == 1) $faucet['votes'] += 1;
            else $faucet['votes'] -= 1;
        }
        $faucet->save();
        return 'ok';
    }

    private function validateVote($request)
    {
        $validator = Validator::make($request->all(),[
            'faucetId' => 'required',
            'vote' => 'required'
        ]);

        if($validator->fails()) return redirect()->back(); // some error
    }
}
