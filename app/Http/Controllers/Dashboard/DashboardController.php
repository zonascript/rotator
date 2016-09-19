<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Coins;
use App\Models\Wallet;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('dashboard.home',compact('user'));
    }

    public function referral()
    {
        $coins = Coins::all();
        $user = Auth::user();
        $refCount = Wallet::getRefCount($user['id']);
        return view('dashboard.referral',compact('coins','user','refCount'));
    }

    public function  postAddress (Request $request)
    {
        $coins = Coins::all();
        $user = Auth::user();
        foreach($coins as $coin)
        {
            if($request['coin']==$coin['coin_name'])
            {
                $user['ref_'.$coin['coin_name']] = $request['address'];
                $user->save();
                return redirect('dashboard/referral');
            }
        }
    }

}
