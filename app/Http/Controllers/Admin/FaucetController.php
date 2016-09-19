<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaucetRequest;
use Request;

use App\Models\Coins;
use App\Models\Faucets;


class FaucetController extends Controller
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
    public function index($faucetName)
    {
        $faucet = Coins::findByName($faucetName)->faucets()->orderBy('id','DESC')->published()->paid()->get();
        return view('admin.faucets.list',compact('faucet','faucetName'));
    }

    public function create($faucetName)
    {
        $script = Faucets::getScriptArr();
        $captcha = Faucets::getCaptchaArr();
        unset($script[0]); // delete all-script
        unset($captcha[0]); // delete all-captcha
        return view('admin.faucets.create',compact('faucetName','script','captcha'));
    }

    public function store(FaucetRequest $request,$faucetName)
    {
        $request = $request->all();
        $request['coins_id'] = Coins::getIdByName($faucetName);
        Faucets::create($request);
        return redirect('admin/'.$faucetName);
    }

    public function destroy($faucetName, $id)
    {
        Faucets::destroy($id);
        return redirect('admin/'.$faucetName);
    }

    public function edit($faucetName, $id)
    {
        $arrFaucet = Faucets::findOrFail($id);
        $script = Faucets::getScriptArr();
        $captcha = Faucets::getCaptchaArr();
        unset($script[0]); // delete all-script
        unset($captcha[0]); // delete all-captcha
        return view('admin.faucets.edit',compact('arrFaucet','faucetName','script','captcha'));
    }

    public function update(FaucetRequest $request, $faucetName, $id)
    {
        Faucets::findOrFail($id)->update($request->all());
        return redirect('admin/'.$faucetName);
    }

    public function noPublished($faucetName)
    {
        $faucet = Coins::findByName($faucetName)->faucets()->noPublished()->get();
        return view('admin.faucets.list',compact('faucet','faucetName'));
    }

    public function noBrowser($faucetName)
    {
        $faucet = Coins::findByName($faucetName)->faucets()->where('browser','0')->get();
        return view('admin.faucets.list',compact('faucet','faucetName'));
    }

    public function noPaid($faucetName)
    {
        $faucet = Coins::findByName($faucetName)->faucets()->noPaid()->get();
        return view('admin.faucets.list',compact('faucet','faucetName'));
    }

    public function getBrowser($faucetName,$siteId)
    {
        $faucet = Faucets::find($siteId);
        $nextId = Coins::findByName($faucetName)->faucets()->where('id','<',$faucet['id'])->max('id');
        return view('admin.faucets.browser',compact('faucet','faucetName','nextId'));
    }


}
