<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    function __construct ()
    {
        $this->middleware('login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $order = Order::orderBy('id','desc')->get();
        return view('admin.order',compact('order'));
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return redirect('admin/order');
    }
}
