<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use Request;

class OrderController extends Controller
{
    public function set(OrderRequest $request)
    {
        $request =  Request::all();
        Order::create($request);
        return redirect('order/add')->with('message','Your site added, please wait to moderation.');
    }

    public function add()
    {
        return view('pages.new-order');
    }
}
