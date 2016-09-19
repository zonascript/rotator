<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coins;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CoinsController extends Controller
{
    function __construct ()
    {
        $this->middleware('login');
    }

    public function getCoins()
    {
        $coins = Coins::all();
        return view('admin.coins',compact('coins'));
    }

    public function setAddress(Request $request)
    {
        Coins::where('coin_name',$request['coin'])->first()->update(array('address' => $request['address']));
        return redirect('admin/coins');
    }
}
