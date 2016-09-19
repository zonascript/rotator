<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

use Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function login()
    {
        return view('admin.login');
    }

    public function auth()
    {
        $admin = Admin::all()->first();
        $request = Request::all();
        if( md5(substr(md5($request['password']),7)) == $admin->password )
        {
            Session::put('password', $admin->password);
            return redirect('admin/coins');
        }
        else
        {
            return '^_^';
        }
    }

    public function logout()
    {
        Session::forget('password');
        return redirect('bitcoin');
    }


}
